<?php

namespace App\Controller;

use App\Entity\Career;
use App\Entity\Education;
use App\Interface\Repository\EducationInterface;
use App\Repository\CareerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CareerRepository<Career>      $careerRepository
     * @param EducationInterface<Education> $education
     *
     * @return Response
     */
    #[Route(path: '/', name: 'home')]
    public function index(CareerRepository $careerRepository, EducationInterface $education): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'career_experience' => $careerRepository->findAll(),
            'education_experience' => $education->findAll(),
        ]);
    }
}
