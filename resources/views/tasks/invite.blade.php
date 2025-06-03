<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You're Invited!</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f4f8fb;
            color: #333;
            text-align: center;
            padding: 3rem;
        }

        .card {
            background: white;
            padding: 2rem;
            margin: auto;
            max-width: 500px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
        }

        .btn {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>🎉 Welcome!</h1>
        <p>You’ve arrived via a <strong>secure invite link</strong>.</p>
        <p>This is a protected route using Laravel’s signed URLs.</p>

        <a href="{{ route('tasks.index') }}" class="btn">Go to TaskBoard</a>
    </div>

</body>
</html>
