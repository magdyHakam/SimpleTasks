@extends('layout')


@section('content')

    <style media="screen">
        .errors{
            text-align: left;
        }
    </style>


    <div class="container">
      <div class="py-5 ">
        <!-- <img class="d-block mx-auto mb-4" src="./Checkout example for Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72"> -->
        <h2>New task form</h2>
        <!-- <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p> -->
            @if($errors->any())
            <div class="col-md-6 mt-5 alert alert-danger errors" role="alert">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
            @endif
      </div>

      <div class="row">

        <div class="col-md-12 order-md-1">
          <!-- <h4 class="mb-3">Add New Task</h4> -->
          <form class="needs-validation" novalidate="" method="post" action="/store">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="row">
                  <div class="col-md-8 mb-3">
                    <label for="firstName">Title</label>
                    <input type="text" name="title" class="form-control" id="Title" placeholder="Task Title" value="" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>
                  <div class="col-md-8 mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="country">Assigned by (non-admin user)</label>
                    <select name="assigned_by_id" class="custom-select d-block w-100" id="country" required>
                        <option value="">Choose Admin...</option>
                        @foreach ($admins as $admin)
                          <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid country.
                    </div>
                  </div>
                  <!-- <div class="col-md-2 mb-3">
                  </div> -->
                  <div class="col-md-4 mb-3">
                    <label for="country">Assigned to (admin)</label>
                    <select  name="assigned_to_id" class="custom-select d-block w-100" id="state" required>
                      <option value="0">Choose user...</option>
                      @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
                  </div>
                </div>

                <input class="col-md-8 btn btn-primary btn-lg btn-block mt-4" type="submit" />
          </form>
        </div>
      </div>

    </div>


@endsection
