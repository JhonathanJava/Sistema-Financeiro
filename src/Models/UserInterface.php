<?php
/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 20/04/2017
 * Time: 00:34
 */
declare(strict_types=1);
namespace Financeiro\Models;


interface UserInterface
{
    public function getId():int;
    public function getEmail():string;
    public function getFullname():string;
    public function getPassword():string;

}