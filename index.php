<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="icon" href="favicon.svg" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover"
        />

        <meta name="mobile-web-app-capable" content="yes" />
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

            .ref-links {
                display: flex;
                flex-direction: row-reverse;
                gap: 1.5ex;
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

            .wip {
                align-self: center;
                justify-self: center;
                z-index: 100;
                color: #a00;
                stroke: #fff;
                width: 100%;
                height: 100%;
                font-size: 2em;
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
                <path id="hex-icon" fill="currentColor" d="M9.748.002c-.186.123-.49.142-.596.334-.06.261-.238.525-.072.783 1.108 1.928 2.24 3.846 3.358 5.77.266.166.499.46.846.37 1.431-.034 2.864.001 4.296-.016.533-.01 1.074.029 1.602.003.268-.131.615-.182.717-.505l3.157-5.6c-.016-.223.116-.497.001-.684-.2-.19-.352-.469-.664-.452Q16.071-.002 9.748.002M24.665 1.51c-.4.458-.624 1.04-.946 1.554l-2.543 4.51c-.006.308-.146.655.104.903.57.839 1.012 1.756 1.546 2.617.505.867 1.012 1.734 1.493 2.615.258.166.478.46.818.392h6.474c.186-.123.49-.142.596-.334.06-.262.238-.526.073-.783-2.153-3.756-4.327-7.502-6.49-11.253-.199-.1-.368-.353-.587-.35zM24.398 15.885c-.713 1.291-1.476 2.558-2.204 3.842-.295.534-.638 1.05-.92 1.586-.02.296-.15.62.075.87l3.261 5.594c.2.098.37.35.589.346.256-.08.574-.06.713-.331q3.203-5.506 6.387-11.025c-.014-.222.122-.495.009-.683-.197-.183-.337-.469-.642-.455-2.23-.012-4.463-.001-6.694-.005zM19.094 22.468c-1.554.028-3.109.002-4.663.013-.416.021-.848-.051-1.253.016-.26.122-.583.18-.68.49l-3.17 5.6c.017.221-.116.495-.002.682.198.182.34.465.645.45 4.23.012 8.46.004 12.69.003.184-.124.488-.143.594-.334.06-.262.237-.526.072-.783-1.112-1.931-2.246-3.851-3.366-5.778-.26-.155-.481-.455-.817-.365l-.038.004zM6.656 1.713c-.4.464-.638 1.043-.966 1.559-1.866 3.23-3.746 6.453-5.607 9.687.014.222-.122.495-.01.683.198.183.338.468.643.454 2.219.012 4.44.002 6.66.005.267-.145.637-.191.732-.527.494-.965 1.091-1.873 1.611-2.824.448-.802.938-1.59 1.385-2.386.02-.297.15-.621-.075-.872L7.783 1.93c-.2-.098-.37-.352-.588-.347zM.162 15.885c-.057.286-.27.575-.094.856 2.164 3.76 4.348 7.51 6.526 11.262.2.098.37.35.588.347.257-.08.574-.059.713-.332 1.11-1.934 2.2-3.883 3.303-5.823.008-.31.148-.66-.107-.909-.555-.806-.978-1.693-1.495-2.523-.53-.912-1.063-1.822-1.57-2.748-.257-.165-.477-.46-.817-.39H.736z" />
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

                        <nav class="ref-links">
                        <?php if(isset($livebook->github)): ?>
                        <a
                            target="_blank"
                            href="https://github.com/<?php echo $livebook->github ?>"
                            title="Source Code on Github"
                        >
                            <svg viewBox="-3 -3 38 38" class="media-icon">
                                <use href="#github-icon"></use>
                            </svg>
                        </a>
                        <?php endif; ?>
                        <?php if(isset($livebook->hex)): ?>
                        <a
                            target="_blank"
                            href="https://hex.pm/packages/<?php echo $livebook->hex ?>"
                            title="Package on Hex"
                        >
                            <svg viewBox="-5 -5 40 40" class="media-icon">
                                <use href="#hex-icon"></use>
                            </svg>
                        </a>
                        <?php endif; ?>
                        </nav>
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
                        <?php if($livebook->wip ?? false): ?>
                        <svg class="wip" viewBox="-250 -250 500 500">
                                <text fill-rule="nonzero" font-size="100" font-weight="bold"transform="rotate(-10)" fill="#fff" stroke-linejoin="round" font-family="monospace" stroke-width="32" stroke="currentColor" x="0" y="0" text-anchor="middle">
                                Work in progress
                            </text>
                            <text font-size="100" font-weight="bold" transform="rotate(-10)" fill="#fff" stroke-width="0" stroke="none" x="0" y="0" text-anchor="middle">
                                                            Work in progress
                                                        </text>
                        </svg>
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
