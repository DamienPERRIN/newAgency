<?php


namespace App\Controller;


use App\Entity\Property;
use App\Repository\PropertyRepository;
use DateTime;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @return Response
     * @throws Exception
     */
    public function index() :Response
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
        return $this->render("property/index.html.twig", [
            'current_menu' => 'propreties'
        ]);
    }
}