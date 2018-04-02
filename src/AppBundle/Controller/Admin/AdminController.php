<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Subject;
use AppBundle\Forms\TeacherType;

class AdminController extends Controller {

    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function admindashboardAction() {
        return $this->render('admin/adminDashboard.html.twig');
    }

    /**
     * @Route("/admin/teacher", name="admin_teacher_dashboard")
     */
    public function showteachersAction() {

        $teachers = $this->getDoctrine()
                ->getRepository(Teacher::class)                                 //List of all teachers
                ->findAll();

        foreach ($teachers as $teacher) {
            $teacher->getSubject();
            $teacher->getClassroom();
        }

        return $this->render('admin/admin-teacher/adminTeacherDashboard.html.twig', [
                    'teachers' => $teachers,
        ]);
    }

    /**
     * @Route("/admin/teacher/create", name="admin_createteacher")
     * @param Request $request
     */
    public function newteacherAction(Request $request) {

        $teacher = new Teacher;                                                 //Adding a new teacher

        $form = $this->createForm(TeacherType::class, $teacher);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $teacher = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $em->persist($teacher);
            $em->flush();

            return $this->redirectToRoute('admin_teacher_dashboard');
        }
        return $this->render('admin/admin-teacher/adminTeacherCreate.html.twig', [
                    'form' => $form->createView()
        ]);
    }

}
