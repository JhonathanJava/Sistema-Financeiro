<?php
/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 17/04/2017
 * Time: 21:33
 */

declare(strict_types=1);
namespace Financeiro\Repository;

class RepositoryFactory 
{
	public static function factory(string $modelClass)
	{
		return new DefaultRepository($modelClass);
	}
}