<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cliente;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cliente controller.
 *
 * @Route("cliente")
 */
class ClienteController extends Controller
{
    /**
     * Lists all cliente entities.
     *
     * @Route("/", name="cliente_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Cliente')->findAll();
        /* 
        return $this->render('cliente/index.html.twig', array(
            'clientes' => $clientes,
        ));
        */

        $cabecera=array('Registro','Nombre','Apellido1','Apellido2','Idioma','Fechanacimiento',
                        'Email','Movil','Tffijo','Direccion','Poblacion',
                        'Fechaalta','Fechabaja','Descuento','Activo','Nvisitas'); 
        
        $campos=array('idcliente','nombre','apellido1','apellido2','idioma','fechanacimiento',
                      'email','movil','tffijo','direccion','poblacion',
                      'fechaalta','fechabaja','descuento','activo','nvisitas');  
        $tipos=array('','','','','','d','','','','','','d','d','','b','');        
      
       return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Clientes',
       'nombreruta'=>'cliente',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
    }

    /**
     * Creates a new cliente entity.
     *
     * @Route("/new", name="cliente_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cliente = new Cliente();
        $form = $this->createForm('AppBundle\Form\ClienteType', $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();

           return $this->redirectToRoute('cliente_show', array('idcliente' => $cliente->getIdcliente()));
        }

        return $this->render('crear.html.twig',  array(
            'cliente' => $cliente,
            'form' => $form->createView(),
            'volver'=>'cliente',
        ));
    }

    /**
     * Finds and displays a cliente entity.
     *
     * @Route("/{idcliente}", name="cliente_show")
     * @Method("GET")
     */
    public function showAction(Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);

        return $this->render('cliente/show.html.twig', array(
            'cliente' => $cliente,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cliente entity.
     *
     * @Route("/{idcliente}/edit", name="cliente_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cliente $cliente)
    {
        $deleteForm = $this->createDeleteForm($cliente);
        $editForm = $this->createForm('AppBundle\Form\ClienteType', $cliente);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cliente_show', array('idcliente' => $cliente->getIdcliente()));
        }

        return $this->render('editar.html.twig', array(
            'cliente' => $cliente,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'volver'=>'cliente',
        ));
    }

    /**
     * Deletes a cliente entity.
     *
     * @Route("/{idcliente}", name="cliente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cliente $cliente)
    {
        $form = $this->createDeleteForm($cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cliente);
            $em->flush();
        }

        return $this->redirectToRoute('cliente_index');
    }

    /**
     * Creates a form to delete a cliente entity.
     *
     * @param Cliente $cliente The cliente entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cliente $cliente)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cliente_delete', array('idcliente' => $cliente->getIdcliente())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
