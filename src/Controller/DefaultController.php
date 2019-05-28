<?php
namespace App\Controller;

use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $teams = $this->getDoctrine()
            ->getRepository(Team::class)
            ->findLatest();

        var_dump($teams);

        return $this->render('default/index.html.twig', [
            'teams' => $teams,
        ]);
    }
}