<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CarType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GetCarsFromApi;

class CarController extends AbstractController
{
    #[Route('/', name: 'app_cars')]
    public function index(Request $request, GetCarsFromApi $getCarsFromApi): Response
    {
        $form = $this->createForm(CarType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render('car/index.html.twig', [
                'form' => $form,
                'cars' => $getCarsFromApi->get($form->getData()),
            ]);
        }
        return $this->render('car/index.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/about', name: 'app_about')]
    public function show_car(): Response
    {
        return $this->render('car/about.html.twig');
    }
}
