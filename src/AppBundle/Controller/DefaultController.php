<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class DefaultController extends Controller {
    
    /**
     * @Route("/", name="main_page")
     */
    public function admindashboardAction() 
    {
        return $this->render('index/main-page.html.twig');
    }
}
