<?php

namespace App\Controller\Admin;

use App\Entity\Usure;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UsureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Usure::class;
    }

}
