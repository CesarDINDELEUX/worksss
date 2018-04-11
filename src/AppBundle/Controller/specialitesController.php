<?php

namespace AppBundle\Controller;

use AppBundle\Entity\specialites;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Specialite controller.
 *
 * @Route("specialites")
 */
class specialitesController extends Controller
{
    /**
     * Lists all specialite entities.
     *
     * @Route("/", name="specialites_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $specialites = $em->getRepository('AppBundle:specialites')->findAll();

        return $this->render('specialites/index.html.twig', array(
            'specialites' => $specialites,
        ));
    }

    /**
     * Creates a new specialite entity.
     *
     * @Route("/new", name="specialites_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $specialite = new Specialite();
        $form = $this->createForm('AppBundle\Form\specialitesType', $specialite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($specialite);
            $em->flush();

            return $this->redirectToRoute('specialites_show', array('id' => $specialite->getId()));
        }

        return $this->render('specialites/new.html.twig', array(
            'specialite' => $specialite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a specialite entity.
     *
     * @Route("/{id}", name="specialites_show")
     * @Method("GET")
     */
    public function showAction(specialites $specialite)
    {
        $deleteForm = $this->createDeleteForm($specialite);

        return $this->render('specialites/show.html.twig', array(
            'specialite' => $specialite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing specialite entity.
     *
     * @Route("/{id}/edit", name="specialites_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, specialites $specialite)
    {
        $deleteForm = $this->createDeleteForm($specialite);
        $editForm = $this->createForm('AppBundle\Form\specialitesType', $specialite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('specialites_edit', array('id' => $specialite->getId()));
        }

        return $this->render('specialites/edit.html.twig', array(
            'specialite' => $specialite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a specialite entity.
     *
     * @Route("/{id}", name="specialites_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, specialites $specialite)
    {
        $form = $this->createDeleteForm($specialite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($specialite);
            $em->flush();
        }

        return $this->redirectToRoute('specialites_index');
    }

    /**
     * Creates a form to delete a specialite entity.
     *
     * @param specialites $specialite The specialite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(specialites $specialite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('specialites_delete', array('id' => $specialite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
