<!-- assets/components/TodoItem.svelte -->
<script>
  export let todo;
</script>

<div>
  <span>{todo.title}</span>
  <button>Edit</button>
  <button>Delete</button>
</div>
