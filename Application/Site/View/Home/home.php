<?php
    if(!\Application\Site\Model\User::isConnected())
        header('Location: /Sielo/');
    $html = '<ul>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_THISPAGE').'</a>
                    <ul>
                        <li><a href="#news" class="scrolly">News</a></li>
                        <li><a href="#themes" class="scrolly">Themes</a></li>
                    </ul>
                </li>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_SITEOPT').'</a>    
                    <ul>
                        <li><a href="/Sielo/lang">'.$this->params['lang']->getKey('HEADER_SITEOPT_LANG').'</a></li>
                        <li><a href="/Sielo/presentation">'.$this->params['lang']->getKey('HEADER_SITEOPT_PRESENTATION').'</a></li>
                        <li><a href="/Sielo/account/my">'.$this->params['lang']->getKey('HEADER_SITEOPT_ACCOUNT').'</a></li>
                    </ul>
                </li>
            </ul>';
    $this->htmlDocument->body->generateSpecificHtmlVar('headerNav', $html);
?>

<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h2>Sielo home page</h2>
            <h4><?php echo $this->params['lang']->getKey('WELCOME').' '.$this->params['account']->pseudo; ?></h4>
        </header>
        <span class="image"><img src="/Sielo/Application/Site/Datas/User/<?php echo $this->params['account']->pseudo; ?>.jpg" alt="" /></span>
    </div>
    <a href="#presentation" class="goto-next scrolly">Next</a>
</section>

<section id="news" class="wrapper style1 special fade-up">
    <div class="content">
        <header class="major">
            <h3>News</h3>
        </header>
        <div id="news">

        </div>
    </div>
    <a href="#themes" class="goto-next scrolly">Next</a>
</section>

<section id="themes" class="wrapper style1 special fade-up">
    <div class="content">
        <header class="major">
            <h3>Themes</h3>
        </header>
        <div id="best">

        </div>
        <div id="last">

        </div>
    </div>
</section>
