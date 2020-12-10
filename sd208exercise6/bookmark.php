<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Exercise</title>
</head>
<style>
    body {
        background-image: url(https://img.wallpapersafari.com/tablet/2560/1700/97/0/BZtDjw.jpg);
        background-size: cover;
        background-repeat: no-repeat;
    }

    #form {
        width: 16%;
        border: 2px solid red;
        border-radius: 10px;
        padding: 5%;
        float: left;
        margin-right: 10%;
        background-color: wheat;
        margin-left: 8%;

    }

    #bookmark,
    #url {
        margin: 3%;
    }

    p {
        font-family: serif;
        font-size: 25px;
        color: white;
    }

    .div2 {
        margin-top: 7%;
    }

    #link{
        margin-left: 5%;
        background-color: lightgray;
        padding: 1px;
        border-radius: 3px;
    }
</style>

<body>
    <!-- <img id="background" src="bookmark.png"> -->
    <div id="form">
        <form method="post">
            Bookmark Name: <br>
            <input type="text" name="bookmark" id="bookmark">
            <br>
            <br>

            URL: <br>
            <input type="text" name="url" id="url">
            <br>
            <br>

            <input type="submit" name="addBookmark" value="Add bookmark">

            <button type="submit" name="clear">Clear All</button>
        </form>

    </div>

    <?php
    session_start();

    $bookmark  = (isset($_SESSION['bookmarked'])) ? $_SESSION['bookmarked'] : array();

    if (isset($_POST['addBookmark'])) {
        if (!empty($_POST["bookmark"]) && !empty($_POST["url"])) { //(input)bookmark and url
            array_push($bookmark, [$_POST['bookmark'], $_POST['url']]);
            $_SESSION['bookmarked'] = $bookmark;
        }

        // print_r($_SESSION['bookmarked']);

    }

    if (isset($_POST['x'])) {
        array_splice($_SESSION['bookmarked'], $_POST['idx'], 1);
    }

    if (isset($_POST['clear'])) {
        $_SESSION['bookmarked'] = [];
    }
    ?>

    <div class="div2">
        <?php if (isset($_SESSION['bookmarked'])) : ?>
            <p>Bookmarked pages:</p>
            <?php for ($idx = 0; $idx < count($_SESSION['bookmarked']); $idx++) : ?>

                <form method="POST">
                    <!-- <?php echo $idx; ?> -->
                    <br> <a id="link" href='<?php echo $_SESSION['bookmarked'][$idx][1]; ?>' target="_blank"> <?php echo $_SESSION['bookmarked'][$idx][0]; ?> </a> 
                    <input type="hidden" name="idx" value="<?php echo $idx; ?>">
                    <input name="x" type="submit" value="x">
                </form>

            <?php endfor ?>
        <?php endif ?>
    </div>

</body>

</html>