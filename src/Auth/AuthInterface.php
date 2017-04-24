<?php
/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 18/04/2017
 * Time: 23:03
 */
declare(strict_types=1);

namespace Financeiro\Auth;


use Financeiro\Models\UserInterface;

interface AuthInterface
{
    public function login(array  $credentials):bool;
    public function check():bool;
    public function logout():void;
    public function hashPassword(string $password):string;
    public function user(): UserInterface;

}