<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User</title>
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
      <script src="{{ asset('js/user.js') }}" defer></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


      <script type="text/javascript">
        var route  = "<?php echo asset(''); ?>"
      </script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" >
          User
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </div>
  </nav>
  <br>
  <div class="container">
    <div class="row">
      <form autocomplete="off">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">username</label>
          <input type="text" class="form-control" name="username" id="username"  placeholder="Enter username">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">email</label>
          <input type="email" class="form-control" name="email" id="email"  placeholder="Enter email">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" onclick="saveUser(event)">Save User</button>
      </form>
    </div>
  </div>

  <hr>

  <div class="container">
    <div class="row">
      <h3>Users</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">username</th>
            <th scope="col">email</th>
            <th scope="col">delete</th>
          </tr>
        </thead>
        <tbody id="dataTable">
        </tbody>
      </table>
    </div>
  </div>

  <hr>
  <div class="container">
    <div class="row">
      <h3>Quantifies</h3>
      <div id="quantifiesContainer"></div>
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="row">
      <h3>Coincidences</h3>
      <input type="email" class="form-control" name="email_search" id="email_search" aria-describedby="name" placeholder="Enter email">
      <button type="submit" class="btn btn-primary" onclick="searchEmail(event)">Search</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
          </tr>
        </thead>
        <tbody id="dataTableCoincidences">
        </tbody>
      </table>
    </div>
  </div>





  </body>
</html>
