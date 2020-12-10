<?php

$errors = array();

if (isset($_POST['submit'])) {

  if (empty($_POST["fname"])) {
    $errors["fname"] = "First name is required!";
  }

  if (empty($_POST["lname"])) {
    $errors["lname"] = "Last name is required!";
  }

  if (empty($_POST["add"])) {
    $errors["add"] = "Address is required!";
  }

  if (empty($_POST["em_add"])) {
    $errors["email"] = "Email address is required!";
  }
}

function inSide($errors)
{
  foreach ($errors as $key => $value) {
    echo $value;
    if ($value != "") {
      return "true";
    }
  }
  return "false";
}


// define variables and set to empty values
$fname = $lname = $email = $add = $addErr = "";
$fnameErr = $lnameErr = $addErr = $emailErr = "";

if (isset($_POST['submit'])) {

  if ($_POST["fname"]) {
    $fname = getData($_POST["fname"]);
    if (strlen($fname) <= 2 || strlen($fname) >= 25) {
      $errors["fname"] = '<br> First name should not be greater than 25 and less than 2';
    }
  }

  if ($_POST["lname"]) {
    $lname = getData($_POST["lname"]);
    if (strlen($lname) <= 2 || strlen($lname) >= 25) {
      $errors["lname"] = '<br> Last name should not be greater than 25 and less than 2';
    }
  }

  if ($_POST["em_add"]) {
    $email = getData($_POST["em_add"]);
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (strlen($email) <= 2 || strlen($email) >= 25) {
      $errors["email"] = "Invalid email format";
    }
  }

  if ($_POST["add"]) {
    $add = getData($_POST["add"]);
  }
}

function getData($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .style {
      font-size: 20px;
      padding: 5%;
      color: brown;
    }
  </style>

</head>

<body>
  <?php if (inSide($errors) == "true") : ?>


    <form action="form.php" id="submitErr" method="post">

      <?php foreach ($errors as $key => $value) : ?>
        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">

      <?php endforeach ?>

    </form>
    <script>
      document.getElementById("submitErr").submit();
    </script>

  <?php else : ?>
    <p style="font-size:25px; color: red;"><?php echo ">>>User's Personal information"; ?> </p>
    <?php
    echo "<br> <span class='style'> Firstname: " . $fname . "</span>";
    echo "<br>";
    echo "<br>";
    echo "<span class='style'> Lastname: " . $lname . "</span>";
    echo "<br>";
    echo "<br>";
    echo "<span class='style'> Email: " . $email . "</span>";
    echo "<br>";
    echo "<br>";
    echo "<span class='style'> Address: " . $add . "</span>";
    echo "<br>";
    ?>
  <?php endif ?>
</body>

</html>