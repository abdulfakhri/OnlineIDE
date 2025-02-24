<?PHP include('.../engineer/home/nav.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="RGU">
    <meta name="keywords" content="online compiler, online ide">
    <meta name="author" content="Herman Zvonimir Došilović">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/goldenlayout.min.js" integrity="sha256-NhJAZDfGgv4PiB+GVlSrPdh3uc75XXYSM4su8hgTchI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-base.css" integrity="sha256-oIDR18yKFZtfjCJfDsJYpTBv1S9QmxYopeqw2dO96xM=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-dark-theme.css" integrity="sha256-ygw8PvSDJJUGLf6Q9KIQsYR3mOmiQNlDaxMLDOx9xL0=" crossorigin="anonymous" />

    <script type="text/javascript" src="third_party/monaco-editor-0.18.0/min/vs/loader.js"></script>
    <script>require.config({ paths: { "vs": "third_party/monaco-editor-0.18.0/min/vs" } });</script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

    <script type="text/javascript" src="third_party/download.js"></script>

    <script type="text/javascript" src="js/ide.js"></script>

    <link type="text/css" rel="stylesheet" href="css/ide.css">

    <title>RGU IDE</title>
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <style>
        body{
            background: #fff;
        }
    </style>
</head>

<body>
    <div id="site-navigation" class="ui small inverted menu">
        <div id="site-header" class="header item">
            <a href="/">
                <img id="site-icon" src="./images/judge0_icon.png">
                <h2>Judge0 IDE</h2>
            </a>
        </div>
        <div class="left menu">
            <div class="ui dropdown item site-links on-hover">
                File <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" target="_blank" href="/"><i class="file code icon"></i> New File</a>
                    <div class="item" onclick="save()"><i class="save icon"></i> Save (Ctrl + S)</div>
                    <div class="item" onclick="downloadSource()"><i class="download icon"></i> Download</div>
                    <!-- <div class="item"><i class="share icon"></i> Share</div> -->
                    <div id="insert-template-btn" class="item"><i class="file code outline icon"></i> Insert template
                        for current language</div>
                </div>
            </div>
            <!-- <div class="link item" onclick="$('#site-settings').modal('show')"><i class="cog icon"></i> Settings</div> -->
            <div class="item borderless">
                <select id="select-language" class="ui dropdown">
                    <option value="1" mode="shell">Bash (4.4)</option>
                    <option value="2" mode="shell">Bash (4.0)</option>
                    <option value="3" mode="text/x-pascal">Basic (fbc 1.05.0)</option>
                    <option value="4" mode="c">C (gcc 7.2.0)</option>
                    <option value="5" mode="c">C (gcc 6.4.0)</option>
                    <option value="6" mode="c">C (gcc 6.3.0)</option>
                    <option value="7" mode="c">C (gcc 5.4.0)</option>
                    <option value="8" mode="c">C (gcc 4.9.4)</option>
                    <option value="9" mode="c">C (gcc 4.8.5)</option>
                    <option value="10" mode="cpp">C++ (g++ 7.2.0)</option>
                    <option value="11" mode="cpp">C++ (g++ 6.4.0)</option>
                    <option value="12" mode="cpp">C++ (g++ 6.3.0)</option>
                    <option value="13" mode="cpp">C++ (g++ 5.4.0)</option>
                    <option value="14" mode="cpp">C++ (g++ 4.9.4)</option>
                    <option value="15" mode="cpp">C++ (g++ 4.8.5)</option>
                    <option value="16" mode="csharp">C# (mono 5.4.0.167)</option>
                    <option value="17" mode="csharp">C# (mono 5.2.0.224)</option>
                    <option value="18" mode="clojure">Clojure (1.8.0)</option>
                    <option value="19" mode="text/x-crystal">Crystal (0.23.1)</option>
                    <option value="20" mode="text/x-elixir">Elixir (1.5.1)</option>
                    <option value="21" mode="text/x-erlang">Erlang (OTP 20.0)</option>
                    <option value="22" mode="go">Go (1.9)</option>
                    <option value="23" mode="text/x-haskell">Haskell (ghc 8.2.1)</option>
                    <option value="24" mode="text/x-haskell">Haskell (ghc 8.0.2)</option>
                    <option value="25" mode="plaintext">Insect (5.0.0)</option>
                    <option value="26" mode="java">Java (OpenJDK 9 with Eclipse OpenJ9)</option>
                    <option value="27" mode="java">Java (OpenJDK 8)</option>
                    <option value="28" mode="java">Java (OpenJDK 7)</option>
                    <option value="29" mode="javascript">JavaScript (nodejs 8.5.0)</option>
                    <option value="30" mode="javascript">JavaScript (nodejs 7.10.1)</option>
                    <option value="31" mode="text/x-ocaml">OCaml (4.05.0)</option>
                    <option value="32" mode="text/x-octave">Octave (4.2.0)</option>
                    <option value="33" mode="pascal">Pascal (fpc 3.0.0)</option>
                    <option value="34" mode="python">Python (3.6.0)</option>
                    <option value="35" mode="python">Python (3.5.3)</option>
                    <option value="36" mode="python">Python (2.7.9)</option>
                    <option value="37" mode="python">Python (2.6.9)</option>
                    <option value="38" mode="ruby">Ruby (2.4.0)</option>
                    <option value="39" mode="ruby">Ruby (2.3.3)</option>
                    <option value="40" mode="ruby">Ruby (2.2.6)</option>
                    <option value="41" mode="ruby">Ruby (2.1.9)</option>
                    <option value="42" mode="rust">Rust (1.20.0)</option>
                    <option value="43" mode="plaintext">Text (plain text)</option>
                    <option value="44" mode="plaintext">Executable</option>
                </select>
            </div>
            <input type="text" name="code"/>
            <div class="item fitted borderless">
                <div class="ui input">
                    <input id="compiler-options" type="text" placeholder="Compiler options"></input>
                </div>
            </div>
            <div class="item borderless">
                <div class="ui input">
                    <input id="command-line-arguments" type="text" placeholder="Command line arguments"></input>
                </div>
            </div>
            <div class="item fitted borderless">
                <button id="run-btn" class="ui primary labeled icon button"><i class="play icon"></i>Run (F9)</button>
            </div>
        </div>
        <div class="right menu">
            <a class="link item" target="_blank" href="https://judge0.com/about"><i class="info circle icon"></i> About</a>
            <a id="api-url" class="link item" target="_blank" href="https://api.judge0.com"><i class="server icon"></i> API</a>
            <div class="ui dropdown item site-links">
                Other
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" target="_blank" href="https://www.patreon.com/hermanzdosilovic"><i
                            class="patreon icon"></i>
                        Become a Patron</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="https://github.com/judge0/ide"><i class="github icon"></i>
                        View source
                        code on Github</a>
                    <a class="item" target="_blank" href="https://github.com/judge0/ide/issues/new"><i
                            class="exclamation circle icon"></i> Report an issue</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="https://judge0.com/#subscribe"><i class="envelope icon"></i>
                        Subscribe
                        to Judge0 news</a>
                    <a class="item" target="_blank" href="https://discordapp.com/invite/e43pb7B"><i
                            class="discord icon"></i> Join a Discord server</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="mailto:hermanz.dosilovic@gmail.com"><i
                            class="paper plane icon"></i>
                        Contact the author</a>
                    <a class="item" target="_blank" href="https://hermanz.dosilovic.com"><i class="user icon"></i> About
                        the
                        author</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank" href="https://junit.ide.judge0.com"><i class="external alternate icon"></i> JUnit Playground</a>
                    <a class="item" target="_blank" href="https://nim.ide.judge0.com"><i class="external alternate icon"></i> Nim Playground</a>
                    <a class="item" target="_blank" href="https://vlang.ide.judge0.com"><i class="external alternate icon"></i> V Playground</a>
                    <div class="divider"></div>
                    <a class="item" target="_blank"
                        href="https://www.reddit.com/submit?url=https%3A%2F%2Fide.judge0.com&title=Judge0%20IDE"
                        style="background-color: #ff4500 !important; color: white !important;"><i
                            class="reddit icon"></i> Share
                        on Reddit</a>
                    <a class="item" target="_blank"
                        href="https://twitter.com/intent/tweet?text=Judge0%20IDE&url=https%3A%2F%2Fide.judge0.com&via=hermanzvonimir"
                        style="background-color: #1da1f2 !important; color: white !important;"><i
                            class="twitter icon"></i>
                        Share on Twitter</a>
                    <a class="item" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fide.judge0.com"
                        style="background-color: #1877f2 !important; color: white !important;"><i
                            class="facebook icon"></i>
                        Share on Facebook</a>
                </div>
            </div>
        </div>
    </div>

    <div id="site-content"></div>

    <div id="site-modal" class="ui modal">
        <div class="header">
            <i class="close icon"></i>
            <span id="title"></span>
        </div>
        <div class="scrolling content"></div>
        <div class="actions">
            <div class="ui small labeled icon cancel button">
                <i class="remove icon"></i>
                Close (ESC)
            </div>
        </div>
    </div>

    <div id="site-settings" class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            <i class="cog icon"></i>
            Settings
        </div>
        <div class="content">
            <div class="ui form">
                <div class="inline fields">
                    <label>Editor Mode</label>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode" checked="checked">
                            <label>Normal</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode">
                            <label>Vim</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="editor-mode">
                            <label>Emacs</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>

</html>
