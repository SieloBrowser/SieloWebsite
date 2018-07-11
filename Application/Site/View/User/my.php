<?php
    if(!\Core\Session\Session::isConnected())
        header('Location: /Sielo/');
    $html = '<ul>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_THISPAGE').'</a>
                    <ul>
                        <li><a href="#overview" class="scrolly">'.$this->params['lang']->getKey('HEADER_SITEOPT_OVERVIEW').'</a></li>
                        <li><a href="#changeinformations" class="scrolly">'.$this->params['lang']->getKey('HEADER_SITEOPT_CHANGEINFORMATIONS').'</a></li>
                    </ul>
                </li>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_SITEOPT').'</a>    
                    <ul>
                        <li><a href="/Sielo/account/lang">'.$this->params['lang']->getKey('HEADER_SITEOPT_LANG').'</a></li>
                        <li><a href="/Sielo/">'.$this->params['lang']->getKey('HEADER_SITEOPT_HOME').'</a></li>
                    </ul>
                </li>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_GALERY').'</a>
                    <ul>
                        <li><a href="/Sielo/gallery/themes">'.$this->params['lang']->getKey('HEADER_GALERY_THEMES').'</a></li>
                        <li><a href="/Sielo/gallery/images">'.$this->params['lang']->getKey('HEADER_GALERY_IMAGES').'</a></li>
                    </ul>
                </li>
            </ul>';
    $this->htmlDocument->body->generateSpecificHtmlVar('headerNav', $html);
?>
<section id="banner">
    <div class="content">
        <header>
            <h2><?php echo $this->params['lang']->getKey('MY_ACCOUNT'); ?></h2>
            <h4><?php echo $this->params['lang']->getKey('WELCOME').' '.$this->params['account']->nickname.' '.$this->params['lang']->getKey('MY_WELCOME_INFORMATION'); ?></h4>
        </header>
        <span class="image"><img src="/Sielo/Application/Site/Datas/User/<?php echo $this->params['account']->nickname; ?>.jpg" alt="" /></span>
    </div>
    <a href="#overview" class="goto-next scrolly">Next</a>
</section>

<section id="overview">
    <div class="content">
        <header>
            <h2>Informations overview</h2>
        </header>
    </div>
    <a href="#changeinformations" class="goto-next scrolly">Next</a>
</section>

<section id="changeinformations" class="wrapper style1 special fade-up">
    <div class="content">
        <header>
            <h2>Change informations</h2>
        </header>
        <div class="container">
            <div id="changeImage">
                <h4><?php echo $this->params['lang']->getKey('MY_CHANGE_IMAGE_TITLE'); ?></h4>
                <form action="/Sielo/account/my/changes/image" method="post">
                    <label class="button primary"><?php echo $this->params['lang']->getKey('MY_CHANGE_IMAGE'); ?><input type="file" hidden name="image" accept="image/*"></label>
                    <br>
                    <input type="submit" class="button default" value="<?php echo $this->params['lang']->getKey('MY_SEND'); ?>">
                </form>
            </div>
            <div id="changeNickname">
                <h4><?php echo $this->params['lang']->getKey('MY_CHANGE_NICKNAME_TITLE'); ?></h4>
                <form action="/Sielo/account/my/changes/nickname" method="post">
                    <input type="text" name="nickname" placeholder="<?php echo $this->params['lang']->getKey('MY_CHANGE_NICKNAME'); ?>">
                    <br>
                    <input type="submit" value="<?php echo $this->params['lang']->getKey('MY_SEND'); ?>">
                </form>
            </div>
            <div id="changePassword">
                <h4><?php echo $this->params['lang']->getKey('MY_CHANGE_PASSWORD_TITLE'); ?></h4>
                <form action="/Sielo/account/my/changes/password" method="post">
                    <input type="password" name="password" placeholder="<?php echo $this->params['lang']->getKey('MY_CHANGE_PASSWORD'); ?>">
                    <input type="password" name="confirm" placeholder="<?php echo $this->params['lang']->getKey('MY_CHANGE_PASSWORD_CONFIRM'); ?>">
                    <br>
                    <input type="submit" class="button default" value="<?php echo $this->params['lang']->getKey('MY_SEND'); ?>">
                </form>
            </div>
        </div>
    </div>
    <a href="#changeinformations" class="goto-next scrolly">Next</a>
</section>