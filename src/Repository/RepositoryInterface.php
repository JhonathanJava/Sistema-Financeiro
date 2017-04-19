<?php
/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 17/04/2017
 * Time: 21:30
 */

declare(strict_types=1);
namespace Financeiro\Repository;


interface RepositoryInterface
{
    public function all() : array;
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function find(int $id, bool $failIfNotExist = true);
    public function findByField(string $field,$value): array;
}