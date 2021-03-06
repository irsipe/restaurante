<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Personal controller.
 *
 * @Route("personal")
 */
class PersonalController extends Controller
{
    /**
     * Lists all personal entities.
     *
     * @Route("/", name="personal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Personal')->findAll();
        
        $cabecera=array('Registro','Nombre','Apellido1','Apellido2','Nacionalidad'
            ,'Telefono Fijo','Movil','Email','Direccion','Poblacion','Fecha de nacimiento');
        
        $campos=array('idremesa','Nombre','Apellido1','Apellido2','Nacionalidad'
            ,'Telefonofijo','Movil','Email','Direccion','Poblacion','Fechanacimiento');
        $tipos=array('','','','','','','','','','d');
    
        return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Personal',
       'nombreruta'=>'personal',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
        /* 
        return $this->render('personal/index.html.twig', array(
            'personals' => $personals,
        ));
         
        */
    }

    /**
     * Creates a new personal entity.
     *
     * @Route("/new", name="personal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $personal = new Personal();
        $form = $this->createForm('AppBundle\Form\PersonalType', $personal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personal);
            $em->flush();

            return $this->redirectToRoute('personal_show', array('idpersonal' => $personal->getIdpersonal()));
        }

        return $this->render('crear.html.twig', array(
            'personal' => $personal,
            'form' => $form->createView(),
            'volver'=>'personal',
        ));
    }

    /**
     * Finds and displays a personal entity.
     *
     * @Route("/{idpersonal}", name="personal_show")
     * @Method("GET")
     */
    public function showAction(Personal $personal)
    {
        $deleteForm = $this->createDeleteForm($personal);

        return $this->render('personal/show.html.twig', array(
            'personal' => $personal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personal entity.
     *
     * @Route("/{idpersonal}/edit", name="personal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Personal $personal)
    {
        $deleteForm = $this->createDeleteForm($personal);
        $editForm = $this->createForm('AppBundle\Form\PersonalType', $personal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personal_show', array('idpersonal' => $personal->getIdpersonal()));
        }

        return $this->render('editar.html.twig', array(
            'personal' => $personal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'volver'=>'personal',
        ));
    }

    /**
     * Deletes a personal entity.
     *
     * @Route("/{idpersonal}", name="personal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Personal $personal)
    {
        $form = $this->createDeleteForm($personal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personal);
            $em->flush();
        }

        return $this->redirectToRoute('personal_index');
    }

    /**
     * Creates a form to delete a personal entity.
     *
     * @param Personal $personal The personal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personal $personal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personal_delete', array('idpersonal' => $personal->getIdpersonal())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
