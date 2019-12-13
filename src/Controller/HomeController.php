<?php
namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="app_homepage")
     */
    public function index()
    {
        $user = $this->getUser();

        return $this->render('index.html.twig', [
            'user' => $user,
        ]);

    }
}
