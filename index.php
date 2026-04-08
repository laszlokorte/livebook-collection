<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="favicon.svg" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"
        />
        <title>Educational Elixir Livebboks</title>
        <?php $urls = json_decode(file_get_contents('livebooks.json')); ?>
        <style>
            :root {
                font-family: monospace;
                color-scheme: light dark;
            }
            h1 {
                display: flex;
                gap: 1ex;
                align-items: center;
            }
            .icon {
                width: 1em;
                height: 1em;
            }
            main {
                max-width: 80ch;
                margin: auto;
            }
            main > header {
                margin-bottom: 2em;
            }
            article {
                margin: 1em 0;
                background-color: #fafafa;
                padding: 1em;
            }
            article header {
                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                gap: 1em;
            }
            article h2 {
                margin: 0;
            }
            a:link,
            a:visited {
                color: #3e64ff;
            }
            svg[width="0"] {
                display: none;
            }
            .media-icon {
                width: 2em;
                height: 2em;
                color: #000;
            }
            header a {
                text-decoration: none;
            }
            main > footer {
                margin: 3em 0;
                padding: 1em 0;
                border-top: 2px solid #fafafa;
                text-align: center;
                display: flex;
                justify-content: center;
            }

            .hero-box {
                height: 10em;
                width: 100%;
                flex-shrink: 0;
                display: grid;
                grid-template-columns: 100%;
                grid-template-rows: 100%;
                order: -1;
                align-items: end;
                justify-items: end;
            }
            .hero-box > * {
                grid-area: 1 / 1 / span 1 / span 1;
            }
            .hero-box::before {
                align-self: stretch;
                justify-self: stretch;
                content: "";
                background-image: linear-gradient(90deg, #0000 50%, #000 90%);
                grid-area: 1 / 1 / span 1 / span 1;
                opacity: 0.5;
                z-index: 1;
            }
            .hero {
                height: 10em;
                width: 100%;
                flex-shrink: 0;
                object-fit: cover;
                object-position: center;
                margin: 0;
                box-sizing: border-box;
                order: -1;
                border: none;
            }
            .headline {
                flex-grow: 1;
                display: flex;
                justify-content: space-between;
                gap: 2em;
            }
            .headline a {
                flex-grow: 0;
                gap: 1ex;
                display: flex;
            }
            .star {
                height: 2em;
                margin: 1ex;
                z-index: 10;
            }
            a:has(.icon) {
                display: flex;
                align-items: center;
                gap: 1ex;
            }
            @media (prefers-color-scheme: dark) {
              article {
                color: white;
                background-color: #101010;
              }
              a:link, a:visited  {
                  color: #ff87a7
              }
              .media-icon {
                  color: #fff;
              }
              main > footer {
                border-top: 2px solid #333;
            }
            }
        </style>
    </head>
    <body>
        <svg width="0" height="0">
            <defs>
                <path
                    fill="currentColor"
                    id="video-icon"
                    d="M31,10.75C31,7.852 28.648,5.5 25.75,5.5L6.25,5.5C3.352,5.5 1,7.852 1,10.75L1,21.25C1,24.148 3.352,26.5 6.25,26.5L25.75,26.5C28.648,26.5 31,24.148 31,21.25L31,10.75ZM23,16L12,22L12,11L23,16Z"
                ></path>
                <path
                    id="github-icon"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M16 0C7.16 0 0 7.16 0 16C0 23.08 4.58 29.06 10.94 31.18C11.74 31.32 12.04 30.84 12.04 30.42C12.04 30.04 12.02 28.78 12.02 27.44C8 28.18 6.96 26.46 6.64 25.56C6.46 25.1 5.68 23.68 5 23.3C4.44 23 3.64 22.26 4.98 22.24C6.24 22.22 7.14 23.4 7.44 23.88C8.88 26.3 11.18 25.62 12.1 25.2C12.24 24.16 12.66 23.46 13.12 23.06C9.56 22.66 5.84 21.28 5.84 15.16C5.84 13.42 6.46 11.98 7.48 10.86C7.32 10.46 6.76 8.82 7.64 6.62C7.64 6.62 8.98 6.2 12.04 8.26C13.32 7.9 14.68 7.72 16.04 7.72C17.4 7.72 18.76 7.9 20.04 8.26C23.1 6.18 24.44 6.62 24.44 6.62C25.32 8.82 24.76 10.46 24.6 10.86C25.62 11.98 26.24 13.4 26.24 15.16C26.24 21.3 22.5 22.66 18.94 23.06C19.52 23.56 20.02 24.52 20.02 26.02C20.02 28.16 20 29.88 20 30.42C20 30.84 20.3 31.34 21.1 31.18C27.42 29.06 32 23.06 32 16C32 7.16 24.84 0 16 0V0Z"
                    fill="currentColor"
                ></path>
                <path
                    id="notebook-icon"
                    fill="currentColor"
                    d="M4.767,9.501l-1.067,0c-0.566,0 -1.025,-0.623 -1.025,-1.391c0,-0.768 0.459,-1.391 1.025,-1.391l1.067,0l0,-3.04c0,-0.768 0.623,-1.391 1.392,-1.391l21.122,-0c0.769,-0 1.392,0.623 1.392,1.391l-0,24.822c-0,0.769 -0.623,1.392 -1.392,1.392l-21.122,-0c-0.769,-0 -1.392,-0.623 -1.392,-1.392l0,-3.127l-1.067,-0c-0.566,-0 -1.025,-0.624 -1.025,-1.392c0,-0.767 0.459,-1.391 1.025,-1.391l1.067,0l0,-2.508l-1.067,-0c-0.566,-0 -1.025,-0.624 -1.025,-1.391c0,-0.768 0.459,-1.391 1.025,-1.391l1.067,-0l0,-2.509l-1.067,0c-0.566,0 -1.025,-0.623 -1.025,-1.391c0,-0.768 0.459,-1.391 1.025,-1.391l1.067,-0l0,-2.509Zm3.783,15.873l-0,0.736l16.34,0l0,-20.04c0,0 -16.34,0 -16.34,-0l-0,0.649l0.113,0c0.565,0 1.025,0.623 1.025,1.391c-0,0.768 -0.46,1.391 -1.025,1.391l-0.113,0l-0,2.509l0.113,-0c0.565,-0 1.025,0.623 1.025,1.391c-0,0.768 -0.46,1.391 -1.025,1.391l-0.113,0l-0,2.509l0.113,-0c0.565,-0 1.025,0.623 1.025,1.391c-0,0.767 -0.46,1.391 -1.025,1.391l-0.113,-0l-0,2.508l0.113,0c0.565,0 1.025,0.624 1.025,1.391c-0,0.768 -0.46,1.392 -1.025,1.392l-0.113,-0Zm14.056,-5.016l-0,2.909l-10.482,0l0,-2.909l10.482,0Zm-0,-11.274l-0,2.909l-10.482,-0l0,-2.909l10.482,-0Zm-0,5.637l-0,2.909l-10.482,-0l0,-2.909l10.482,0Z"
                ></path>
            </defs>
        </svg>
        <main>
            <header>
                <h1>
                    <a href="https://livebook.dev/" target="_blank">
                        <img
                            class="icon"
                            src="favicon.svg"
                            alt="Livebook Icon" /></a
                    >Elixir Livebooks
                </h1>
                <p>
                    A collection of educational
                    <a href="https://elixir-lang.org/" target="_blank"
                        >Elixir</a
                    >
                    <a href="https://livebook.dev/" target="_blank">Livebooks</a
                    >.
                </p>
            </header>
            <?php foreach($urls AS $livebook): ?>

            <article>
                <header>
                    <div class="headline">
                        <h2><?php echo $livebook->title ?></h2>
                        <a
                            target="_blank"
                            href="<?php echo $livebook->url ?>"
                            title="Source Code on Github"
                        >
                            <svg viewBox="-3 -3 38 38" class="media-icon">
                                <use href="#github-icon"></use>
                            </svg>
                        </a>
                    </div>
                    <?php if(!empty($livebook->hero)): ?>
                    <div class="hero-box">
                        <img src="<?php echo $livebook->hero ?>" class="hero" />

                        <?php if(isset($livebook->github)): ?>
                        <img
                            class="star"
                            src="stars.php?repo=<?php echo $livebook->github; ?>"
                        />
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </header>

                <p><?php echo $livebook->description ?></p>
                <a
                    href="https://livebook.dev/run?url=<?php echo urlencode($livebook->url); ?>"
                >
                    <img
                        src="blue.svg"
                        alt="Run in Livebook"
                    />
                </a>
            </article>

            <?php endforeach; ?>
            <footer>
                <a href="//tools.laszlokorte.de"
                    ><img
                        class="icon"
                        src="https://tools.laszlokorte.de/favicon.svg"
                        alt=""
                    />more educational tools</a
                >
            </footer>
        </main>
    </body>
</html>
