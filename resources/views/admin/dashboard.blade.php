<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 700px;
            margin: 3rem auto;
            padding: 1rem;
            line-height: 1.6;
            background-color: #f7f9fc;
            color: #333;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }
        .nav a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .nav a:hover {
            text-decoration: underline;
        }
        .content {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        h1 {
            color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="nav">
        <a href="{{ route('tasks.index') }}">← Back to Tasks</a>
        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
    </div>

    <div class="content">
        <h1>🔐 Welcome to the Admin Dashboard</h1>
        <p>This area is reserved for admin-related content and management tools.</p>
    </div>

</body>
</html>
