<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdVariantController extends AbstractController
{
    #[Route('/ad/variant', name: 'app_ad_variant')]
    public function index(): Response
    {
        return $this->render('ad_variant/index.html.twig', [
            'controller_name' => 'AdVariantController',
        ]);
    }
}
