<?php

if (isset($_POST["sub"])) {
    $clickBait = strtolower($_POST["clickBaitHeadline"]);

    $a = array(
        "scientists",
        "doctors",
        "hate",
        "stupid",
        "weird",
        "simple",
        "trick",
        "shocked me",
        "you'll never believe",
        "hack",
        "epic",
        "unbelievable"
    );

    $b = array(
        "so-called scientists",
        "so-called doctors",
        "aren't threatened by",
        "average",
        "completeky normal",
        "ineffective",
        "method",
        "is no different than the others",
        "you won't really be surprised by",
        "slightly improve",
        "boring",
        "normal"
    );

    $honestHeadline = str_replace($a, $b, $clickBait);
}



?>

<html>

<head>
    <title>Clickbait exercise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        textarea {
            border-radius: 5px;
            width: 100%;
        }

        /*centered_text on image*/
        .centered_text {
            position: absolute;
            top: 20%;
            left: 49%;
            width: 40%;
            padding: 2%;
            background-color: lightgray;
            border-radius: 10px;
        }

        .orig{
            position: absolute;
            top: 60%;
            left: 49%;
            width: 40%;
            padding: 2%;
            background-color: lightgray;
            border-radius: 10px;
        }

        .honest{
            position: absolute;
            top: 75%;
            left: 49%;
            width: 40%;
            padding: 2%;
            background-color: lightgray;
            border-radius: 10px;
        }

        #bg {
            width: 100%;
            height: 700px;
        }

        /*Form*/
        .form {
            width: 90%;
            font-size: 100%;
        }

        .form p {
            text-align: center;
        }

        .form .sub_btn {
            padding: 1%;
            margin-left: 45%;
        }

        textarea {
            padding: 8px;
            margin: 2%;
        }
    </style>
</head>

<body>

    <img id="bg" src="bgg.png">

    <div class="centered_text">

        <div class="form">

            <p>CLICKBAIT HEADLINES</p>

            <form action="" method="post">

                <textarea placeholder="Input a clickbait headline" name="clickBaitHeadline"></textarea>
                <br>

                <button type="submit" name="sub" class="sub_btn"> <i class="fa fa-send" style="color:red"></i> Change </button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["sub"])) {
        echo "<strong class='orig'>Original Headline<h5>" . ucwords($clickBait) . "</h5></strong><hr>";

        echo "<strong class='honest'>Honest Headline<h5>" . ucwords($honestHeadline) . "</h5></strong>";
    }
    ?>


</body>

</html>