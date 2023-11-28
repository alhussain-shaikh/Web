<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Management</title>

  <script src="<?php echo BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link href="<?php echo BASE_URL ?>/public/assets/css/main.css" rel="stylesheet" />
  <script src="<?php echo BASE_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>
  <header class="bg-light mb-4">
    <?php
    require_once VIEWS . '/header.php';
    ?>
  </header>
  <main class="container-xl mx-auto pb-90">
    <form action=" <?= isset($this->employee['id']) ?  BASE_URL . 'employee/update/' . $this->employee['id'] : '' ?>" method="POST" class="container-md">
      <?php
      if (isset($_GET['okUpdate'])) {
        if ($_GET['okUpdate'] == true) {
          echo "<div class='alert alert-success text-center'> <h5>Employee Successfully Saved!</h5></div>";
        }
      }
      ?>
      <h3>Employee: </h3>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="inputName">Name</label>
            <input name="name" type="text" class="form-control" id="inputName" value="<?= isset($this->employee['first_name']) ? $this->employee['first_name'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputMail">Email address</label>
            <input name="email" type="email" class="form-control" id="inputMail" aria-describedby="emailHelp" value="<?= isset($this->employee['email']) ? $this->employee['email'] : '' ?>">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="inputCity">City</label>
            <input name="city" type="text" class="form-control" id="inputCity" value="<?= isset($this->employee['city']) ? $this->employee['city'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputState">State</label>
            <input name="state" type="text" class="form-control" id="inputState" value="<?= isset($this->employee['state']) ? $this->employee['state'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputPostalCode">Postal Code</label>
            <input name="postalCode" type="number" class="form-control" id="inputPostalCode" value="<?= isset($this->employee['postal_code']) ? $this->employee['postal_code'] : '' ?>">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="inputLastName">Last Name</label>
            <input name="lastName" type="text" class="form-control" id="inputLastName" value="<?= isset($this->employee['last_name']) ? $this->employee['last_name'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputGender">Example select</label>
            <select class="form-control" id="inputGender" name="gender[]">

              <option value="default">Choose...</option>

              <option value="man" <?= isset($this->employee['gender']) && $this->employee['gender'] === 'man' ? "selected='selected'" : null ?>> man</option>

              <option value="woman" <?= isset($this->employee['gender']) && $this->employee['gender'] === 'woman' ? "selected='selected'" : null ?>>woman</option>

              <option value="other" <?= isset($this->employee['gender']) && $this->employee['gender'] === 'other' ? "selected='selected'" : null ?>>other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputStreetAddress">Street Address</label>
            <input name="streetAddress" type="text" class="form-control" id="inputStreetAddress" value="<?= isset($this->employee['street_number']) ? $this->employee['street_number'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputAge">Age</label>
            <input name="age" type="number" class="form-control" id="inputAge" value="<?= isset($this->employee['age']) ? $this->employee['age'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input name="phoneNumber" type="number" class="form-control" id="inputPhoneNumber" value="<?= isset($this->employee['phone_number']) ? $this->employee['phone_number'] : '' ?>">
          </div>
        </div>
      </div>
      <a type="btn" class="btn btn-secondary" href="<?php echo BASE_URL ?>employee">Back</a>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php include_once "views/message.php"; ?>
  </main>
  <footer class="fixed-bottom">
    <?php
    require_once VIEWS . '/header.php';
    ?>
  </footer>
</body>

</html>