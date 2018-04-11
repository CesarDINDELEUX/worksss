<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Intervenants;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Intervenant controller.
 *
 * @Route("intervenants")
 */
class IntervenantsController extends Controller
{
    /**
     * Lists all intervenant entities.
     *
     * @Route("/", name="intervenants_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $intervenants = $em->getRepository('AppBundle:Intervenants')->findAll();

        return $this->render('intervenants/index.html.twig', array(
            'intervenants' => $intervenants,
        ));
    }

    /**
     * Creates a new intervenant entity.
     *
     * @Route("/new", name="intervenants_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $intervenant = new Intervenant();
        $form = $this->createForm('AppBundle\Form\IntervenantsType', $intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervenant);
            $em->flush();

            return $this->redirectToRoute('intervenants_show', array('id' => $intervenant->getId()));
        }

        return $this->render('intervenants/new.html.twig', array(
            'intervenant' => $intervenant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a intervenant entity.
     *
     * @Route("/{id}", name="intervenants_show")
     * @Method("GET")
     */
    public function showAction(Intervenants $intervenant)
    {
        $deleteForm = $this->createDeleteForm($intervenant);

        return $this->render('intervenants/show.html.twig', array(
            'intervenant' => $intervenant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing intervenant entity.
     *
     * @Route("/{id}/edit", name="intervenants_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Intervenants $intervenant)
    {
        $deleteForm = $this->createDeleteForm($intervenant);
        $editForm = $this->createForm('AppBundle\Form\IntervenantsType', $intervenant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervenants_edit', array('id' => $intervenant->getId()));
        }

        return $this->render('intervenants/edit.html.twig', array(
            'intervenant' => $intervenant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a intervenant entity.
     *
     * @Route("/{id}", name="intervenants_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Intervenants $intervenant)
    {
        $form = $this->createDeleteForm($intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervenant);
            $em->flush();
        }

        return $this->redirectToRoute('intervenants_index');
    }

    /**
     * Creates a form to delete a intervenant entity.
     *
     * @param Intervenants $intervenant The intervenant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intervenants $intervenant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('intervenants_delete', array('id' => $intervenant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
