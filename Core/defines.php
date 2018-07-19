<?php
$config = \Core\Config\Config::getInstance();

define('FRAMEWORK_PATH', $config->getPathInformations()['FrameworkPath']);
define('APPLICATION_PATH', $config->getPathInformations()['ApplicationPath']);
define('SITE_PATH', $config->getPathInformations()['SitePath']);