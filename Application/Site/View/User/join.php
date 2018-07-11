<?php
    if(\Core\Session\Session::isConnected())
        header('Location: /Sielo/');
    $html = '<ul>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_THISPAGE').'</a>
                    <ul>
                        <li><a href="#login" class="scrolly">'.$this->params['lang']->getKey('HEADER_SITEOPT_LOGIN').'</a></li>
                        <li><a href="#register" class="scrolly">'.$this->params['lang']->getKey('HEADER_SITEOPT_REGISTER').'</a></li>
                    </ul>
                </li>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_SITEOPT').'</a>    
                    <ul>
                        <li><a href="/Sielo/account/lang">'.$this->params['lang']->getKey('HEADER_SITEOPT_LANG').'</a></li>
                        <li><a href="/Sielo/">'.$this->params['lang']->getKey('HEADER_SITEOPT_HOME').'</a></li>
                    </ul>
                </li>
            </ul>';
    $this->htmlDocument->body->generateSpecificHtmlVar('headerNav', $html);
?>
<section id="banner">
    <div class="content">
        <header>
            <h2><?php echo $this->params['lang']->getKey('JOIN_COMMUNITY'); ?></h2>
            <a href="#login" class="button special scrolly"><?php echo $this->params['lang']->getKey('JOIN_LOGIN'); ?></a>
            <a href="#register" class="button special scrolly"><?php echo $this->params['lang']->getKey('JOIN_REGISTER'); ?></a>
        </header>
        <span class="image"><img src="/Sielo/Application/Site/Assets/images/icon.png" alt="" /></span>
    </div>
    <a href="#login" class="goto-next scrolly">Next</a>
</section>

<section id="login" class="wrapper style1 special fade-up" style="padding: 5%;">
    <div class="container" style="padding: 7.5%">
        <header class="major">
            <h1><?php echo $this->params['lang']->getKey('JOIN_LOGIN') ?></h1>
        </header>
        <div class="box alt">
            <?php if(isset($this->params['typeOf'])) { if($this->params['typeOf'] === 'login') echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>'.$this->params['returnError'].'</div>'; } ?>
            <form action="/Sielo/join/login#login" method="post" style="text-align: center">
                <label>
                    <h4><?php echo $this->params['lang']->getKey('JOIN_NICKNAME') ?></h4>
                    <input type="text" name="nickname" class="btn btn-default" placeholder="Pseudo" value="<?php echo (isset($this->params['returnInformations']) && $this->params['typeOf'] === 'login') ? $this->params['returnInformations']['nickname'] : ''; ?>">
                </label>
                <label>
                    <h4><?php echo $this->params['lang']->getKey('JOIN_PASSWORD') ?></h4>
                    <input type="password" name="password" class="btn btn-default" placeholder="Mot de passe">
                </label>
                <label>
                    <input type="submit" value="Se connecter" class="btn btn-success">
                </label>
            </form>
        </div>
        <a href="#register" class="goto-next scrolly">Next</a>
    </div>
</section>

<section id="register" class="wrapper style1 special fade-up" style="padding: 5%;">
    <div class="container" style="padding: 0">
        <header class="major">
            <h1><?php echo $this->params['lang']->getKey('JOIN_REGISTER') ?></h1>
        </header>
        <div class="box alt">
            <?php if(isset($this->params['typeOf'])) { if($this->params['typeOf'] === 'register') echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>'.$this->params['returnError'].'</div>'; } ?>
            <form action="/Sielo/join/register#register" method="post" style="text-align: center">
                <label>
                    <h4><?php echo $this->params['lang']->getKey('JOIN_NICKNAME') ?></h4>
                    <input type="text" name="nickname" class="btn btn-default" placeholder="Pseudo" value="<?php echo (isset($this->params['returnInformations']) && $this->params['typeOf'] === 'register') ? $this->params['returnInformations']['nickname'] : ''; ?>">
                </label>
                <label>
                    <h4>Nom et prénom</h4>
                    <input type="text" name="surname" class="btn btn-default" placeholder="Nom" value="<?php echo (isset($this->params['returnInformations']) && $this->params['typeOf'] === 'register') ? $this->params['returnInformations']['surname'] : ''; ?>">
                    <input type="text" name="name" class="btn btn-default" placeholder="Prénom" value="<?php echo (isset($this->params['returnInformations']) && $this->params['typeOf'] === 'register') ? $this->params['returnInformations']['name'] : ''; ?>">
                </label>
                <label>
                    <h4>Mot de passe</h4>
                    <input type="password" name="password" class="btn btn-default" placeholder="Mot de passe">
                    <input type="password" name="confirm" class="btn btn-default" placeholder="Confirmation">
                </label>
                <label>
                    <h4>Email</h4>
                    <input type="email" name="email" class="btn btn-default" placeholder="Email" value="<?php echo (isset($this->params['returnInformations']) && $this->params['typeOf'] === 'register') ? $this->params['returnInformations']['email'] : ''; ?>">
                </label>
                <label>
                    <input type="submit" value="Créer un compte" class="btn btn-success">
                </label>
            </form>
        </div>
    </div>
</section>