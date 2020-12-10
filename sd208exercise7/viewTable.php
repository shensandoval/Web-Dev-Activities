<?php
include 'db.php';
?>
<!DOCTYPE html>

<head>
    <title>View Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .table,
        th,
        td {
            border: 1px solid black;
            background-color: #FFA500;
            padding: 5px;
            margin-top: 2%;
        }

        th {
            height: 50px;
        }

        #style {
            background-color: #FFD700;
        }

        a{
            text-decoration: none;
            color: red;
            font-size: 20px;
        }
    </style>
</head>

<body style="background-image: url('home_images/bckgrnd_img.jpg');">
    <div>
        <table width="100%" class="table">
            <thead>
                <tr>
                    <th><strong>ID</strong></th>
                    <th><strong>Firstname</strong></th>
                    <th><strong>Lastname</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Update</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>

            <tbody>
                <?php
                $count = 1;
                $select_query = "SELECT * from `registration` ORDER BY id asc";

                $result = mysqli_query($conn, $select_query);

                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td align="center"> <?php echo $count ?> </td>
                        <td align="center"> <?php echo $row["firstname"] ?> </td>
                        <td align="center"> <?php echo $row['lastname'] ?> </td>
                        <td align="center"> <?php echo $row['emailAdd'] ?> </td>
                        <td id="style" align="center"><a href="update.php?id=<?php echo $row["id"]; ?>">Update</a></td>
                        <td id="style" align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                    </tr>

                    <button type="submit"> <a href="registration.php"> Back to registration </a></button>

                <?php $count++;
                } ?>
            </tbody>
        </table>

    </div>

</body>

</html>