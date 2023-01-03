@extends('layout')

@section('content')
    <h1>Tasks</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create</a>
@endsection