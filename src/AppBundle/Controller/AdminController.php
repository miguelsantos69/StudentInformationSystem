<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Subject;
use Doctrine\ORM\EntityManager;

class AdminController extends Controller
{
    /**
     * @Route("/", name="admin_dashboard")
     */
    public function adminAction()
    {
  
        $teachers = $this->getDoctrine()->getRepository(Teacher::class)->findAll();

        foreach($teachers as $teacher) {
            $teacher->getSubjects();
            // Here you have $teacher and you can do $teacher->getSubjects() };
        }

        return $this->render('admin/adminDashboard.html.twig', [
                    'teachers' => $teacher,
        ]);
    }
}
