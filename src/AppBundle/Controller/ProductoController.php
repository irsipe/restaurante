<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Producto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Producto controller.
 *
 * @Route("producto")
 */
class ProductoController extends Controller
{
    /**
     * Lists all producto entities.
     *
     * @Route("/", name="producto_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $datos = $em->getRepository('AppBundle:Producto')->findAll();
        $cabecera=array('Registro','Nombre ES','Nombre CAT','Nombre EN',
                                   'Descripcion ES','Descripcion CAT','Descripcion EN',
                                   'Preparacion ES','Preparacion CAT','Preparacion EN',
                                   'Precio' ,'Imagen'); 
        $campos=array('idproducto','Nombrees','Nombrecat','Nombreen','Descripciones','Descripcioncat',
                    'Descripcionen','Preparaciones','Preparacioncat','Preparacionen','Precio','Imagen');
        $tipos=array('','','','','','','','','','','',''); 
          
        
        return $this->render('muestratabla.html.twig', array(
       'datos' => $datos,
       'cabeceras'=>$cabecera,
       'campos'=>$campos,
       'campoclave'=>$campos[0],
       'titulo'=>'Productos',
       'nombreruta'=>'producto',  
       'nombreparametro'=>$campos[0],
       'tipos'=>$tipos,    
        ));
        /*
        return $this->render('producto/index.html.twig', array(
            'productos' => $productos,
        ));
          
        */
    }

    /**
     * Creates a new producto entity.
     *
     * @Route("/new", name="producto_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Producto();
        $form = $this->createForm('AppBundle\Form\ProductoType', $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('producto_show', array('idproducto' => $producto->getIdproducto()));
        }

        return $this->render('crear.html.twig', array(
            'producto' => $producto,
            'form' => $form->createView(),
            'volver'=>'producto',
        ));
    }

    /**
     * Finds and displays a producto entity.
     *
     * @Route("/{idproducto}", name="producto_show")
     * @Method("GET")
     */
    public function showAction(Producto $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);

        return $this->render('producto/show.html.twig', array(
            'producto' => $producto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing producto entity.
     *
     * @Route("/{idproducto}/edit", name="producto_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Producto $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);
        $editForm = $this->createForm('AppBundle\Form\ProductoType', $producto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producto_show', array('idproducto' => $producto->getIdproducto()));
        }

        return $this->render('editar.html.twig', array(
            'producto' => $producto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'volver'=>'producto',
        ));
    }

    /**
     * Deletes a producto entity.
     *
     * @Route("/{idproducto}", name="producto_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Producto $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('producto_index');
    }

    /**
     * Creates a form to delete a producto entity.
     *
     * @param Producto $producto The producto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Producto $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('producto_delete', array('idproducto' => $producto->getIdproducto())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
