@extends('layouts.tasklistapp')
@section('tasklist')
    @if (isset($tasks))
        @foreach ($tasks as $key => $task)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $task->content }}</td>
                <td><button type="button">
                        @if ($task->status === 1)
                            作業中
                        @elseif($task->status === 2)
                            完了
                        @endif
                    </button></td>
                <td><button type="button">削除</button></td>
            </tr>
        @endforeach
    @endif
@endsection
