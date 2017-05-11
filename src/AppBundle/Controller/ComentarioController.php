<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comentario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comentario controller.
 *
 * @Route("comentario")
 */
class ComentarioController extends Controller {

    /**
     * Lists all comentario entities.
     *
     * @Route("/", name="comentario_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Comentario')->findAll();
        /*
          return $this->render('comentario/index.html.twig', array(
          'comentarios' => $comentarios,
          ));
         */


        $cabecera = array('Registro', 'Comentario', 'Fecha', 'Valoracion', 'Visible');

        $campos = array('idcomentario', 'comentario', 'fecha', 'valoracion', 'visible');
        $tipos = array('', '', 'd', '', '');


        return $this->render('muestratabla.html.twig', array(
                    'datos' => $datos,
                    'cabeceras' => $cabecera,
                    'campos' => $campos,
                    'campoclave' => $campos[0],
                    'titulo' => 'Comentarios',
                    'nombreruta' => 'comentario',
                    'nombreparametro' => $campos[0],
                    'tipos' => $tipos,
        ));
    }

    /**
     * Creates a new comentario entity.
     *
     * @Route("/new", name="comentario_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request) {
        $comentario = new Comentario();
        $form = $this->createForm('AppBundle\Form\ComentarioType', $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('comentario_show', array('idcomentario' => $comentario->getIdcomentario()));
        }

        return $this->render('crear.html.twig', array(
                    'comentario' => $comentario,
                    'form' => $form->createView(),
                    'volver'=>'comentario',
        ));
    }

    /**
     * Finds and displays a comentario entity.
     *
     * @Route("/{idcomentario}", name="comentario_show")
     * @Method("GET")
     */
    public function showAction(Comentario $comentario) {
        $deleteForm = $this->createDeleteForm($comentario);

        return $this->render('comentario/show.html.twig', array(
                    'comentario' => $comentario,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentario entity.
     *
     * @Route("/{idcomentario}/edit", name="comentario_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comentario $comentario) {
        $deleteForm = $this->createDeleteForm($comentario);
        $editForm = $this->createForm('AppBundle\Form\ComentarioType', $comentario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentario_show', array('idcomentario' => $comentario->getIdcomentario()));
        }

        return $this->render('editar.html.twig', array(
                    'comentario' => $comentario,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
                    'volver'=>'comentario',
        ));
    }

    /**
     * Deletes a comentario entity.
     *
     * @Route("/{idcomentario}", name="comentario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comentario $comentario) {
        $form = $this->createDeleteForm($comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario);
            $em->flush();
        }

        return $this->redirectToRoute('comentario_index');
    }

    /**
     * Creates a form to delete a comentario entity.
     *
     * @param Comentario $comentario The comentario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentario $comentario) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('comentario_delete', array('idcomentario' => $comentario->getIdcomentario())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

   

}
