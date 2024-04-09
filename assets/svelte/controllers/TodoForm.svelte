<script>

  let title = '';
  let description = '';
</script>

<form action="/create_task" method="post">
  <input name="title" type="text" placeholder="title" bind:value={title} />
  <input name="description" type="text" placeholder="description" bind:value={description} />
  <button type="submit">Add To-do</button>
</form>
