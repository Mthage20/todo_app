<script>
  let title = '';
  let description = '';
</script>

<style>
  form {
    margin-bottom: 20px;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  button[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>

<form action="/create_task" method="post">
  <input name="title" type="text" placeholder="Title" bind:value={title} />
  <input name="description" type="text" placeholder="Description" bind:value={description} />
  <button type="submit">Add To-do</button>
</form>
