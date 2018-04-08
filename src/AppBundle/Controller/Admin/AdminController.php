<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Student;
use AppBundle\Entity\Subject;
use AppBundle\Forms\TeacherType;
use AppBundle\Forms\TeacherEditType;
use AppBundle\Forms\StudentEditType;
use AppBundle\Forms\StudentType;
use AppBundle\Forms\SubjectType;

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
    public function showteachersAction() {                                      //List of all teachers
        
        $teachers = $this->getDoctrine()
                ->getRepository(Teacher::class)
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
     */
    public function newteacherAction(Request $request) {                        //Adding a new teacher
        
        $teacher = new Teacher;

        $form = $this->createForm(TeacherType::class, $teacher);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $teacher = $form->getData();
            $em = $this->getDoctrine()
                    ->getManager();

            $em->persist($teacher);
            $em->flush();

            $this->addFlash('notice', 'New teacher has been successfully created');

            return $this->redirectToRoute('admin_teacher_dashboard');
        }

        return $this->render('admin/admin-teacher/adminTeacherCreate.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/teacher/edit/{id}", name="admin_editteacher")
     */
    public function editteacherAction($id, Request $request) {                  //Edit existing teacher
        
        $teacher = $this->getDoctrine()
                ->getRepository('AppBundle:Teacher')
                ->find($id);

        $form = $this->createForm(TeacherEditType::class, $teacher);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $teacher = $form->getData();
            $em = $this->getDoctrine()
                    ->getManager();

            $em->persist($teacher);
            $em->flush();

            $this->addFlash('notice', 'Teacher profile has been edited correctly');

            return $this->redirectToRoute('admin_teacher_dashboard');
        }

        return $this->render('admin/admin-teacher/adminTeacherCreate.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/teacher/delete/{id}", name="admin_deleteteacher")
     */
    public function deleteteacherAction($id) {                                  //Delete teacher
        $em = $this->getDoctrine()->getManager();
        $teacher = $em->getRepository('AppBundle:Teacher')->find($id);

        $em->remove($teacher);
        $em->flush();

        $this->addFlash('notice', 'Teacher has been deleted from database');

        return $this->redirectToRoute('admin_teacher_dashboard');
    }

    /**
     * @Route("/admin/student", name="admin_student_dashboard")
     */
    public function showstudentsAction() {                                      //List of all students
        
        $students = $this->getDoctrine()
                ->getRepository(Student::class)
                ->findAll();

        foreach ($students as $student) {
            $student->getClassroom();
        }

        return $this->render('admin/admin-student/adminStudentDashboard.html.twig', [
                    'students' => $students,
        ]);
    }

    /**
     * @Route("/admin/student/edit/{id}", name="admin_editstudent")
     */
    public function editstudentAction($id, Request $request) {                  //Edit existing student
       
        $student = $this->getDoctrine()
                ->getRepository('AppBundle:Student')
                ->find($id);

        $form = $this->createForm(StudentEditType::class, $student);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $student = $form->getData();
            $em = $this->getDoctrine()
                    ->getManager();

            $em->persist($student);
            $em->flush();

            $this->addFlash('notice', 'Student profile has been edited correctly');

            return $this->redirectToRoute('admin_student_dashboard');
        }

        return $this->render('admin/admin-student/adminStudentEdit.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/student/create", name="admin_createstudent")
     */
    public function newstudentAction(Request $request) {                        //Adding a new student
        
        $student = new Student;

        $form = $this->createForm(StudentType::class, $student);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $student = $form->getData();
            $em = $this->getDoctrine()
                    ->getManager();

            $em->persist($student);
            $em->flush();

            $this->addFlash('notice', 'New student has been successfully created');

            return $this->redirectToRoute('admin_student_dashboard');
        }

        return $this->render('admin/admin-student/adminStudentCreate.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/student/delete/{id}", name="admin_deletestudent")
     */
    public function deletestudentAction($id) {                                  //Delete student
       
        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:Student')->find($id);

        $em->remove($student);
        $em->flush();

        $this->addFlash('notice', 'Student has been successfully deleted ');

        return $this->redirectToRoute('admin_student_dashboard');
    }

    /**
     * @Route("/admin/subject", name="admin_subject_dashboard")
     */
    public function showsubjectsAction() {                                      //List of all subjects
        
        $subjects = $this->getDoctrine()
                ->getRepository(Subject::class)
                ->findAll();

        foreach ($subjects as $subject) {
            $subject->getClassroom();
            $subject->getTeacher();
        }

        return $this->render('admin/admin-subject/adminSubjectDashboard.html.twig', [
                    'subjects' => $subjects,
        ]);
    }
    
    /**
     * @Route("/admin/subject/edit/{id}", name="admin_editsubject")
     */
    public function editsubjecttAction($id, Request $request) {                  //Edit existing subject
       
        $subject = $this->getDoctrine()
                ->getRepository('AppBundle:Subject')
                ->find($id);

        $form = $this->createForm(SubjectType::class, $subject);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $subject = $form->getData();
            $em = $this->getDoctrine()
                    ->getManager();

            $em->persist($subject);
            $em->flush();

            $this->addFlash('notice', 'Edytowano subject');

            return $this->redirectToRoute('admin_subject_dashboard');
        }

        return $this->render('admin/admin-subject/adminSubjectEdit.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/subject/create", name="admin_createstudent")
     */
    public function newsubjectAction(Request $request) {                        //Adding a new subject
        
        $subject = new Subject;

        $form = $this->createForm(SubjectType::class, $subject);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $subject = $form->getData();
            $em = $this->getDoctrine()
                    ->getManager();

            $em->persist($subject);
            $em->flush();

            $this->addFlash('notice', 'New subject has been successfully created');

            return $this->redirectToRoute('admin_subject_dashboard');
        }

        return $this->render('admin/admin-subject/adminSubjectCreate.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/subject/delete/{id}", name="admin_deletesubject")
     */
    public function deletesubjectAction($id) {                                  //Delete subject
       
        $em = $this->getDoctrine()->getManager();
        $subject = $em->getRepository('AppBundle:Subject')->find($id);

        $em->remove($subject);
        $em->flush();

        $this->addFlash('notice', 'Subject has been successfully deleted ');

        return $this->redirectToRoute('admin_subject_dashboard');
    }
}
