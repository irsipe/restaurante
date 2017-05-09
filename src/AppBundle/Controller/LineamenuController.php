<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Lineamenu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lineamenu controller.
 *
 * @Route("lineamenu")
 */
class LineamenuController extends Controller
{
    /**
     * Lists all lineamenu entities.
     *
     * @Route("/", name="lineamenu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Lineamenu')->findAll();
        
        //print_r($datos);
        $cabecera=array('Registro','Nombreplato ES','Nombreplato CAT','Nombreplato EN');
        
        $campos=array('idlineamenu','nombreplatoEs','nombreplatoCat','nombreplatoEn');
            
        $tipos=array('','','','','','');
    
        return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Lineas Menu',
       'nombreruta'=>'lineamenu',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
        /*
        return $this->render('lineamenu/index.html.twig', array(
            'lineamenus' => $lineamenus,
        ));
         
         */
    }

    /**
     * Creates a new lineamenu entity.
     *
     * @Route("/new", name="lineamenu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lineamenu = new Lineamenu();
        $form = $this->createForm('AppBundle\Form\LineamenuType', $lineamenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lineamenu);
            $em->flush();

            return $this->redirectToRoute('lineamenu_show', array('idlineamenu' => $lineamenu->getIdlineamenu()));
        }

        return $this->render('lineamenu/new.html.twig', array(
            'lineamenu' => $lineamenu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lineamenu entity.
     *
     * @Route("/{idlineamenu}", name="lineamenu_show")
     * @Method("GET")
     */
    public function showAction(Lineamenu $lineamenu)
    {
        $deleteForm = $this->createDeleteForm($lineamenu);

        return $this->render('lineamenu/show.html.twig', array(
            'lineamenu' => $lineamenu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lineamenu entity.
     *
     * @Route("/{idlineamenu}/edit", name="lineamenu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lineamenu $lineamenu)
    {
        $deleteForm = $this->createDeleteForm($lineamenu);
        $editForm = $this->createForm('AppBundle\Form\LineamenuType', $lineamenu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lineamenu_edit', array('idlineamenu' => $lineamenu->getIdlineamenu()));
        }

        return $this->render('lineamenu/edit.html.twig', array(
            'lineamenu' => $lineamenu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lineamenu entity.
     *
     * @Route("/{idlineamenu}", name="lineamenu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lineamenu $lineamenu)
    {
        $form = $this->createDeleteForm($lineamenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lineamenu);
            $em->flush();
        }

        return $this->redirectToRoute('lineamenu_index');
    }

    /**
     * Creates a form to delete a lineamenu entity.
     *
     * @param Lineamenu $lineamenu The lineamenu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lineamenu $lineamenu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lineamenu_delete', array('idlineamenu' => $lineamenu->getIdlineamenu())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
