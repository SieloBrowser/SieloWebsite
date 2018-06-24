<html lang="en">
<head>
    <?php
        $this->htmlDocument->header->addMetaTag(['name' => 'test']);
        $this->htmlDocument->header->parseHeaderDatas();
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header" style="width: 100%;">
            <a class="navbar-brand" href="#"><?php echo $this->lang->getKey('TITLE'); ?></a>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top: 100px;">
		<?php echo $content; ?>
    </div>

</div>
</body>
</html>