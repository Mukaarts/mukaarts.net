<?php

namespace App\Controller\Admin;

use App\Entity\BlogArticle;
use App\Entity\Career;
use App\Entity\Certification;
use App\Entity\Course;
use App\Entity\Education;
use App\Entity\Mentor;
use App\Entity\Project;
use App\Entity\Skill;
use App\Entity\Testimonial;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mukaarts');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Experience');
        yield MenuItem::linkToCrud('Career', 'fa fa-briefcase', Career::class);
        yield MenuItem::linkToCrud('Education', 'fa fa-graduation-cap', Education::class);
        yield MenuItem::linkToCrud('Projects', 'fa fa-folder-open', Project::class);
        yield MenuItem::linkToCrud('Blog Posts', 'fa fa-book', BlogArticle::class);

        yield MenuItem::section('Learning');
        yield MenuItem::linkToCrud('Certification', 'fa fa-certificate', Certification::class);
        yield MenuItem::linkToCrud('Course', 'fa fa-book', Course::class);

        yield MenuItem::section('Configuration');
        yield MenuItem::linkToCrud('Skill', 'fa fa-star', Skill::class);
        yield MenuItem::linkToCrud('Mentor', 'fa fa-user-tie', Mentor::class);
        yield MenuItem::linkToCrud('Testimonial', 'fa fa-quote-right', Testimonial::class);
    }
}
