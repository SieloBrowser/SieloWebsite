<!-- Header -->
<?php
    $html = '<ul>
            <li class="opener">
                <a href="#">This page</a>
                <ul>
                    <li><a href="#promo" class="scrolly">Presentation</a></li>
                    <li><a href="#tabspace" class="scrolly">Tabs spaces</a></li>
                    <li><a href="#floatingbutton" class="scrolly">Floating Button</a></li>
                    <li><a href="#download" class="scrolly">Download</a></li>
                </ul>
            </li>
            <li class="opener">
                <a href="#">Site options</a>    
                <ul>
                    <li><a href="/Sielo/account/my#lang">'.$this->params['lang']->getKey('HEADER_SITEOPT_LANG').'</a></li>
                    ';
    $html .= ($this->params['forced']) ? '<li><a href="/Sielo/">'.$this->params['lang']->getKey('HEADER_SITEOPT_HOME').'</a></li><li><a href="/Sielo/account/my">'.$this->params['lang']->getKey('HEADER_SITEOPT_ACCOUNT').'</a></li>' : '<li><a href="/Sielo/join#login">'.$this->params['lang']->getKey('HEADER_SITEOPT_LOGIN').'</a></li><li><a href="/Sielo/join#register">'.$this->params['lang']->getKey('HEADER_SITEOPT_REGISTER').'</a></li>';
    $html .= '</ul></li></ul>';
    $this->htmlDocument->body->generateSpecificHtmlVar('headerNav', $html);
?>

<!-- Banner -->
<section id="banner">
    <div class="content">
        <header>
            <h2>Sielo</h2>
            <p><?php echo $this->lang->getKey('BANNER_TABSPACE'); ?></p>
        </header>
        <span class="image"><img src="/Sielo/Application/Assets/images/icon.png" alt="" /></span>
    </div>
    <a href="#one" class="goto-next scrolly">Next</a>
</section>

<!-- One -->
<section id="promo" class="spotlight style1 top">
    <div class="content align-center">
        <header class="major">
            <h2><?php echo $this->lang->getKey('ONE_TITLE'); ?></h2>
            <p><?php echo $this->lang->getKey('ONE_PRESENTATION'); ?></p>
        </header>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $this->lang->getKey('ONE_YTVIDEO_TAG') ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
    <a href="#tabspace" class="goto-next scrolly">Next</a>
</section>

<!-- Tabs spaces -->
<section id="tabspace" class="spotlight style2 left">
    <span class="image fit main"><img src="/Sielo/Application/Assets/images/tabsspaces.png" alt="" /></span>
    <div class="content">
        <header>
            <h2><?php echo $this->lang->getKey('TABSPACE_TITLE'); ?></h2>
            <p>"<?php echo $this->lang->getKey('TABSPACE_PRESENTATION'); ?></p>
        </header>
        <p><?php echo $this->lang->getKey('TABSPACE_FEATURE'); ?></p>
    </div>
    <a href="#floatingbutton" class="goto-next scrolly">Next</a>
</section>

<!-- Floating button -->
<section id="floatingbutton" class="spotlight style3 right">
    <span class="image fit main bottom"><img src="/Sielo/Application/Assets/images/fbutton.png" alt="" /></span>
    <div class="content">
        <header>
            <h2><?php echo $this->lang->getKey('FLOATING_TITLE'); ?></h2>
            <p><?php echo $this->lang->getKey('FLOATING_PRESENTATION'); ?></p>
        </header>
        <p><?php echo $this->lang->getKey('FLOATING_FEATURE'); ?></p>
    </div>
    <a href="#caracteristics" class="goto-next scrolly">Next</a>
</section>

