<script>
  export let todos;
</script>

<!-- Update the styles for the todo items -->
<style>
  .todo-item {
    margin-bottom: 20px; /* Increase bottom margin for spacing */
    padding: 20px; /* Add padding */
    border-radius: 10px; /* Add border radius */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add subtle shadow effect */
    background-color: #fff; /* Use white background */
    transition: transform 0.3s ease; /* Add transition effect */
  }

  .todo-list {
  list-style: none;
  padding: 0;
}


  /* Update styles for completed tasks */
  .todo-item.completed {
    background-color: #e1f7d5; /* Light green background for completed tasks */
  }

  /* Add hover effect */
  .todo-item:hover {
    transform: translateY(-5px); /* Move the item up on hover */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
  }

  /* Task title styles */
  .todo-title {
    font-size: 18px; /* Increase font size */
    font-weight: bold; /* Use bold font weight */
    color: #333; /* Use dark text color */
    margin-bottom: 5px; /* Add bottom margin */
  }

  /* Task description styles */
  .todo-description {
    font-size: 16px; /* Set font size */
    color: #666; /* Use slightly lighter text color */
    margin-bottom: 10px; /* Add bottom margin */
  }

  /* Task timestamp styles */
  .todo-timestamp {
    font-size: 14px; /* Set font size */
    color: #999; /* Use light text color */
  }

  /* Button styles */
  .todo-buttons {
    margin-top: 10px; /* Add top margin */
  }

  .todo-buttons a {
    margin-right: 10px; /* Reduce right margin */
    padding: 8px 12px; /* Adjust padding */
    border-radius: 5px; /* Add border radius */
    background-color: #007bff; /* Use vibrant button color */
    color: #fff; /* Use white text color */
    text-decoration: none; /* Remove underline */
    transition: background-color 0.3s ease; /* Add transition effect */
  }

  .todo-buttons a:hover {
    background-color: #0056b3; /* Darker color on hover */
  }
</style>

<!-- Display the todo items -->
<ul class="todo-list">
  {#each todos as todo}
    <li class="todo-item {todo.status ? 'completed' : ''}">
      <div class="todo-title">{todo.title}</div> <!-- Display task title -->
      <div class="todo-description">{todo.description}</div> <!-- Display task description -->
      <div class="todo-timestamp">{todo.createdAt}</div> <!-- Display task timestamp -->
      <div class="todo-buttons">
        <a href={`/delete/${todo.id}`} onclick="return confirm('Are you sure you want to delete this task?')">Delete</a> <!-- Delete button -->
        <a href={`/changeStatus/${todo.id}`}>{todo.status ? "Mark as Undone" : "Mark as Done"}</a> <!-- Mark as done/undone button -->
      </div>
    </li>
  {/each}
</ul>

