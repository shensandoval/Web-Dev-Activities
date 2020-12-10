<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .error {
            color: red;
        }
        .form{
            width: 25%;
            padding: 3%;
            border: 2px solid black;
        }
        input{
            margin: 2%;
        }
        #button{
            margin-top: 5%;
            margin-left: 26%;
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    $heightErr = "";
    $weightErr = "";

    if(isset($_GET['submit'])) {

        $height = $_GET['hg'];
        $weight = $_GET['wg'];

        if (empty($_GET["hg"])) {
            $heightErr = "Height is required!";
        }
        if (empty($_GET["wg"])) {
            $weightErr = "Weight is required!";
        }else{
            $URL = 'index.php?submit&wg='. $weight . '&hg=' . $height; //index.php?submit&wg=1&hg=2
            header('Location: ' . $URL);
        }
    }

    ?>


    <form class="form" method="GET">

        <h3>Calculate Your Body Mass Index</h3>
       
        Height (cm):
        <input type="number" name="hg"> <br>
        <span class="error"><?php echo $heightErr; ?></span> <br>

        Weight (kg):
        <input type="number" name="wg"> <br>
        <span class="error"><?php echo $weightErr; ?></span> <br>

        <button id="button" type="submit" name="submit"> <i class="fa fa-calculator" style="font-size:20px"></i> Compute BMI</button>
    </form>



</body>

</html> 