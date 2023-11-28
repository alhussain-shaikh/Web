<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee Management</title>
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link href="<?php echo BASE_URL ?>/public/assets/css/login.css" rel="stylesheet" />

</head>

<body class="text-center">
  <form class="form-signin" action="" method="POST">
    <img class="mb-4" src="<?php echo BASE_URL ?>/node_modules/bootstrap-icons/icons/box-arrow-in-right.svg" alt="" width="72" height="72" />
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="" />
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="" />
    <button class="btn btn-lg btn-primary btn-block mb-3" type="submit" name="login">
      Sign in
    </button>
    <?php
    if ((isset($this->messageType)) && ($this->messageType === 'error')) {
      echo "<div class='alert alert-danger'> <h3>$this->message</h3></div>";
    }
    if ((isset($this->messageType)) && ($this->messageType === 'success')) {
      echo "<div class='alert alert-success'> <h3>$this->message</h3></div>";
    }
    ?>
    <p class="mt-5 mb-3 text-muted">PHP Employee Management</p>
  </form>
</body>

</html>