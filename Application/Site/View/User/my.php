<?php
    if(!\Application\Site\Model\User::isConnected())
        header('Location: /Sielo/');
?>