<?php

namespace App\Service;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactService
{
    private EntityManagerInterface $entityManager;
    private SerializerInterface $serializer;
    private ValidatorInterface $validator;

    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    public function newContact(Request $request): JsonResponse
    {
        $response = [
            'status' => 'error',
            'message' => 'Missing value(s)',
            'data' => null
        ];

        $contact = $this->serializer->deserialize($request->getContent(), Contact::class, 'json');
        $errors = $this->validator->validate($contact);


        if ($errors->count() === 0) {
            try {
                $this->entityManager->persist($contact);
                $this->entityManager->flush();

                $response['status'] = 'success';
                $response['message'] = 'New report was successfully added';
                $response['data'] = $contact;
            } catch (\Exception $e) {
                $response['message'] = 'Database error';
            }
        }

        return new JsonResponse($response);
    }

}