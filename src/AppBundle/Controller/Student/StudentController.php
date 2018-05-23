<?php

namespace AppBundle\Controller\Student;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class StudentController extends Controller {
    
    /**
     * @Route("/student/{id}", name="student_profile")
     */
    public function studentAction($id) 
    {
        $student = $this->getDoctrine()
                ->getRepository('AppBundle:Student')
                ->find($id);
        
        return $this->render('student/student_profile.html.twig', [
            'student' => $student
        ]);
    }
    
    
}
