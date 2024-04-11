<script>
  let title = "";
  let description = "";
  let titleMaxLength = 100;
  let descriptionMaxLength = 255;

  function updateTitle(event) {
    title = event.target.value.slice(0, titleMaxLength);
  }

  function updateDescription(event) {
    description = event.target.value.slice(0, descriptionMaxLength);
  }
</script>

<div class="todo-form">
  <form action="/create_task" method="post">
    <input 
      name="title" 
      type="text" 
      placeholder="Title" 
      bind:value={title} 
      on:input={updateTitle}
    />
    <div class="character-counter">
      {titleMaxLength - title.length} characters remaining
    </div>
    <textarea 
      name="description" 
      placeholder="Description" 
      bind:value={description} 
      on:input={updateDescription}
      rows="4"
      maxlength={descriptionMaxLength} 
    ></textarea>
    <div class="character-counter">
      {descriptionMaxLength - description.length} characters remaining
    </div>
    <button type="submit">Add To-do</button>
  </form>
</div>


<style>
.todo-form {
  margin-bottom: 20px;
}

.todo-form input[type="text"] {
  width: calc(100% - 20px);
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ced4da;
  border-radius: 5px;
  box-sizing: border-box;
  font-size: 14px;
}

.todo-form textarea {
  width: calc(100% - 20px);
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ced4da;
  border-radius: 5px;
  box-sizing: border-box;
  font-size: 14px;
  resize: none; /* Manual resizing of the description disabled */
}

.character-counter {
  font-size: 12px;
  color: #6c757d;
  margin-bottom: 5px;
}

.todo-form button[type="submit"] {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  font-size: 14px;
}

.todo-form button[type="submit"]:hover {
  background-color: #0056b3;
}

</style>
