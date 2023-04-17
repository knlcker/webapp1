<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <header>
        <nav>
        <a href="/index.php"><i class="fa-solid fa-arrow-down-short-wide icon"></i></a>
        <h1> <a href="index.php">ADMIN LOGIN</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a>
        </nav>
    </header>
    <main>
        <?php
session_start(); // Start a session to store login status

// Check if form has been submitted
if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if username and password are correct
  if($username == "admin" && $password == "password123") {
    // Set session variables and redirect to admin panel
    $_SESSION['logged_in'] = true;
    header("Location: remove-change.php");
    exit();
  } else {
    // Display error message
    echo '                  
                        <div class="wrong-container">
                        <div class="wrong">Invalid username or password.</div>
                        </div>
                        ';
  }
}
?>
<div class="menu-items-container">

<form method="post" action=""  class="login-page">
    <div class="panel"> Admin login
        <div class="username">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="username..">
        </div>
        <div class="password">
            <label for="password">password:</label>
            <input type="password" id="password" name="password" placeholder="password..">
        </div>
        <button type="submit" name="submit" class="login-button">login</button>
    </div>
</form>
</div>

    </main>
    <footer>

    </footer>
</body>
</html>