<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Jetons;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Jeton controller.
 *
 * @Route("jetons")
 */
class JetonsController extends Controller
{
    /**
     * Lists all jeton entities.
     *
     * @Route("/", name="jetons_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jetons = $em->getRepository('AppBundle:Jetons')->findAll();

        return $this->render('jetons/index.html.twig', array(
            'jetons' => $jetons,
        ));
    }

    /**
     * Creates a new jeton entity.
     *
     * @Route("/new", name="jetons_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $jeton = new Jetons();
        $form = $this->createForm('AppBundle\Form\JetonsType', $jeton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeton);
            $em->flush();

            return $this->redirectToRoute('jetons_show', array('id' => $jeton->getId()));
        }

        return $this->render('jetons/new.html.twig', array(
            'jeton' => $jeton,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jeton entity.
     *
     * @Route("/{id}", name="jetons_show")
     * @Method("GET")
     */
    public function showAction(Jetons $jeton)
    {
        $deleteForm = $this->createDeleteForm($jeton);

        return $this->render('jetons/show.html.twig', array(
            'jeton' => $jeton,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jeton entity.
     *
     * @Route("/{id}/edit", name="jetons_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Jetons $jeton)
    {
        $deleteForm = $this->createDeleteForm($jeton);
        $editForm = $this->createForm('AppBundle\Form\JetonsType', $jeton);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jetons_edit', array('id' => $jeton->getId()));
        }

        return $this->render('jetons/edit.html.twig', array(
            'jeton' => $jeton,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jeton entity.
     *
     * @Route("/{id}", name="jetons_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Jetons $jeton)
    {
        $form = $this->createDeleteForm($jeton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jeton);
            $em->flush();
        }

        return $this->redirectToRoute('jetons_index');
    }

    /**
     * Creates a form to delete a jeton entity.
     *
     * @param Jetons $jeton The jeton entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jetons $jeton)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jetons_delete', array('id' => $jeton->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
