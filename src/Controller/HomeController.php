<?php

namespace App\Controller;

use App\Entity\Career;
use App\Entity\Certification;
use App\Entity\Education;
use App\Interface\Repository\CertificationInterface;
use App\Interface\Repository\CourseInterface;
use App\Interface\Repository\EducationInterface;
use App\Interface\Repository\SkillInterface;
use App\Repository\CareerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CareerRepository<Career>              $careerRepository
     * @param CertificationInterface<Certification> $certification
     * @param EducationInterface<Education>         $education
     *
     * @return Response
     */
    #[Route(path: '/', name: 'home')]
    public function index(
        CareerRepository $careerRepository,
        EducationInterface $education,
        CertificationInterface $certification,
        CourseInterface $course,
        SkillInterface $skill
    ): Response {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'career_experience' => $careerRepository->findAll(),
            'certifications' => $certification->findAll(),
            'courses' => $course->findAllCourses(),
            'education_experience' => $education->findAll(),
            'skills' => $skill->findAllSkills(),
        ]);
    }
}
