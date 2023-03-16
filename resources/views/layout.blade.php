<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Checkout example for Bootstrap</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>

  <body class="bg-light">


  <!--Main Navigation-->
  <header class="mb-5" style="background-color: gray;">

    <nav class="navbar navbar-expand-lg navbar-dark black">
      <div class="container">
        <a class="navbar-brand" href="#"><strong>Dashboard</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/create">Create Task</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/statistics">Statistics</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="view intro-2">
      <div class="full-bg-img">
        <div class="mask rgba-black-strong flex-center">
          <div class="container">
            <div class="white-text text-center wow fadeInUp">

            </div>
          </div>
        </div>
      </div>
    </div>

  </header>
  <!--Main Navigation-->


        @yield('content')



</body></html>
