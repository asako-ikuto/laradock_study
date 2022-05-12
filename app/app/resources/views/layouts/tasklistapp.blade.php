<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

</head>

<body>
    <h1>ToDoリスト</h1>

    <input type="radio" name="filter-status" @if ($filterStatus == 'all') checked="checked" @endif>すべて
    <input type="radio" name="filter-status" @if ($filterStatus == 'working') checked="checked" @endif>作業中
    <input type="radio" name="filter-status" @if ($filterStatus == 'finished') checked="checked" @endif>完了

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>コメント</th>
                <th>状態</th>
            </tr>
        </thead>
        <tbody>
            @yield('tasklist')
        </tbody>
    </table>

    <h2>新規タスクの追加</h2>
    <form method="POST">
        @csrf
        <input type="text" name="content">
        <input type="hidden" name="status" value="1">
        <input type="submit" value="追加">
    </form>
    <script src="{{ asset('/js/main.js') }}"></script>

</body>

</html>
