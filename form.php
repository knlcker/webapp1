<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        $statement->execute($title, $discription, $price, $category);
    } 

    ?>
    <form method="post" action="form.php">
        Title: <input type="text" name="title">
        Prijs: <input type="number" name="price">
        omschrijving: <input type="text" name="omschrijving">
        <button type="submit" name="submit-button">toevoegen</button>
    </form>
</body>
</html>