<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task – {{ $task->title }}</title>
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
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            margin-top: 1rem;
            display: inline-block;
        }
    </style>
</head>
<body>

    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $task->title) }}" required placeholder="Task Title">
        <textarea name="description"
                  placeholder="Task Description">{{ old('description', $task->description) }}</textarea>

        <button type="submit">💾 Update Task</button>
    </form>

    <a class="back-link" href="{{ route('tasks.index') }}">← Back to Task List</a>

</body>
</html>
