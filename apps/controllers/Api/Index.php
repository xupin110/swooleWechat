<?php
namespace App\Controller\Api;

class Index extends Base
{
    public function __construct($swoole)
    {
        parent::__construct($swoole);
    }

    public function index()
    {
        echo __METHOD__;
    }
}