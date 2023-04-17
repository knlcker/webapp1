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
        <h1> <a href="index.php">ADD ITEM</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a> 
        </nav>
    </header>
    <?php
    if(isset($_POST['submit-button'])){
        $dns = 'mysql:dbname=webrestaurant;host=127.0.0.1';
        $user = 'root';
        $password = '';

        $dbh = new PDO($dns, $user, $password);

        $Item_title = $_POST['new-title'];
        $Item_price = $_POST['price'];
        $Item_description = $_POST['new-discription'];
        $Item_category = $_POST['new-category'];

        $statement = $dbh->prepare("INSERT INTO menu(Item_title, Item_description, Item_price, Item_category) VALUES (?, ?, ?, ?)");
        $statement->execute([$Item_title, $Item_description, $Item_price, $Item_category]);

    } 

    ?>
    <div class="add-menu">
        <form method="post" action="form.php" class="add-form" >
           <div class="add-main"> 
    	        <div class="label">
                    <label for="title">Title:</label>
                    <input type="text" name="new-title" class="textfield">
                </div>
                <div class="label">
                    <label for="price">Prijs:</label>
                    <input type="number" step="0.01" name="price" class="textfield">
                </div>
                <div class="label">
                    <label for="description">Omschrijving:</label>
                    <input type="text" name="new-discription" class="textfield">
                </div>
                <div class="label">
                    <label for="category">Category:</label>
                    <input type="text" name="new-category" class="textfield">
                </div>
                <div class="button">
                    <button type="submit" name="submit-button">toevoegen</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>