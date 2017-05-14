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
        
        return $this->idioma('ES');
       
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
     * @Route("/muestracarta", name="muestracarta")
     */
    public function carta() {
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
        $query = "select * from  producto ";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $po1 = $stmt->fetchAll();
        return $this->render('carta.html.twig', ["carta" => $po1,]);
    }

    /**
     * @Route("/dondestamos", name="dondeestamos")
     */
    public function dondeEstamos() {
        return $this->render('dondeestamos.html.twig');
    }

    /**
     * @Route("/reservacliente", name="reservacliente")
     */
    public function reservaCliente() {
        return $this->render('reservacliente.html.twig');
    }

    /**
     * @Route("/nuestrahistoria", name="nuestrahistoria")
     */
    public function nuestraHistoria() {
        return $this->render('nuestrahistoria.html.twig');
    }

    /**
     * @Route("/muestracomment", name="muestracomment")
     */
    public function muestraComentarios() {
        $em = $this->getDoctrine()->getManager();
        $datos = $em->getRepository('AppBundle:Comentario')->findAll();
        return $this->render('comentarios.html.twig', array('datos' => $datos,));
    }

    /**
     * @Route("/preciomenu", name="preciomenu")
     */
    public function menuPrecio() {
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
        $query = "select * from menu   where fecha= :fechahoy";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':fechahoy', $hoy);
        $hoy = date("Ymd");
        $stmt->execute();
        $po1 = $stmt->fetch();
        return $po1;
    }

    
    /**
     * @Route("/areaclientes", name="areaclientes")
     */
    public function areaClientes() {
        return $this->render('areaclientes.html.twig');
    }

    /**
     * @Route("/nada", name="nada")
     */
    public function nada() {
        return $this->render('nada.html.twig');
    }
    
     /**
     * @Route("/idioma/{idioma}", name="idioma" ,requirements={"idioma"})  
     */
     public function idioma($idioma)
    {
        $platos1 = $this->menudiario(1,$idioma);
        $platos2 = $this->menudiario(2,$idioma);
        $platos3 = $this->menudiario(3,$idioma);
        $precio = $this->menuPrecio();
        return $this->render('default/index.html.twig', [
                    "menu1" => $platos1, "menu2" => $platos2, "menu3" => $platos3, "precio" => $precio,
        ]);
         
    }
    
    
    
    
/**
     * @Route("/dia/{dia}/{idioma}", name="menudiario")
     */
    public function menudiario($plato,$idioma) {
        $em = $this->getDoctrine()->getEntityManager();
        $db = $em->getConnection();
        $query = "select l.nombreplato_".$idioma." as nombreplato from menu join lineamenu l using(idmenu) where fecha= :fechahoy and idcategoria=" . $plato;
        $stmt = $db->prepare($query);
        $stmt->bindParam(':fechahoy', $hoy);
        $hoy = date("Ymd");
        $stmt->execute();
        $po1 = $stmt->fetchAll();
        return $po1;
    }

}
