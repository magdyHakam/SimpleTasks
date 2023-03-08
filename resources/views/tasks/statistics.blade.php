@extends('layout')


@section('content')
<div class="container">

    <table class="col-md-8 table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Task count</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <th scope="row">{{ $loop->index+1 }}</th>
          <td>{{ $user->name }}</td>
          <td>{{ $user->tasks_count }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

</div>


@endsection
