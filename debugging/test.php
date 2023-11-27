<html>

<head>
    <title>PHP Form Validation</title>
</head>

<body>
    <?php
    $users = file_get_contents("../data/users.json");
    echo $users;


    // define variables and set to empty values
    $name = $email = $gender = $comment = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $website = htmlspecialchars($_POST["website"]);
        $comment = htmlspecialchars($_POST["comment"]);
        $gender = htmlspecialchars($_POST["gender"]);
    }

    ?>

    <h2>Tutorials Point Absolute classes registration</h2>

    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                <td>E-mail:</td>
                <td><input type="text" name="email"></td>
            </tr>

            <tr>
                <td>Specific Time:</td>
                <td><input type="text" name="website"></td>
            </tr>

            <tr>
                <td>Class details:</td>
                <td><textarea name="comment" rows="5" cols="40"></textarea></td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="female">Female
                    <input type="radio" name="gender" value="male">Male
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" name="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

    <?php
    echo "<h2>Your Given details are as :</h2>";
    echo $name;
    echo "<br>";

    echo $email;
    echo "<br>";

    echo $website;
    echo "<br>";

    echo $comment;
    echo "<br>";

    echo $gender;
    ?>

</body>

</html>