<?php

namespace App\Controller\Admin;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Entity\Stock;
use App\Entity\Usure;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Emprunt;
use App\Entity\Adherent;
use App\Entity\Exemplaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Yourbook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Adherent', 'fa-solid fa-user', Adherent::class);
        yield MenuItem::linkToCrud('Emprunt', 'fa-solid fa-right-left', Emprunt::class);
        yield MenuItem::linkToCrud('Livre', 'fa-solid fa-book', Livre::class);
        yield MenuItem::linkToCrud('Auteur', 'fa-solid fa-feather-pointed', Auteur::class);
        yield MenuItem::linkToCrud('Editeur', 'fa-regular fa-newspaper', Editeur::class);
        yield MenuItem::linkToCrud('Genre', 'fas fa-list', Genre::class);
        yield MenuItem::linkToCrud('Exemplaire', 'fa-solid fa-book-bookmark', Exemplaire::class);
        yield MenuItem::linkToCrud('Usure', 'fa-solid fa-battery-three-quarters', Usure::class);
        yield MenuItem::linkToCrud('Stock', 'fa-solid fa-layer-group', Stock::class);
    }
}
