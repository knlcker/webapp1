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
        <h1> <a href="index.php">DELETED</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a>
        </nav>
    </header>
    <main>
        <div class="menu-items-container menu-items-container2">
            <?php
            $dns = 'mysql:dbname=webrestaurant;host=127.0.0.1';
            $user = 'root';
            $password = '';

            try {
                $connectie = new PDO($dns, $user, $password);
            }catch (PDOException $e){
                echo "verbinding werkt niet" . $e;
            }
            

            if(isset($_POST['delete_id'])){
                $id_to_delete = $_POST['delete_id'];
                $statement = $connectie->prepare("DELETE FROM menu WHERE Item_id = ?");
                $statement->execute([$id_to_delete]);
                
            }
            ?>
            <h1 class="return">Item verwijderd</h1>
            <a href="remove-change.php" class="return"><-terug</a>
            </main>