<?php

namespace NormalUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NormalUserBundle:Default:index.html.twig');
    }
}
