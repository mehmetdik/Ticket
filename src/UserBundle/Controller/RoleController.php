<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RoleController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {

        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->render('AdminBundle:MainPage:index.html.twig');
        }else{
            return $this->render('NormalUserBundle:MainPage:index.html.twig');
        }

    }

}
