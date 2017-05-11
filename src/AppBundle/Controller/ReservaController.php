<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reserva;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reserva controller.
 *
 * @Route("reserva")
 */
class ReservaController extends Controller
{
    /**
     * Lists all reserva entities.
     *
     * @Route("/", name="reserva_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Reserva')->findAll();
        
        $cabecera=array('Registro','Fecha','Ncomensales','Nombre','mesa'); 
        $campos=array('idreserva','Fecha','Ncomensales','Nombre','idmesa');
        $tipos=array('','d','','','',''); 
         
        
        return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Reservas',
       'nombreruta'=>'reserva',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
        /*
        return $this->render('reserva/index.html.twig', array(
            'reservas' => $reservas,
        ));
        */
    }

    /**
     * Creates a new reserva entity.
     *
     * @Route("/new", name="reserva_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reserva = new Reserva();
        $form = $this->createForm('AppBundle\Form\ReservaType', $reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reserva);
            $em->flush();

           // return $this->redirectToRoute('reserva_show', array('idreserva' => $reserva->getIdreserva()));
        }

        return $this->render('reservacliente.html.twig', array(
            'reserva' => $reserva,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reserva entity.
     *
     * @Route("/{idreserva}", name="reserva_show")
     * @Method("GET")
     */
    public function showAction(Reserva $reserva)
    {
        $deleteForm = $this->createDeleteForm($reserva);

        return $this->render('reserva/show.html.twig', array(
            'reserva' => $reserva,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reserva entity.
     *
     * @Route("/{idreserva}/edit", name="reserva_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reserva $reserva)
    {
        $deleteForm = $this->createDeleteForm($reserva);
        $editForm = $this->createForm('AppBundle\Form\ReservaType', $reserva);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reserva_edit', array('idreserva' => $reserva->getIdreserva()));
        }

        return $this->render('reserva/edit.html.twig', array(
            'reserva' => $reserva,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reserva entity.
     *
     * @Route("/{idreserva}", name="reserva_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reserva $reserva)
    {
        $form = $this->createDeleteForm($reserva);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reserva);
            $em->flush();
        }

        return $this->redirectToRoute('reserva_index');
    }

    /**
     * Creates a form to delete a reserva entity.
     *
     * @param Reserva $reserva The reserva entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reserva $reserva)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reserva_delete', array('idreserva' => $reserva->getIdreserva())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
