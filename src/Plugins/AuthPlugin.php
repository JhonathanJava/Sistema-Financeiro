<?php
declare(strict_types=1);

namespace Financeiro\Plugins;

use Financeiro\Auth\Auth;
use Financeiro\Auth\JasnyAuth;
use Interop\Container\ContainerInterface;
use Financeiro\ServiceContainerInterface;

class AuthPlugin implements PluginInterface
{
	public function register(ServiceContainerInterface $container)
	{
		$container->addLazy('jasny.auth',function(ContainerInterface $container){
			return new JasnyAuth($container->get('user.repository'));
		});
		
		$container->addLazy('auth', function(ContainerInterface $container){
			return new Auth($container->get('jasny.auth'));
		});

	}	
}