<!-- caracteristics -->
<section id="caracteristics" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2><?php echo $this->lang->getKey('CARACTERISTICS_START'); ?></h2>
            <p><?php echo $this->lang->getKey('CARACTERISTICS_HELP'); ?></p>
        </header>
        <div class="box alt">
            <div class="row uniform">
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-gift"></span>
                    <h3><?php echo $this->lang->getKey('CARACTERISTICS_FREE'); ?></h3>
                    <p><?php echo $this->lang->getKey('CARACTERISTICS_FREE_PRESENTATION'); ?></p>
                </section>
                <section class="4u 6u$(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-eye"></span>
                    <h3><?php echo $this->lang->getKey('CARACTERISTICS_IMPROVED'); ?></h3>
                    <p><?php echo $this->lang->getKey('CARACTERISTICS_IMPROVED_PRESENTATION'); ?></p>
                </section>
                <section class="4u$ 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-paint-brush"></span>
                    <h3><?php echo $this->lang->getKey('CARACTERISTICS_CUSTOMIZABLE'); ?></h3>
                    <p><?php echo $this->lang->getKey('CARACTERISTICS_CUSTOMIZABLE_PRESENTATION'); ?></p>
                </section>
                <section class="4u 6u$(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-rocket"></span>
                    <h3><?php echo $this->lang->getKey('CARACTERISTICS_FAST'); ?></h3>
                    <p><?php echo $this->lang->getKey('CARACTERISTICS_FAST_PRESENTATION'); ?></p>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-heart"></span>
                    <h3><?php echo $this->lang->getKey('CARACTERISTICS_HELP_US'); ?></h3>
                    <p><?php echo $this->lang->getKey('CARACTERISTICS_HELP_US_PRESENTATION'); ?></p>
                </section>
                <section class="4u$ 6u$(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-umbrella"></span>
                    <h3><?php echo $this->lang->getKey('CARACTERISTICS_UPDATE'); ?></h3>
                    <p><?php echo $this->lang->getKey('CARACTERISTICS_UPDATE_PRESENTATION'); ?></p>
                </section>
            </div>
        </div>
        <footer class="major">
        </footer>
    </div>
</section>

<!-- Four -->
<section id="download" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h2><?php echo $this->lang->getKey('DOWNLOAD_DOWNLOAD'); ?></h2>
        </header>
        <div class="box alt">
            <div class="row uniform">
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-windows"></span>
                    <h3><?php echo $this->lang->getKey('DOWNLOAD_WINDOWS'); ?></h3>
                    <ul class="actions">
                        <li><a href="/Sielo/Application/Assets/download.php?for=windows" class="button"><?php echo $this->lang->getKey('DOWNLOAD_WINDOWSSETUP'); ?></a></li>
                    </ul>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-windows"></span>
                    <h3><?php echo $this->lang->getKey('DOWNLOAD_WINDOWSPORTABLE'); ?></h3>
                    <ul class="actions">
                        <li><a href="/Sielo/Application/Assets/download.php?for=windows_portable" class="button"><?php echo $this->lang->getKey('DOWNLOAD_WINDOWSPORTABLESETUP'); ?></a></li>
                    </ul>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-linux"></span>
                    <h3><?php echo $this->lang->getKey('DOWNLOAD_LINUX'); ?></h3>
                    <ul class="actions">
                        <li><a href="/Sielo/Application/Assets/download.php?for=linux" class="button"><?php echo $this->lang->getKey('DOWNLOAD_LINUXSETUP'); ?></a></li>
                    </ul>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-linux"></span>
                    <h3><?php echo $this->lang->getKey('DOWNLOAD_ARCH'); ?></h3>
                    <ul class="actions">
                        <li><a href="#" class="button"><?php echo $this->lang->getKey('DOWNLOAD_ARCHSETUP'); ?></a></li>
                    </ul>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-github"></span>
                    <h3><?php echo $this->lang->getKey('DOWNLOAD_GITHUB'); ?></h3>
                    <ul class="actions">
                        <li><a href="https:/github.com/Feldrise/SieloNavigateur" class="button" target="_blank"><?php echo $this->lang->getKey('DOWNLOAD_GITHUBSOURCE'); ?></a></li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <a href="#download" class="goto-next scrolly">Next</a>
</section>