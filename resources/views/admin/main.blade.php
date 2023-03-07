<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body>
  <div class="container-fluid">
    <div class="row d-md-flex">
      <div class="col-md-3 bg-light">
        @include('admin.sidebar')
      </div>
      <div class="col-md-9">
        <div class="main-content p-3">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
</body>
</html>
