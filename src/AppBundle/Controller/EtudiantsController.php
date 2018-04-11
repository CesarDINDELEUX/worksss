<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etudiants;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Etudiant controller.
 *
 * @Route("etudiants")
 */
class EtudiantsController extends Controller
{
    /**
     * Lists all etudiant entities.
     *
     * @Route("/", name="etudiants_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etudiants = $em->getRepository('AppBundle:Etudiants')->findAll();

        return $this->render('etudiants/index.html.twig', array(
            'etudiants' => $etudiants,
        ));
    }

    /**
     * Creates a new etudiant entity.
     *
     * @Route("/new", name="etudiants_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etudiant = new Etudiants();
        $form = $this->createForm('AppBundle\Form\EtudiantsType', $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('etudiants_show', array('id' => $etudiant->getId()));
        }

        return $this->render('etudiants/new.html.twig', array(
            'etudiant' => $etudiant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etudiant entity.
     *
     * @Route("/{id}", name="etudiants_show")
     * @Method("GET")
     */
    public function showAction(Etudiants $etudiant)
    {
        $deleteForm = $this->createDeleteForm($etudiant);

        return $this->render('etudiants/show.html.twig', array(
            'etudiant' => $etudiant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etudiant entity.
     *
     * @Route("/{id}/edit", name="etudiants_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etudiants $etudiant)
    {
        $deleteForm = $this->createDeleteForm($etudiant);
        $editForm = $this->createForm('AppBundle\Form\EtudiantsType', $etudiant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etudiants_edit', array('id' => $etudiant->getId()));
        }

        return $this->render('etudiants/edit.html.twig', array(
            'etudiant' => $etudiant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etudiant entity.
     *
     * @Route("/{id}", name="etudiants_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etudiants $etudiant)
    {
        $form = $this->createDeleteForm($etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etudiant);
            $em->flush();
        }

        return $this->redirectToRoute('etudiants_index');
    }

    /**
     * Creates a form to delete a etudiant entity.
     *
     * @param Etudiants $etudiant The etudiant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etudiants $etudiant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etudiants_delete', array('id' => $etudiant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
