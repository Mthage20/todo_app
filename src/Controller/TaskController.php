<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Task;
use App\Controller;
use DateTimeImmutable; 

class TaskController extends AbstractController
{
    #[Route('/', name: 'to-do')]
    public function index(ManagerRegistry $doctrine): Response
    { $todos = $doctrine->getRepository(Task::class)->findBy([],
    ['id'=>'DESC']);
    
      // Converting Task entities to arrays (so they can actually be shown by the svelte component)
      $todosArray = [];
      foreach ($todos as $todo) {
          $todosArray[] = [
              'id' => $todo->getId(),
              'title' => $todo->getTitle(),
              'description' => $todo->getDescription(),
              'createdAt' => $todo->getCreatedAt()->format('d-m-Y H:i:s'), 
              'status' => $todo->isCompleted(),
          ];
      }
      return $this->render('index.html.twig', ['todos' => $todosArray]);
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create(Request $request, ManagerRegistry $doctrine) : Response
    {  
      $title = trim($request->request->get('title'));
      if(empty($title))
      return $this->redirectToRoute('to-do');
      
      $description = trim($request->request->get('description'));

      $entityManager = $doctrine->getManager();

      $task = new Task;
      $task -> setTitle($title);
      $task -> setDescription($description);
      $task -> setCreatedAt(new DateTimeImmutable());
      $entityManager->persist($task);
      $entityManager->flush();

      return $this->redirectToRoute('to-do');
    }

    
    #[Route('/changeStatus/{id}', name: 'change_status')]
    public function changeStatus($id,  ManagerRegistry $doctrine)
    {
      $entityManager = $doctrine->getManager();
    $task = $entityManager->getRepository(Task::class)->find($id);

    $task->setCompleted(!$task->isCompleted());
    $entityManager->flush();
      return $this->redirectToRoute('to-do');
    }

    #[Route('/delete/{id}', name: 'task_delete')]
    public function delete($id, ManagerRegistry $doctrine)
    {
      $entityManager = $doctrine->getManager();
      $task = $entityManager->getRepository(Task::class)->find($id);
      $entityManager -> remove($task);
      $entityManager -> flush();
      return $this->redirectToRoute('to-do');
    }

}