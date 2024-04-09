<script>
  export let todos;
</script>

<style>
  .todo-list {
    list-style: none;
    padding: 0;
  }

  .todo-item {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }

  .todo-item.completed {
    background-color: #e1f7d5; /* Light green background for completed tasks */
  }

  .todo-buttons {
    margin-top: 5px;
  }

  .todo-buttons a {
    margin-right: 5px;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    text-decoration: none;
    color: #333;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .todo-buttons a:hover {
    background-color: #f0f0f0;
  }
</style>

<ul class="todo-list">
  {#each todos as todo}
    <li class="todo-item {todo.status ? 'completed' : ''}">
      <div>{todo.id}</div>
      <div>{todo.title}</div>
      <div>{todo.description}</div>
      <div>{todo.createdAt}</div>
      <div class="todo-buttons">
        <a href={`/delete/${todo.id}`} onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
        <a href={`/changeStatus/${todo.id}`}>
          {todo.status ? "Mark as Undone" : "Mark as Done"}
        </a>
      </div>
    </li>
  {/each}
</ul>
