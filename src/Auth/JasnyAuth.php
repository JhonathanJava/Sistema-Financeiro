<?php
/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 18/04/2017
 * Time: 23:14
 */

namespace Financeiro\Auth;


use Financeiro\Repository\RepositoryInterface;
use Jasny\Auth\Sessions;
use Jasny\Auth\User;

class JasnyAuth extends \Jasny\Auth
{
    use Sessions;
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * JasnyAuth constructor.
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Fetch a user by ID
     *
     * @param int|string $id
     * @return User|null
     */
    public function fetchUserById($id)
    {
        return $this->repository->find($id, false);
    }

    /**
     * Fetch a user by username
     *
     * @param string $username
     * @return User|null
     */
    public function fetchUserByUsername($username)
    {
        return $this->repository->findByField('email',$username)[0];
    }


}