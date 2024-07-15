<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Requirement\Requirement;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_index')]
    public function index(): Response
    {
        return new Response('Hello World !');
    }

    #[Route('/hello/{name}', name: 'home_hello')]

    public function hello(Request $request): Response
    {
        $request->get('name');

        return new Response('Bonjour' . $request->get('name'));
    }

    #[Route('/age/{age}', name: 'home_age', requirements: ['age' => Requirement::DIGITS])]

    public function age($age): Response
    {
        return new Response("Bonjour, j'ai $age ans.");
    }

    #[Route('/template/{para}', name: 'home_template')]

    public function template($para): Response
    {
        $animal = ['lion', 'tigre', 'ours', 'chat', 'loup'];

        return $this->render('home/index.html.twig', ['name' => 'Oura', 'paragraphe' => $para, 'animals' => $animal]);
    }
}
