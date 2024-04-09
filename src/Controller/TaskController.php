<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Task;

class TaskController extends AbstractController
{
    #[Route('/', name: 'to-do')]
    public function index(): Response
    {   
       return $this->render('index.html.twig');
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create()
    {   
       exit("to do>: create a new task!");
    }

    
    #[Route('/changeStatus/{id}', name: 'change_status')]
    public function changeStatus($id)
    {
      exit("to do>: switch status of the task! $id!");
    }

    #[Route('/delete/{id}', name: 'task_delete')]
    public function delete($id)
    {
      exit("todo: delete a task with the id of $id!");
    }

}