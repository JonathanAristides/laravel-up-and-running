<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task – {{ $task->title }}</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 600px;
            margin: 2rem auto;
            line-height: 1.6;
        }
        .navigation a {
            margin-right: 1rem;
            text-decoration: none;
            color: #007bff;
        }
        .navigation a:hover {
            text-decoration: underline;
        }
        .task-details {
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>

    <h1>{{ $task->title }}</h1>

    <div class="task-details">
        <p>{{ $task->description }}</p>
    </div>

    <div class="navigation">
        <a href="{{ route('tasks.edit', $task) }}">✏️ Edit</a>
        <a href="{{ route('tasks.index') }}">← Back to Tasks</a>
    </div>

</body>
</html>
