<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\Student;


class DefaultController extends Controller {

    /**
     * @Route("/", name="main_page")
     */
    public function admindashboardAction() {
        return $this->render('index/main-page.html.twig');
    }

    /**
     * @Route("/search/result", name="search")
     */
    public function searchteacherAction(Request $request) {

        $your_value = $request->get("find");

        $repository = $this->getDoctrine()->getManager();

        $query = $repository->createQuery(
                        'SELECT p FROM AppBundle:Teacher p
                         WHERE p.name LIKE :data 
                         OR p.surname LIKE :data')
                ->setParameter('data', $your_value);


        $result = $query->getResult();


        if (!$result) {
            $this->addFlash('notice', "This teacher doesn't exist");
        }
        return $this->render('index/searchresult.html.twig', [
                    'result' => $result
        ]);
    }

}
