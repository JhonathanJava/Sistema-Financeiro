<?php

/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 19/04/2017
 * Time: 22:54
 */

use Financeiro\Application;
use Financeiro\Plugins\AuthPlugin;
use Financeiro\Plugins\DBPlugin;
use Financeiro\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new AuthPlugin());
$app->plugin(new DBPlugin());

return $app;

