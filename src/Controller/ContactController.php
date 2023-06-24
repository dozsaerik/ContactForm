<?php

namespace App\Controller;

use App\Service\ContactService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    private ContactService $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    #[Route('/contact/new', methods: ['POST'])]
    public function newContact(Request $request): JsonResponse
    {
        return $this->contactService->newContact($request);
    }

    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig');
    }
}
