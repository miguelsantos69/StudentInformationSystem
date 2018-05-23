<?php

namespace AppBundle\Controller\Teacher;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class TeacherController extends Controller {
    
    /**
     * @Route("/teacher/{id}", name="teacher_profile")
     */
    public function teacherAction($id) 
    {
        $teacher = $this->getDoctrine()
                ->getRepository('AppBundle:Teacher')
                ->find($id);
        
        return $this->render('teacher/teacher_profile.html.twig', [
            'teacher' => $teacher
        ]);
    }
    
    
}
