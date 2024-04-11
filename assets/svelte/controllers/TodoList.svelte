<script>
  export let todos;
</script>

<ul class="todo-list">
  {#each todos as todo (todo.id)}
    <li class="todo-item {todo.status ? 'completed' : ''}">
      <div class="todo-title">{todo.title}</div>
      <div class="todo-description">{todo.description}</div>
      <div class="todo-timestamp">{todo.createdAt}</div>
      <div class="todo-buttons">
        <a
          href={`/delete/${todo.id}`}
          onclick="return confirm('Are you sure you want to delete this task?')"
          class="delete-button">Delete</a
        >
        <a href={`/changeStatus/${todo.id}`}
          >{todo.status ? "Mark as Undone" : "Mark as Done"}</a
        >
      </div>
    </li>
  {/each}
</ul>

<style>
  .todo-item {
    margin-bottom: 20px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    transition: transform 0.3s ease;
  }

  .todo-list {
    list-style: none;
    padding: 0;
  }

  .todo-item.completed {
    background-color: #e1f7d5;
  }

  .todo-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
  }

  .todo-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
  }

  .todo-description {
    font-size: 16px;
    color: #666;
    margin-bottom: 10px;
  }

  .todo-timestamp {
    font-size: 14px;
    color: #999;
  }

  .todo-buttons {
    margin-top: 10px;
  }

  .todo-buttons a {
    margin-right: 10px;
    padding: 8px 12px;
    border-radius: 5px;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .todo-buttons a.delete-button {
    background-color: #dc3545; 
  }

  .todo-buttons a.delete-button:hover {
    background-color: #ac2925; 
  }

  .todo-buttons a:not(.delete-button):hover {
    background-color: #0056b3; 
  }
</style>
