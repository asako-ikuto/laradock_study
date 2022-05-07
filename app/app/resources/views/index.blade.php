@extends('layouts.tasklistapp')
@section('tasklist')
    @if (isset($tasks))
        @foreach ($tasks as $key => $task)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $task->content }}</td>
                <td>
                    <form method="post" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="status" value="{{ $task->status }}">
                        <input type="hidden" name="content" value="{{ $task->content }}">
                        <input type="submit"
                            value=@if ($task->status === 1) "作業中"
                                  @elseif($task->status === 2) "完了" @endif>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{ route('tasks.destroy', $task->id) }}">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除">
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
@endsection
