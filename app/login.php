<?php include 'partials/header.php' ?>

<!-- ngoding dibawah sini -->
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h2 style="text-align:center;">Login</h2>
<div class="container h-100">
<div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6 my-auto">
<form action="login_process.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
  </div>
  <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
</div>
</div>
</body>
</html>
<!-- ngoding diatas sini -->

<?php include 'partials/footer.php' ?>