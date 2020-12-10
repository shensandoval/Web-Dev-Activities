<!DOCTYPE html>

<head>
    <title>MySQL Exercise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
    /*MEDIA ICONS*/
    .media-icons {
      width: 100%;
    }

    .media-icons a {
      font-size: 13px;
      padding: 10px;
      text-decoration: none;
      color: #fff1eb;
      float: right;

    }

    .fa-google {
      background-color: #946861;
      border-radius: 20px;
      margin: 4px;
    }

    .fa-linkedin {
      background-color: #946861;
      border-radius: 20px;
      margin: 4px;
    }

    .fa-youtube {
      background-color: #946861;
      border-radius: 20px;
      margin: 4px;
    }

    .fa-instagram {
      background-color: #946861;
      border-radius: 20px;
      margin: 4px;
    }

    .fa-pinterest {
      background-color: #946861;
      border-radius: 20px;
      margin: 4px;
    }

    /*nav*/
    .nav {
      margin-left: 5%;
    }

    .nav strong {
      font-size: 40px;
      color: #000000;
      font-family: sans-serif;
      font-style: italic;
      margin-left: 5px;
      vertical-align: middle;
    }

    .nav img {
      max-width: 7%;
      vertical-align: middle;
    }

    .nav span {
      color: #FFA500;
      font-size: 20px;
      font-weight: bold;
      font-family: Times new roman;
    }

    /*home navigation*/

    .homenav {
      max-width: 100%;
      color: #4C0000;
      border-bottom: 3px solid black;
      border-top: 3px solid black;
      background-color: #ffa500;
      padding: 3px;
    }

    .homenav a {
      text-decoration: none;
      top: 10%;
      padding: 0 100px 10px 0;
      color: #4C0000;
      font-family: impact;
      font-size: 20px;
    }

    /*centered text on image*/
    .centered_text {
      position: absolute;
      top: 70%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 2%;
    }

    .centered_text h5 {
      margin-top: 0;
      margin-bottom: 2%;
      font-size: 70px;
      color: black;
      text-shadow: 6px 2px darkorange;
    }

    #main_image {
      width: 100%;
      height: 700px;
    }

    input {
      color: darkorange;
      font-size: 100%;
      margin-left: 26%;
      margin: 2%;
    }

    /*Form*/
    .form {
      width: 50%;
      margin-left: 25%;
      font-size: 100%;
    }

    #reg_btn {
      margin-top: 2%;
      padding: 2%;
      font-size: 90%;
      margin-left: 27%;
      background-color: black;
      color: white;
    }

    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
    <?php
    include 'db.php';

    if (isset($_REQUEST['fname'])) {
        $firstname = stripslashes($_REQUEST['fname']);
        $firstname = mysqli_real_escape_string($conn, $firstname);

        $lastname = stripslashes($_REQUEST['lname']);
        $lastname = mysqli_real_escape_string($conn, $lastname);

        $email = stripslashes($_REQUEST['em_add']);
        $email = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_REQUEST['pass']);
        $password = mysqli_real_escape_string($conn, $password);


        $query = "INSERT into `registration` (firstname, lastname, emailAdd, password) VALUES ('{$firstname}', '{$lastname}', '{$email}', '".md5($password)."')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class = 'form'>";
            echo"<script>window.location = 'viewTable.php'</script>";
            
        }
    } else {

    ?>

<div class="bodydiv">
    <div class="media-icons">
      <a href="http://www.google.com" class="fa fa-google"></a>
      <a href="http://www.linkedin.com" class="fa fa-linkedin"></a>
      <a href="http://www.youtube.com" class="fa fa-youtube"></a>
      <a href="http://www.instagram.com" class="fa fa-instagram"></a>
      <a href="http://www.pinterest.com" class="fa fa-pinterest"></a>

      <div class="nav">
        <img src="home_images\logo.jpg">
        <strong>HIKING SANCTUARY.<span>Hike more, worry less!</span></strong>
      </div>
    </div>


    <div class="homenav">
      <a href="home.html"><i class="fa fa-fw fa-home fa-fw"></i>HOME</a>
      <a href="traveltips.html"><i class="fa fa-child fa-fw"></i>MOUNTAIN TRAVEL TIPS</a>
      <a href="destinations.html"><i class="fa fa-plane fa-fw"></i>DESTINATIONS</a>
      <a href="features.html"><i class="fa fa-film fa-fw"></i>FEATURES</a>
      <a href="about1.html"><i class="fa fa-bars fa-fw"></i>ABOUT</a>
    </div>


    <img id="main_image" src="home_images\bckgrnd_img.jpg">

    <div class="centered_text">

        <h5>Registration Form</h5>
      

        <div class="form">
            <form action="" method="post">

                <i class="fa fa-user-circle"></i> First name:
                <input type="text" name="fname" required> <br>

                <i class="fa fa-user-circle"></i> Last name:
                <input type="text" name="lname" required><br>

                <i class="fa fa-envelope-o"></i> Email Address:
                <input type="email" name="em_add" required><br>

                <i class="fa fa-address-book"></i> Password:
                <input type="password" name="pass" required><br>


                <button type="submit" name="submit" id="reg_btn"> <i class="fa fa-pencil-square-o" style="color:red"></i>Register </button>


            </form>
        </div>
    </div>
        <?php } ?>
</body>

</html>