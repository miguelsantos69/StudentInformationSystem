<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Student;
use Symfony\Component\Form\Extension\Core\Type\SearchType;


class DefaultController extends Controller {

    /**
     * @Route("/", name="main_page")
     */
    public function admindashboardAction() {
        return $this->render('index/main-page.html.twig');
    }
    
    /**
     * @Route("/search/teacher", name="search_t")
     */
    public function searchteacherAction(Request $request) {

        $form = $this->createForm(SearchType::class);
        
        $your_value = $request->get("search");

        $repository = $this->getDoctrine()->getManager();

        $query = $repository->createQuery(
                        'SELECT p FROM AppBundle:Teacher p
                         WHERE p.name LIKE :data 
                         OR p.surname LIKE :data')
                ->setParameter('data', $your_value);

        $result = $query->getResult();
        
        return $this->render('index/search_result.html.twig', [
                    'form' => $form->createView(),
                    'result' => $result
        ]);
        
    }
    
     /**
     * @Route("/search/student", name="search_s")
     */
    public function searchstudentAction(Request $request) {

        $form = $this->createForm(SearchType::class);
        
        $your_value = $request->get("search");

        $repository = $this->getDoctrine()->getManager();

        $query = $repository->createQuery(
                        'SELECT p FROM AppBundle:Student p
                         WHERE p.name LIKE :data 
                         OR p.surname LIKE :data')
                ->setParameter('data', $your_value);

        $result = $query->getResult();
        
        return $this->render('index/search_result.html.twig', [
                    'form' => $form->createView(),
                    'result' => $result
        ]);
        
    }

}
