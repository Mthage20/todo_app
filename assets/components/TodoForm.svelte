<!-- assets/components/TodoForm.svelte -->
<script>
  export let onSubmit;
  let title = '';

  function handleSubmit(event) {
    event.preventDefault();
    onSubmit({ title });
    title = '';
  }
</script>

<form on:submit={handleSubmit}>
  <input type="text" bind:value={title} placeholder="Enter todo title" />
  <button type="submit">Add Todo</button>
</form>
