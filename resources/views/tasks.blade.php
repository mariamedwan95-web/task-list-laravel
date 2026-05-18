<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        .container {
            width: 700px;
            margin: auto;
        }

        .card {
            border: 1px solid #ddd;
            margin-bottom: 25px;
        }

        .card-header {
            background-color: #f5f5f5;
            padding: 12px;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
        }

        .btn-add {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 8px 12px;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 7px 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Task List</h2>

    <div class="card">
        <div class="card-header">New Task</div>
        <div class="card-body">
            <form method="POST" action="/tasks">
                @csrf
                <label>Task</label>
                <input type="text" name="name" required>
                <button class="btn-add" type="submit">+ Add Task</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Current Tasks</div>
        <div class="card-body">
            <table>
                <tr>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>

                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->name }}</td>
                        <td>
                            <form method="POST" action="/tasks/{{ $task->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-delete" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

</body>
</html>