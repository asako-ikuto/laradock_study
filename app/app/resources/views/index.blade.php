@extends('layouts.tasklistapp')
@section('tasklist')
    @if (isset($tasks))
        @foreach ($tasks as $key => $task)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $task->content }}</td>
                <td><button type="button">{{ $task->status }}</button></td>
                <td><button type="button">削除</button></td>
            </tr>
        @endforeach
    @endif
@endsection
