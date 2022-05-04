<?php

namespace App\Controller;

use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CarsRepository $carsRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'cars' => $carsRepository->findAll()
        ]);
    }

    #[Route('/car/{id}', name: 'app_single')]
    public function region(CarsRepository $carsRepository, $id): Response
    {
        return $this->render('main/add.html.twig', [
            'car' => $carsRepository->find($id),
        ]);
    }
}
