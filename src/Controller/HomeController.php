<?php

namespace App\Controller;

use App\Entity\Career;
use App\Entity\Certification;
use App\Entity\Course;
use App\Entity\Education;
use App\Entity\Skill;
use App\Entity\Testimonial;
use App\Interface\Repository\CertificationInterface;
use App\Interface\Repository\CourseInterface;
use App\Interface\Repository\EducationInterface;
use App\Interface\Repository\SkillInterface;
use App\Interface\Repository\TestimonialInterface;
use App\Repository\CareerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CareerRepository<Career>              $careerRepository
     * @param CertificationInterface<Certification> $certification
     * @param CourseInterface<Course>               $course
     * @param EducationInterface<Education>         $education
     * @param SkillInterface<Skill>                 $skill
     * @param TestimonialInterface<Testimonial>     $testimonial
     *
     * @return Response
     */
    #[Route(path: '/', name: 'home')]
    public function index(
        CareerRepository $careerRepository,
        CertificationInterface $certification,
        CourseInterface $course,
        EducationInterface $education,
        SkillInterface $skill,
        TestimonialInterface $testimonial
    ): Response {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'career_experience' => $careerRepository->findAll(),
            'certifications' => $certification->findAll(),
            'courses' => $course->findAllCourses(),
            'education_experience' => $education->findAll(),
            'skills' => $skill->findAllSkills(),
            'testimonials' => $testimonial->findAllTestimonials(),
        ]);
    }
}
