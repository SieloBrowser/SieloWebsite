<html lang="en">
    <head>
        <?php
            $this->htmlDocument->header->parseHeaderDatas();
        ?>
        <title>Sielo</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="sielo-transparent-background" content="True">
        <!--[if lte IE 8]><script src="/Sielo/Application/Assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="/Sielo/Application/Assets/css/main.css" />
<!--        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">-->
        <!--[if lte IE 9]><link rel="stylesheet" href="/Sielo/Application/Assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="/Sielo/Application/Assets/css/ie8.css" /><![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118352128-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-118352128-1');
        </script>
        <script src="/Sielo/Application/Assets/js/jquery.min.js"></script>
        <script src="/Sielo/Application/Assets/js/jquery.scrolly.min.js"></script>
        <script src="/Sielo/Application/Assets/js/jquery.dropotron.min.js"></script>
        <script src="/Sielo/Application/Assets/js/jquery.scrollex.min.js"></script>
        <script src="/Sielo/Application/Assets/js/skel.min.js"></script>
        <script src="/Sielo/Application/Assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="/Sielo/Application/Assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="/Sielo/Application/Assets/js/main.js"></script>
    </head>

    <body class="landing">
        <div id="page-wrapper">
            <header id="header">
                <h1 id="logo"><a href="index.html">Sielo</a></h1>
                <!--    <h1><a href="/Sielo/join/">Join the community !</a><h1 id="logo">-->
                <nav id="nav">
                    <?php
                        $headerNav = $this->htmlDocument->body->getSpecificHtmlVar('headerNav');
                        if(isset($headerNav))
                            echo $headerNav;
                    ?>
                </nav>
            </header>
	        <?php echo $includedContent; ?>
            <!-- Footer -->
            <footer id="footer">
                <ul class="icons">
                    <li><a href="https:/twitter.com/SieloBrowser" class="icon alt fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
                    <li><a href="https:/instagram.com/sielo.browser" class="icon alt fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
                    <li><a href="https:/www.facebook.com/SieloBrowser/" class="icon alt fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
                    <li><a href="https:/github.com/SieloBrowser/SieloBrowser" class="icon alt fa-github" target="_blank"><span class="label">GitHub</span></a></li>
                    <li><a href="mailto:admin@feldrise.com" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; Victor "Feldrise" DENIS. All rights reserved.</li><li>Design: <a href="http:/twitter.com/ajlkn">AJ</a></li>
                </ul>
            </footer>
        </div>
    </body>
</html>