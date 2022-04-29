<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
    </style>
</head>

<body>
    <h1>ToDoリスト</h1>

    <input type="radio" name="status" value="all" checked="checked">すべて
    <input type="radio" name="status" value="working">作業中
    <input type="radio" name="status" value="finished">完了

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>コメント</th>
                <th>状態</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $key => $task)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $task->content }}</td>
                    <td><button type="button">{{ $task->status }}</button></td>
                    <td><button type="button">削除</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>新規タスクの追加</h2>
    <form method="POST">
        @csrf
        <input type="text" name="content">
        <input type="hidden" name="status" value="作業中">
        <input type="submit" value="追加">
    </form>
</body>

</html>
