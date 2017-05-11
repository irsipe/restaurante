<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Mesa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Mesa controller.
 *
 * @Route("mesa")
 */
class MesaController extends Controller
{
    /**
     * Lists all mesa entities.
     *
     * @Route("/", name="mesa_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Mesa')->findAll();
        $cabecera=array('Registro','NComensales','Ubicación'); 
        $campos=array('idmesa','ncomensales','ubicacion');
        $tipos=array('','',''); 
          
        
        return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Mesas',
       'nombreruta'=>'mesa',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
        /*
        return $this->render('mesa/index.html.twig', array(
            'mesas' => $mesas,
        ));
          
         */
    }

    /**
     * Creates a new mesa entity.
     *
     * @Route("/new", name="mesa_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mesa = new Mesa();
        $form = $this->createForm('AppBundle\Form\MesaType', $mesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mesa);
            $em->flush();

            return $this->redirectToRoute('mesa_show', array('idmesa' => $mesa->getIdmesa()));
        }

        return $this->render('crear.html.twig', array(
            'mesa' => $mesa,
            'form' => $form->createView(),
            'volver'=>'mesa',
        ));
    }

    /**
     * Finds and displays a mesa entity.
     *
     * @Route("/{idmesa}", name="mesa_show")
     * @Method("GET")
     */
    public function showAction(Mesa $mesa)
    {
        $deleteForm = $this->createDeleteForm($mesa);

        return $this->render('mesa/show.html.twig', array(
            'mesa' => $mesa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mesa entity.
     *
     * @Route("/{idmesa}/edit", name="mesa_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Mesa $mesa)
    {
        $deleteForm = $this->createDeleteForm($mesa);
        $editForm = $this->createForm('AppBundle\Form\MesaType', $mesa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mesa_show', array('idmesa' => $mesa->getIdmesa()));
        }

        return $this->render('editar.html.twig', array(
            'mesa' => $mesa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'volver'=>'mesa',
        ));
    }

    /**
     * Deletes a mesa entity.
     *
     * @Route("/{idmesa}", name="mesa_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Mesa $mesa)
    {
        $form = $this->createDeleteForm($mesa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mesa);
            $em->flush();
        }

        return $this->redirectToRoute('mesa_index');
    }

    /**
     * Creates a form to delete a mesa entity.
     *
     * @param Mesa $mesa The mesa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mesa $mesa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mesa_delete', array('idmesa' => $mesa->getIdmesa())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
