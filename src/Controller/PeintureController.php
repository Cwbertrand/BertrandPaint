<?php

namespace App\Controller;

use App\Repository\PeintureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PeintureController extends AbstractController
{
    /**
     * @Route("/realisation", name="realisation")
     */
    public function realisation(
        PeintureRepository $peintureRepository,
        PaginatorInterface $paginator,
        Request $request
        ): Response {
            $data = $peintureRepository->findAll();

            $peintures = $paginator->paginate(
                $data,
                $request->query->getInt('page', 1),
                6
            );
        return $this->render('peinture/realisation.html.twig', [
            'peintures' => $peintures,
        ]);
    }
}
