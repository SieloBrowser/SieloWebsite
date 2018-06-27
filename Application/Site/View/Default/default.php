<html lang="en">
    <head>
        <?php
            $this->htmlDocument->header->parseHeaderDatas();
        ?>
        <title>Sielo</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="sielo-transparent-background" content="True">
        <!--[if lte IE 8]><script src="/Sielo/Application/Site/Assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="/Sielo/Application/Site/Assets/css/main.css" />
<!--        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">-->
        <!--[if lte IE 9]><link rel="stylesheet" href="/Sielo/Application/Site/Assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="/Sielo/Application/Site/Assets/css/ie8.css" /><![endif]-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118352128-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-118352128-1');
        </script>
        <script src="/Sielo/Application/Site/Assets/js/jquery.min.js"></script>
        <script src="/Sielo/Application/Site/Assets/js/jquery.scrolly.min.js"></script>
        <script src="/Sielo/Application/Site/Assets/js/jquery.dropotron.min.js"></script>
        <script src="/Sielo/Application/Site/Assets/js/jquery.scrollex.min.js"></script>
        <script src="/Sielo/Application/Site/Assets/js/skel.min.js"></script>
        <script src="/Sielo/Application/Site/Assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="/Sielo/Application/Site/Assets/js/main.js"></script>
    </head>

    <body class="landing">
        <?php echo $includedContent; ?>
    </body>
</html>