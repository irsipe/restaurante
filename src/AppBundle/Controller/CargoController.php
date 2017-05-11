<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cargo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cargo controller.
 *
 * @Route("cargo")
 */
class CargoController extends Controller
{
    /**
     * Lists all cargo entities.
     *
     * @Route("/", name="cargo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Cargo')->findAll();

       /** 
       return $this->render('cargo/index.html.twig', array(
            'cargos' => $cargos,
        ));
       **/
       $cabecera=array('Registro','Descripción'); 
       $campos=array('idcargo','descripcion');
       $tipos=array('','');
      
       return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Cargos empleados',
       'nombreruta'=>'cargo',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,
        ));
    }

    /**
     * Creates a new cargo entity.
     *
     * @Route("/new", name="cargo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cargo = new Cargo();
        $form = $this->createForm('AppBundle\Form\CargoType', $cargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cargo);
            $em->flush();

            return $this->redirectToRoute('cargo_show', array('idcargo' => $cargo->getIdcargo()));
        }

        return $this->render('crear.html.twig', array(
            'cargo' => $cargo,
            'form' => $form->createView(),
            'volver'=>'cargo',
        ));
    }

    /**
     * Finds and displays a cargo entity.
     *
     * @Route("/{idcargo}", name="cargo_show")
     * @Method("GET")
     */
    public function showAction(Cargo $cargo)
    {
        $deleteForm = $this->createDeleteForm($cargo);

        return $this->render('cargo/show.html.twig', array(
            'cargo' => $cargo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cargo entity.
     *
     * @Route("/{idcargo}/edit", name="cargo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cargo $cargo)
    {
        $deleteForm = $this->createDeleteForm($cargo);
        $editForm = $this->createForm('AppBundle\Form\CargoType', $cargo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cargo_show', array('idcargo' => $cargo->getIdcargo()));
        }

        return $this->render('editar.html.twig', array(
            'cargo' => $cargo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'volver'=>'cargo',
        ));
    }

    /**
     * Deletes a cargo entity.
     *
     * @Route("/{idcargo}", name="cargo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cargo $cargo)
    {
        $form = $this->createDeleteForm($cargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cargo);
            $em->flush();
        }

        return $this->redirectToRoute('cargo_index');
    }

    /**
     * Creates a form to delete a cargo entity.
     *
     * @param Cargo $cargo The cargo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cargo $cargo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cargo_delete', array('idcargo' => $cargo->getIdcargo())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
