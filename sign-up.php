<?php
if (isset($_GET['error'])) {
  $error = $_GET['error'];
} else {
  $error = "";
}
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="src/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<section class="gradient-form" style="background-color: #eee; height: 100vh;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center mb-5">
                  <img src="src/img/logo_dark.png"
                       style="width: 185px;" alt="logo">
                </div>
                <p class="text-danger"><?php echo $error;?></p>
                <form action="vendor/reg.php" method="post">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="fullname">Full Name</label>
                    <input type="text" id="fullname" class="form-control" name="full_name" placeholder="Your full name" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Your username" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Your email" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password1">Password</label>
                    <input type="password" id="password1" class="form-control" name="pass1" placeholder="Your password" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password2">Confirm Password</label>
                    <input type="password" id="password2" class="form-control" name="pass2" placeholder="Confirm your password" />
                  </div>

                  <div class="text-center pt-1 mb-3 pb-1">
                    <input type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" value="Register">
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Already have an account?</p>
                    <a href="log-in.php" class="text-dark medium" style="text-decoration: none;">Log in</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center bg-image" style="background-image:url(src/img/bg.png); background-repeat: no-repeat; background-size: cover">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>