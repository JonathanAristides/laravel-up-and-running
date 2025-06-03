<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <style>
      body {
        font-family: sans-serif;
        max-width: 600px;
        margin: 2rem auto;
        line-height: 1.6;
      }
      form {
        display: flex;
        flex-direction: column;
      }
      input, textarea {
        margin-bottom: 1rem;
        padding: 0.5rem;
        font-size: 1rem;
      }
      button {
        padding: 0.5rem;
        font-size: 1rem;
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
      }
      button:hover {
        background-color: #218838;
      }
      .back-link {
        margin-top: 1rem;
        display: inline-block;
      }
    </style>
</head>
<body>

    <h1>Create Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <input type="text" name="title" placeholder="Task Title" value="{{ old('title') }}" required>
        <textarea name="description" placeholder="Task Description">{{ old('description') }}</textarea>

        <button type="submit">➕ Create Task</button>
    </form>

    <a class="back-link" href="{{ route('tasks.index') }}">← Back to Task List</a>

</body>
</html>
