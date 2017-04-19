<?php
declare(strict_types=1);

namespace Financeiro\Plugins;

use Financeiro\Auth\Auth;
use Interop\Container\ContainerInterface;
use Financeiro\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{
	public function register(ServiceContainerInterface $container)
	{

		$container->addLazy('auth', function(ContainerInterface $container){
			return new Auth();
		});

	}	
}