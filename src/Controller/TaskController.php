<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Task;

class TaskController extends AbstractController
{
    #[Route('/', name: 'to-do')]
    public function index(TaskRepository $taskRepository): Response
    {
        $todos = $taskRepository->findBy([], ['isCompleted' => 'ASC', 'id' => 'DESC']);

        // Convert Task entities to arrays
        $todosArray = [];
        foreach ($todos as $todo) {
            $todoData = $todo->jsonSerialize();
            $todosArray[] = $todoData;
        }
        return $this->render('index.html.twig', ['todos' => $todosArray]);
    }

    #[Route('/create', name: 'create_task', methods: ['POST'])]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $title = trim($request->request->get('title'));
        if (empty($title)) {
            return $this->redirectToRoute('to-do');
        }

        $description = trim($request->request->get('description'));

        // Create a new Task entity with provided title, description, and current timestamp
        $task = new Task();
        $task->setTitle($title);
        $task->setDescription($description);
        $task->setCreatedAt(new \DateTimeImmutable());

        // Persist the new task to the database
        $entityManager = $doctrine->getManager();
        $entityManager->persist($task);
        $entityManager->flush();

        return $this->redirectToRoute('to-do');
    }

    #[Route('/changeStatus/{id}', name: 'change_status')]
    public function changeStatus($id, TaskRepository $taskRepository, ManagerRegistry $doctrine): Response
    {
        $task = $taskRepository->find($id);

        if ($task) {
            $task->setCompleted(!$task->isCompleted());
            $entityManager = $doctrine->getManager();
            $entityManager->flush();
        }

        return $this->redirectToRoute('to-do');
    }

    #[Route('/delete/{id}', name: 'task_delete')]
    public function delete(Task $task, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        if ($task) {
            $entityManager->remove($task);
            $entityManager->flush();
        }

        return $this->redirectToRoute('to-do');
    }

}