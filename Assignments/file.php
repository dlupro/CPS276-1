<?php
$rootDir = "./directories/";
$contents = scandir($rootDir);
$alreadyExists = FALSE;
$operSuccess = FALSE;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>

    <style>
        h1 {
            font-family: Arial, Helvetica, sans-serif;
            margin: 10px;
            font-size: 45px;
        }

        label {
            display: block;
            margin: 10px;
            font-family: Arial, Helvetica, sans-serif;
            margin-left: 10px;
            font-weight: 500;
            font-size: larger;
        }

        .errLabel {
            display: block;
            margin: 10px;
            font-family: Arial, Helvetica, sans-serif;
            margin-left: 10px;
            font-weight: 500;
            font-size: larger;
            color: red;
        }

        .successLabel {
            display: block;
            margin: 10px;
            font-family: Arial, Helvetica, sans-serif;
            margin-left: 10px;
            font-weight: 500;
            font-size: larger;
            color: blue;
        }

        input {
            display: block;
            border-color: rgb(179, 178, 178);
            border-radius: 5px;
            padding: 10px;
            width: 90%;
            height: 20px;
            margin-left: 10px;
        }

        textarea {
            display: block;
            border-radius: 5px;
            padding: 10px;
            width: 90%;
            margin-left: 10px;
            border-color: rgb(179, 178, 178);
        }

        button {
            background-color: #007ce2;
            color: white;
            margin: 20px 20px 20px 10px;
            height: 45px;
            width: 90px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: large;
            font-weight: bolder;
        }
    </style>
</head>

<body>

    <h1>File and Directory Assignment</h1>
    <label>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only.</label>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dir_name = $_POST['dir_name'];
        $data = $_POST['data'];

        if (empty($dir_name)) {
            echo "<label class=\"errLabel\">Folder Name is empty</label><br><br>";
        } else if (empty($data)) {
            echo "<label class=\"errLabel\">Data is empty</label><br><br>";
        } else {

            foreach ($contents as $entry) {
                if (is_dir($rootDir . $entry) and $entry === $dir_name) {
                    $alreadyExists = TRUE;
                    break;
                }
            }

            if ($alreadyExists) {
                echo "<label>A directory already exists with that name.</label>";
            } else {
                $newDir = $rootDir . $dir_name . "/";
                $operSuccess = mkdir($newDir, 0777, true);

                if ($operSuccess) {
                    file_put_contents($newDir . "readme.txt", $data);
                    echo "<label>File and Directory where created</label>";
                    echo "<label class=\"successLabel\"><a href=\"/directories/" . $dir_name;
                    echo "/readme.txt\" >Path were file located</a> </label>";
                } else {
                    echo "<label>File Operation Faild.</label>";
                }
            }
        }
    } else {
        echo "<br><br>";
    }

    ?>

    <form action="index.php" method="POST">
        <label for="">Folder Name</label>
        <input type="text" name="dir_name" id="">
        <br>
        <label for="">File Content</label>
        <textarea name="data" id="" cols="30" rows="10"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>

</html>