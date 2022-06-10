<?php

declare(strict_types=1);
namespace App\Controller;


class IndexController extends AbstractController{

    public function indexAction():void
    {
        
       parent::render('Index/index');
    }

    public function loginAction():void
    {
       
        parent::render('Index/login');
    }
}