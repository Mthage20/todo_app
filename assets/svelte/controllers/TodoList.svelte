<!-- assets/components/TodoList.svelte -->
<script>
  export let todos
</script>


<ul>
  {#each todos as todo}
    <li>
    {todo.id} {todo.title} {todo.description} {todo.createdAt} {todo.status}
    
    <a href={`/delete/${todo.id}`} onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
    <a href={`/changeStatus/${todo.id}`}>{todo.status ? "Mark as Undone" : "Mark as Done"}</a>
    </li> 
  {/each}
</ul>