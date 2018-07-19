<?php

namespace App\Autoloader;

use \Core\Autoloader\Register;

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR.'Autoloader'.DIRECTORY_SEPARATOR.'Register.php';

Register::getInstance();

include dirname(__DIR__).DIRECTORY_SEPARATOR.'Core'.DIRECTORY_SEPARATOR.'defines.php';