<?php


namespace App\Controller\admin;


use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

/**
 * @property PropertyRepository repository
 */
class AdminPropertyController extends AbstractController
{
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     * @return Response
     */
    public function index()
    {
        $properties = $this->repository->findAll();
        return $this->render("admin/property/index.html.twig", compact('properties'));
    }

    /**
     * @Route("/admin/edit/{id}", name="admin.property.edit")
     * @param Property $property
     * @return Response
     */
    public function edit(Property $property)
    {
        $form = $this->createForm(Property::class, $property);
        return $this->render("admin/property/edit.html.twig", [
            'property' => $property,
            'form' => $form->createView()
        ]);
    }
}