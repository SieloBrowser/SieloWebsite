<?php

namespace App\Autoloader;

use \Core\Autoloader\Register;

require_once $_SERVER['DOCUMENT_ROOT'].'/Sielo/Core/Autoloader/Register.php';

Register::getInstance();

include __DIR__.'/Core/defines.php';