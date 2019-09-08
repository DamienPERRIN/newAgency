<?php


namespace App\Controller;


use App\Entity\Property;
use App\Entity\PropertySearch;
use App\Form\PropertySearchType;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route(path="/biens", name="property.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request) :Response
    {
//        $property = new Property();
//        $property->setTitle("Mon premier bien")
//                ->setPrice(200000)
//                ->setRooms(4)
//                ->setBedrooms(3)
//                ->setDescription("La description de mon appartement")
//                ->setSurface(60)
//                ->setFloor(4)
//                ->setHeat(1)
//                ->setCity('Montpellier')
//                ->setAddress("37 rue de la jument")
//                ->setPostalCode("34350")
//                ->setCreatedAt(new DateTime());
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($property);
//        $em->flush();

//        $property = $this->repository->findAllVisible();
//        $property[0]->setSold('true');
//        $this->em->flush();
//        dump($property);

        $search = new PropertySearch();
        $form = $this->createForm(PropertySearchType::class, $search);
        $form->handleRequest($request);

        $properties = $paginator->paginate(
            $this->repository->findAllVisible($search),
            $request->query->getInt('page', 1),
            12
        );
        return $this->render("property/index.html.twig", [
            'current_menu' => 'propreties',
            'properties'   => $properties,
            'form'         => $form->createView()
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Property $property
     * @param string $slug
     * @return Response
     */
    public function show(Property $property, string $slug): Response
    {
//        $property = $this->repository->find($id);
        if ($property->getSlug() !== $slug){
            return $this->redirectToRoute('property/show.html.twig', [
                'id' => $property->getId(),
                'slug' => $property->getSlug()
            ], 301);
        }
        return $this->render('property/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);

    }
}