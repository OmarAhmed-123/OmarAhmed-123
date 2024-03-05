<?php
session_start();

// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "university";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User authentication 
function authenticateUser($email, $password, $conn) {
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $row['role'];
        return true;
    } else {
        return false;
    }
}

// Course registration 
function registerCourse($courseCode, $conn) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $level = $row['level'];
        $allowedCourses = [];
        if ($level == 'first') {
            $allowedCourses = ['COMP101', 'COMP102', 'COMP104', 'COMP106', 'COMP108', 'COMP110', 'COMP112', 'COMP114'];
        } elseif ($level == 'second') {
            $allowedCourses = ['COMP201', 'COMP202', 'COMP204', 'COMP206', 'COMP208', 'COMP210', 'COMP212', 'COMP214'];
        } elseif ($level == 'third') {
            $allowedCourses = ['COMP301', 'COMP302', 'COMP304', 'COMP306', 'COMP308', 'COMP310', 'COMP312', 'COMP314'];
        } elseif ($level == 'fourth') {
            $allowedCourses = ['COMP401', 'COMP402', 'COMP404', 'COMP406', 'COMP408', 'COMP410', 'COMP412', 'COMP414'];
        }
        if (in_array($courseCode, $allowedCourses)) {
            // Insert registration 
            $sql = "INSERT INTO registrations (email, course_code) VALUES ('$email', '$courseCode')";
            if ($conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }
    return false;
}

// check for viewing registered students
function canViewStudents() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'doctor';
}

// Example usage:
if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (authenticateUser($email, $password, $conn)) {
        echo "Logged in successfully!";
    } else {
        echo "Invalid email or password!";
    }
}

if (isset($_POST['register_course'])) {
    $courseCode = $_POST['course_code'];
    if (registerCourse($courseCode, $conn)) {
        echo "Registered for course successfully!";
    } else {
        echo "Failed to register for course!";
    }
}

// Display courses for registration
if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
    echo "<h2>Available Courses:</h2>";
    echo "<form method='post'>";
    echo "<select name='course_code'>";
    echo "<option value='COMP101'>COMP101</option>";
    echo "<option value='COMP102'>COMP102</option>";
    echo "<option value='COMP104'>COMP104</option>";
    echo "<option value='COMP106'>COMP106</option>";
    echo "<option value='COMP108'>COMP108</option>";
    echo "<option value='COMP110'>COMP110</option>";
    echo "<option value='COMP112'>COMP112</option>";
    echo "<option value='COMP201'>COMP201</option>";
    echo "<option value='COMP202'>COMP202</option>";
    echo "<option value='COMP203'>COMP203</option>";
    echo "<option value='COMP204'>COMP204</option>";
    echo "<option value='COMP205'>COMP205</option>";
    echo "<option value='COMP206'>COMP206</option>";
    echo "<option value='COMP207'>COMP207</option>";
    echo "<option value='COMP208'>COMP208</option>";
    echo "<option value='COMP209'>COMP209</option>";
    echo "<option value='COMP210'>COMP210</option>";
    echo "<option value='COMP212'>COMP212</option>";
    echo "<option value='COMP214'>COMP214</option>";
    echo "<option value='COMP301'>COMP301</option>";
    echo "</select>";
    echo "<input type='submit' name='register_course' value='Register'>";
    echo "</form>";
}

// Display registered students for courses (only for doctors)
if (canViewStudents()) {
    // Fetch and display registered students
}

// Close database connection
$conn->close();
?>
