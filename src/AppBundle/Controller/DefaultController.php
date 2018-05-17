<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;


class DefaultController extends Controller {

    /**
     * @Route("/", name="main_page")
     */
    public function mainAction() {
        return $this->render('index/main-page.html.twig');
    }
    
    /**
     * @Route("/search/teacher", name="search_t")
     */
    public function searchteacherAction(Request $request) {

        $form = $this->createForm(SearchType::class, 'Type teacher name or surname');       //Search teacher
        
        $search_value = $request->get("search");

        $repository = $this->getDoctrine()->getManager();

        $query = $repository->createQuery(
                        'SELECT p FROM AppBundle:Teacher p
                         WHERE p.name LIKE :data 
                         OR p.surname LIKE :data')
                ->setParameter('data', $search_value);

        $result = $query->getResult();
        
        if(isset ($search_value) && !$result) {
            
            $this->addFlash('notice', 'User not found');
        }
        
        return $this->render('index/search_result.html.twig', [
                    'form' => $form->createView(),
                    'result' => $result
        ]);
        
    }
    
     /**
     * @Route("/search/student", name="search_s")
     */
    public function searchstudentAction(Request $request) {

        $form = $this->createForm(SearchType::class, 'Type student name or surname');       //Search student
        
        $search_value = $request->get("search");

        $repository = $this->getDoctrine()->getManager();

        $query = $repository->createQuery(
                        'SELECT p FROM AppBundle:Student p
                         WHERE p.name LIKE :data 
                         OR p.surname LIKE :data')
                ->setParameter('data', $search_value);

        $result = $query->getResult();
        
        if(isset ($search_value) && !$result) {
            
            $this->addFlash('notice', 'User not found');
        }
       
        return $this->render('index/search_result.html.twig', [
                    'form' => $form->createView(),
                    'result' => $result
        ]);
        
    }

}
