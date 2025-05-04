<?php
require_once 'include/DefaultHeader.php';
require_once 'include/NavBar.php';
require_once 'include/sqlConfig.php';



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Signup
if (isset($_POST['submit_signup'])) {
    $uname = trim($_POST['Username']);
    $email = trim($_POST['Email']);
    $psw = password_hash($_POST['Password'], PASSWORD_DEFAULT);

    $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $checkUser->bind_param("s", $uname);
    $checkUser->execute();
    $checkUser->store_result();
    
    if ($checkUser->num_rows > 0) {
        echo "<script>alert('Username already taken. Try another.');</script>";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);
        $statement->bind_param("sss", $uname, $email, $psw);
        if ($statement->execute()) {
            echo "<script>alert('Signup successful!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Signup failed. Please try again.');</script>";
        }
    }
}

// Login
if (isset($_POST['submit_login'])) {
    $uname = trim($_POST['Username']);
    $psw = $_POST['Password'];

    $sql = "SELECT password FROM users WHERE username = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("s", $uname);
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($hashed_password);
    $statement->fetch();

    if ($statement->num_rows > 0 && password_verify($psw, $hashed_password)) {
        $_SESSION['Username'] = $uname;
        $_SESSION['Active'] = true;
        echo "<script>alert('Login successful!'); window.location='index.php';</script>" ;
    } else {
        echo "<script>alert('Incorrect Username or Password');</script>";
    }
}

$conn->close();
?>

<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="all">
    <div class="form-container">

        <div class="container">
            <h2>Login</h2>
            <div class="imgcontainer">
                <img src="img/profile.jpg" alt="Avatar" class="avatar">
            </div>
            <form method="post">
                <input type="text" placeholder="Enter Username" name="Username" required>
                <input type="password" placeholder="Enter Password" name="Password" required>
                <button type="submit" name="submit_login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </form>
        </div>

        <p>OR</p>

        <div class="container2">
            <h2>Sign-Up</h2>
            <form method="post" id="loginForm">
                <label for="Username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="Username" required>

                <label for="Email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="Email" required>

                <label for="Password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="Password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                <button type="submit" name="submit_signup">Sign-Up</button>
            </form>
        </div>

    </div>
</div>

</body>
</html>
