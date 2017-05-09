<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reservaplato;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reservaplato controller.
 *
 * @Route("reservaplato")
 */
class ReservaplatoController extends Controller
{
    /**
     * Lists all reservaplato entities.
     *
     * @Route("/", name="reservaplato_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Reservaplato')->findAll();
        
        $cabecera=array('Registro','Reserva','Menu dia','Plato');
        
        $campos=array('idreservaplato','idreserva','idlineamenu','idproducto');
            
        $tipos=array('','','','');
    
        return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Reserva Platos',
       'nombreruta'=>'reservaplato',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
        /*
        return $this->render('reservaplato/index.html.twig', array(
            'reservaplatos' => $reservaplatos,
        ));
        */
    }

    /**
     * Creates a new reservaplato entity.
     *
     * @Route("/new", name="reservaplato_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reservaplato = new Reservaplato();
        $form = $this->createForm('AppBundle\Form\ReservaplatoType', $reservaplato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservaplato);
            $em->flush();

            return $this->redirectToRoute('reservaplato_show', array('idreservaplato' => $reservaplato->getIdreservaplato()));
        }

        return $this->render('reservaplato/new.html.twig', array(
            'reservaplato' => $reservaplato,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reservaplato entity.
     *
     * @Route("/{idreservaplato}", name="reservaplato_show")
     * @Method("GET")
     */
    public function showAction(Reservaplato $reservaplato)
    {
        $deleteForm = $this->createDeleteForm($reservaplato);

        return $this->render('reservaplato/show.html.twig', array(
            'reservaplato' => $reservaplato,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reservaplato entity.
     *
     * @Route("/{idreservaplato}/edit", name="reservaplato_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reservaplato $reservaplato)
    {
        $deleteForm = $this->createDeleteForm($reservaplato);
        $editForm = $this->createForm('AppBundle\Form\ReservaplatoType', $reservaplato);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservaplato_edit', array('idreservaplato' => $reservaplato->getIdreservaplato()));
        }

        return $this->render('reservaplato/edit.html.twig', array(
            'reservaplato' => $reservaplato,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reservaplato entity.
     *
     * @Route("/{idreservaplato}", name="reservaplato_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reservaplato $reservaplato)
    {
        $form = $this->createDeleteForm($reservaplato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservaplato);
            $em->flush();
        }

        return $this->redirectToRoute('reservaplato_index');
    }

    /**
     * Creates a form to delete a reservaplato entity.
     *
     * @param Reservaplato $reservaplato The reservaplato entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reservaplato $reservaplato)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservaplato_delete', array('idreservaplato' => $reservaplato->getIdreservaplato())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
