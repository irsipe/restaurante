<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();

        $query = "select * from menu join lineamenu using(idmenu) where fecha= '20170509' and idcategoria=1;";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po1 = $stmt->fetchAll();
        
        $query = "select * from menu join lineamenu using(idmenu) where fecha= '20170509' and idcategoria=2;";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);
        $po2 = $stmt->fetchAll();      
        $query = "select * from menu join lineamenu using(idmenu) where fecha= '20170509' and idcategoria=3;";
        $stmt = $db->prepare($query);
        $params = array();
        $stmt->execute($params);    
        $po3 = $stmt->fetchAll();
        

        return $this->render('default/index.html.twig', [                   
            "menu1"=> $po1,"menu2"=> $po2,"menu3"=> $po3,
        ]);
    }

    /**
     * @Route("/tablas", name="tablas")
     */
    public function Mantenimiento(Request $request) {
        return $this->render('tablas.html.twig');
    }

    /**
     * @Route("/admin")
     */
    public function adminAction() {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /**
     * @Route("/dondestamos", name="dondeestamos")
     */
    public function dondeEstamos() {
        return $this->render('dondeestamos.html.twig');
    }

}
