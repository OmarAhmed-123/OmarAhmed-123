<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <?php
    // Perform filtration and sanitization for input validation
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Redirect to profile.php to display a welcome message and the user's information
    echo "Hi, " . $first_name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "First Name: " . $first_name . "<br>";
    echo "Last Name: " . $last_name . "<br>";
    echo "Age: " . $age . "<br>";
    ?>
</body>
</html>
