<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<header>
        <nav>
        <a href="/index.php"><i class="fa-solid fa-arrow-down-short-wide icon"></i></a>
        <h1> <a href="index.php">Restaurant</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a> 
        </nav>
    </header>
    <?php
    if(isset($_POST['submit-button'])){
        $dns = 'mysql:dbname=webrestaurant;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $dbh = new PDO($dns, $user, $password);

        $title = $_POST['title'];
        $price = $_POST['price'];
        $discription = $_POST['discription'];
        $category = $_POST['category'];

        $statement = $dbh->prepare("INSERT INTO menu(title, discription, price, category) VALUES (?, ?, ?, ?)");
        $statement->execute([$title, $discription, $price, $category]);
    } 

    ?>
    <div class="add-menu">
        <form method="post" action="form.php" class="add-form" >
           <div class="add-main"> 
    	        <div class="label">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="textfield">
                </div>
                <div class="label">
                    <label for="price">Prijs:</label>
                    <input type="number" name="price" class="textfield">
                </div>
                <div class="label">
                    <label for="discription">Omschrijving:</label>
                    <input type="text" name="discription" class="textfield">
                </div>
                <div class="label">
                    <label for="category">Category:</label>
                    <input type="text" name="category" class="textfield">
                </div>
                <div class="button">
                    <button type="submit" name="submit-button">toevoegen</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>