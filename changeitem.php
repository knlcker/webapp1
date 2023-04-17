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
        <h1> <a href="index.php">CHANGE</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a> 
        </nav>
    </header>
    <main>
    <?php
        $dns = 'mysql:dbname=webrestaurant;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $connectie = new PDO($dns, $user, $password);
        }catch (PDOException $e){
            echo "verbinding werkt niet" . $e;
        }

        $Item_title = $_POST['title'];
        $Item_price = $_POST['price'];
        $Item_description = $_POST['discription'];
        $Item_category = $_POST['category'];
        $Item_id = $_GET['Id_to_change']; 

        if(isset($_POST['submit-button'])){
            $statement = $connectie->prepare("UPDATE menu SET Item_title = ?, Item_description = ?, Item_price = ?, Item_category = ? WHERE Item_id = ?");
            $statement->execute([$Item_title, $Item_description, $Item_price, $Item_category, $Item_id]);
        }

        $statement = $connectie->query("SELECT * FROM menu WHERE Item_id = $Item_id");
        $menuitem = $statement->fetch();
            
        ?>
        <h1 class="return">Item aangepast!</h1>
        <a href="index.php" class="return"><-Naar menu</a>
        </main>
    </body>