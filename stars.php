<?php

define('API_KEY', trim(file_get_contents('../apikey.txt')));

function getStars($owner, $repo, $ttl = 300) {
    $cacheFile = __DIR__ . "/cache/cache_{$owner}_{$repo}.json";
    $etagFile  = __DIR__ . "/cache/cache_{$owner}_{$repo}.etag";

    $etag = file_exists($etagFile) ? trim(file_get_contents($etagFile)) : null;

    $headers = [
        "User-Agent: livebooks.laszlokorte.de",
        "Accept: application/vnd.github+json",
        "Authorization: Bearer " . API_KEY
    ];

    if ($etag) {
        $headers[] = "If-None-Match: $etag";
    }

    $ch = curl_init("https://api.github.com/repos/$owner/$repo");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    $response = curl_exec($ch);

    if ($response === false) {
        // fallback
        if (file_exists($cacheFile)) {
            return json_decode(file_get_contents($cacheFile), true)["stargazers_count"];
        }
        throw new Exception(curl_error($ch));
    }

    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    list($rawHeaders, $body) = explode("\r\n\r\n", $response, 2);

    if ($status === 304 && file_exists($cacheFile)) {
        return json_decode(file_get_contents($cacheFile), true)["stargazers_count"];
    }

    // extract new etag
    if (preg_match('/ETag: (.*)/i', $rawHeaders, $matches)) {
        file_put_contents($etagFile, trim($matches[1]));
    }

    file_put_contents($cacheFile, $body);

    return json_decode($body, true)["stargazers_count"] ?? "?";
}

if(isset($_GET['force'])) {
    $stars = (string)(int)$_GET['force'];
} else if(isset($_GET['repo'])) {
    [$owner, $repo] = explode('/', $_GET['repo'], 2);

    if($owner === 'laszlokorte') {
        $stars = (string) getStars($owner, $repo, 12000);
    }
}

if(!isset($stars)) {
    header('HTTP/1.0 404 Not Found', true, 404);
    exit(0);
}
// We'll be outputting a PDF
header('Content-Type: image/svg+xml');
$width = strlen($stars) * 6 + 28;
?>

<svg xmlns="http://www.w3.org/2000/svg" width="<?php echo $width ?>" height="20">
<g fill="#fff" font-family="monospace" text-rendering="geometricPrecision" font-size="110">
            <rect width="<?php echo $width ?>" x="0" height="20" fill="rgba(0,0,0,1)"/>
            <text x="5" y="13" fill="#fff" font-size="10">🌟</text>
            <rect width="17" x="21" height="20" fill="rgba(0,0,0,0)"/>
            <text x="21" y="13.5"  fill="#fff" font-size="10"><?php echo $stars; ?></text>
</g>
</svg>
