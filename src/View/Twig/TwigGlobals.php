<?php
/**
 * Created by PhpStorm.
 * User: Jhonathan
 * Date: 20/04/2017
 * Time: 00:26
 */

namespace Financeiro\View\Twig;


use Financeiro\Auth\AuthInterface;

class TwigGlobals extends \Twig_Extension implements  \Twig_Extension_GlobalsInterface
{
    /**
     * @var AuthInterface
     */
    private $auth;


    /**
     * TwigGlobals constructor.
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function  getGlobals()
    {
        return [
          'Auth' => $this->auth
        ];
    }

}