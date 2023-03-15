@extends('layout')


@section('content')
<div class="container">

    <table class="col-md-8 table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Assigned To</th>
          <th scope="col">Assigned By</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tasks as $task)
        <tr>
          <th scope="row">{{ $task->id }}</th>
          <td>{{ $task->title }}</td>
          <td>{{ $task->description }}</td>
          <td>{{ $task->user->name }}</td>
          <td>{{ $task->admin->name }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $tasks->links()}}
</div>


@endsection
