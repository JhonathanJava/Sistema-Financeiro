<?php
declare(strict_types=1);

namespace Financeiro\Plugins;

use Financeiro\Models\User;
use Interop\Container\ContainerInterface;
use Financeiro\ServiceContainerInterface;
use Financeiro\Models\CentroCusto;
use Financeiro\Repository\RepositoryFactory;
use Illuminate\Database\Capsule\Manager as Capsule;


class DBPlugin implements PluginInterface
{
	public function register(ServiceContainerInterface $container)
	{
		$capsule = new Capsule();
		$config = include __DIR__ . '/../../config/db.php';
		$capsule->addConnection($config['development']);
		$capsule->bootEloquent();

		$container->add('repository.factory', new RepositoryFactory());
		$container->addLazy('category-cost.repository', function(ContainerInterface $container){
			return $container->get('repository.factory')->factory(CentroCusto::class);	
		});

		$container->addLazy('user.repository', function(ContainerInterface $container){
			return $container->get('repository.factory')->factory(User::class);
		});
	}	
}