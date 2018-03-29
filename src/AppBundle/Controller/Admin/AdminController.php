<?php

namespace AppBundle\Controller\Admin;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class AdminController extends Controller {
    
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function admindashboardAction() 
    {
        return $this->render('admin/adminDashboard.html.twig');
    }
}
