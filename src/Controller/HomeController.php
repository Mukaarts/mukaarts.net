<?php

namespace App\Controller;

use App\Entity\EmploymentType;
use App\Repository\EmploymentTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param EmploymentTypeRepository<EmploymentType> $employmentTypeRepository
     *
     * @return Response
     */
    #[Route(path: '/', name: 'home')]
    public function index(EmploymentTypeRepository $employmentTypeRepository): Response
    {
        /** @var EmploymentType $employmentTypes */
        $employmentTypes = $employmentTypeRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'employmentTypes' => $employmentTypes,
        ]);
    }
}
