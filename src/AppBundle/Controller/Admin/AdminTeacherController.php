<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Subject;
use Doctrine\ORM\EntityManager;

class AdminTeacherController extends Controller
{

    /**
     * @Route("/admin/teacher", name="admin_teacher_dashboard")
     */
    public function showteachersAction()
    {
        // List of Teachers 
        $teachers = $this->getDoctrine()
                ->getRepository(Teacher::class)
                ->findAll();
     
        foreach ($teachers as $teacher) {
          $teacher -> getSubjects();  
        }
        
        return $this->render('admin/admin-teacher/adminTeacherDashboard.html.twig', [
                    'teachers' => $teachers,

        ]);
    }
}
