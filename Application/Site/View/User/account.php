<?php

    if(\Core\Session\Session::isConnected())
        if($this->params['account']->nickname === \Core\Session\Session::getParam('nickname'))
            header('Location: /Sielo/account/my');

?>


<header id="header">
    <h1 id="logo"><a href="/Sielo/">Sielo</a></h1>
    <nav id="nav">
        <ul>
            <li><i><a href="#" class="scrolly">English</a></i></li>
            <li><a href="#informations" class="scrolly">Informations</a></li>
            <li><a href="#works" class="scrolly">Contributions</a></li>
        </ul>
    </nav>
</header>

<section id="banner">
    <div class="content">
        <header>
            <h2><?php echo $this->params['account']->nickname; ?></h2>
            <p><?php
                foreach ($this->params['account']->usergroup as $group)
                {
                    echo $group."<br/>";
                }
                ?></p>
        </header>
        <span class="image"><img src="/Sielo/Application/Site/Datas/User/<?php echo $this->params['account']->nickname; ?>.jpg"></span>
    </div>
    <a href="#informations" class="goto-next scrolly">Next</a>
</section>

<section id="informations" class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h4>Informations de l'utilisateur: <?php echo $this->params['account']->nickname; ?></h4>
        </header>
        <div class="box alt">
            <div class="row uniform">
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-eye"></span>
                    <h3>Pseudonyme</h3>
                    <p><?php echo $this->params['account']->nickname; ?></p>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-plus"></span>
                    <h3>Nombre de contributions</h3>
                    <p>Theme au pif</p>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-user"></span>
                    <h3>Prénom</h3>
                    <p><?php echo $this->params['account']->name; ?></p>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-registered"></span>
                    <h3>Date d'inscription</h3>
                    <p><?php
                        $baseDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        $baseMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $langMonth = explode(', ', $this->lang->getKey('DATE_MONTHS'));
                        $langDays = explode(', ', $this->lang->getKey('DATE_DAYS'));
                        $day = str_replace($baseDays, $langDays, date('l', strtotime($this->params['account']->registrationDate)));
                        $month = str_replace($baseMonth, $langMonth, date('F', strtotime($this->params['account']->registrationDate)));
                        echo $day.' '.date('j', strtotime($this->params['account']->registrationDate)).' '.$this->lang->getKey('DATE_DELIMITOR').' '.$month.' '.date('Y', strtotime($this->params['account']->registrationDate));
//                            echo date('l j \of F Y h:i:s A', strtotime($this->params['account']->registrationDate));
                        ?></p>
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                </section>
                <section class="4u 6u(medium) 12u$(xsmall)">
                    <span class="icon alt major fa-search"></span>
                    <h3>Dernière connection</h3>
                    <p>26 juin 2018</p>
                </section>
            </div>
        </div>
        <a href="#works" class="goto-next scrolly">Next</a>
    </div>
</section>

<section id="works"  class="wrapper style1 special fade-up">
    <div class="container">
        <header class="major">
            <h4>Contributions de l'utilisateur: <?php echo $this->params['account']->nickname; ?></h4>
        </header>
        <div class="box alt">
            <section class="12u 12u(large) 12u$(xlarge">
                <p>Aucune contribution</p>
            </section>
        </div>
    </div>
</section>
