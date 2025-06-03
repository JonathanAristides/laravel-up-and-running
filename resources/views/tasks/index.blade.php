<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskBoard – All Tasks</title>
    <style>
      body {
        font-family: sans-serif;
        max-width: 600px;
        margin: 2rem auto;
        line-height: 1.6;
      }

      .task {
        padding: 1rem;
        border-bottom: 1px solid #ccc;
      }

      .task a {
        font-weight: bold;
        text-decoration: none;
      }

      .task form {
        margin-top: 0.5rem;
      }

      .success {
        background-color: #e0ffe0;
        padding: 0.5rem;
        border: 1px solid #70db70;
        margin-bottom: 1rem;
      }
    </style>
</head>
<body>
    <a href="{{ URL::signedRoute('invite') }}">Click here to accept your invite</a>
    <br>
    <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>


    <h1>📋 Task List</h1>

    <p>
        <a href="{{ route('tasks.create') }}">➕ Create New Task</a>
    </p>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @forelse ($tasks as $task)
        <div class="task">
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">🗑 Delete</button>
            </form>
        </div>
    @empty
        <p>No tasks found. You can <a href="{{ route('tasks.create') }}">add one</a>.</p>
    @endforelse

</body>
</html>
