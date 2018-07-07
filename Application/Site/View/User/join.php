<?php
    if(\Application\Site\Model\User::isConnected())
        header('Location: /Sielo/');
?>
<header id="header">
    <h1 id="logo"><a href="/Sielo/">Sielo</a></h1>
    <nav id="nav">
        <ul>
            <li><i><a href="#" class="scrolly">English</a></i></li>
            <li><a href="#login" class="scrolly">Se connecter</a></li>
            <li><a href="#register" class="scrolly">S'inscrire</a></li>
        </ul>
    </nav>
</header>

<section id="banner">
    <div class="content">
        <header>
            <h2>Rejoignez la communauté de Sielo</h2>
            <a href="#login" class="button special scrolly">Se connecter</a>
            <a href="#register" class="button special scrolly">S'inscrire</a>
        </header>
        <span class="image"><img src="/Sielo/Application/Site/Assets/images/icon.png" alt="" /></span>
    </div>
    <a href="#login" class="goto-next scrolly">Next</a>
</section>

<section id="login" class="wrapper style1 special fade-up" style="padding: 5%;">
    <div class="container" style="padding: 7.5%">
        <header class="major">
            <h1>Se connecter</h1>
        </header>
        <div class="box alt">
            <form action="/Sielo/join/login" method="post" style="text-align: center">
                <label>
                    <h4>Pseudo</h4>
                    <input type="text" name="pseudo" class="btn btn-default" placeholder="Pseudo">
                </label>
                <label>
                    <h4>Mot de passe</h4>
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
            <h1>S'enregistrer</h1>
        </header>
        <div class="box alt">
            <?php
                if(isset($this->params['returnError']))
                {
                    ?>
                    <h2><?php echo $this->params['returnError']; ?></h2>
                    <?php
                }
            ?>
            <form action="/Sielo/join/register#register" method="post" style="text-align: center">
                <label>
                    <h4>Pseudo</h4>
                    <input type="text" name="pseudo" class="btn btn-default" placeholder="Pseudo">
                </label>
                <label>
                    <h4>Nom et prénom</h4>
                    <input type="text" name="surname" class="btn btn-default" placeholder="Nom">
                    <input type="text" name="name" class="btn btn-default" placeholder="Prénom">
                </label>
                <label>
                    <h4>Mot de passe</h4>
                    <input type="password" name="password" class="btn btn-default" placeholder="Mot de passe">
                    <input type="password" name="confirm" class="btn btn-default" placeholder="Confirmation">
                </label>
                <label>
                    <h4>Email</h4>
                    <input type="email" name="email" class="btn btn-default" placeholder="Email">
                </label>
                <label>
                    <input type="submit" value="Créer un compte" class="btn btn-success">
                </label>
            </form>
        </div>
    </div>
</section>