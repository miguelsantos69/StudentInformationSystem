<?php

namespace AppBundle\Controller\Teacher;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use AppBundle\Controller\Security\DashboardVoter;

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
    
    /**
     * 
     * @Route("dashboard/teacher/{id}/", name="teacher_dashboard")
     */
    public function dashboardAction($id) {

        $teacher = $this->container->get('security.token_storage')->getToken()->getUser();

        $data = $this->getDoctrine()
                ->getRepository('AppBundle:Teacher')
                ->find($id);
      
        if ($teacher->getId() == $id) {
            return $this->render('teacher/teacher_dashboard.html.twig', [
                'data' => $data
            ]);
        } else {
            throw new AccessDeniedException('Unable to access this page!');
        }
    }

}
