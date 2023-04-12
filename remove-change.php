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
        <h1> <a href="index.php">ADMIN PANEL</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a>
        </nav>
    </header>
    <main>
        <form action="form.php" method="post" class="add-item-container">
            <button type="submit" name="add-item" class="add-item">add-item +</button>
        </form>
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
            if(isset($_GET['search'])){
                $search_input = $_GET['search'];
                $resultSet = $connectie->prepare("SELECT * FROM Menu WHERE(Item_title, Item_description, Item_category)");
                $resultSet->execute(["%" . $search_input . "%"]);
            } else{
                $resultSet = $connectie->prepare("SELECT * FROM Menu");
                $resultSet->execute([]);
            }

            while ($item = $resultSet->fetch()) {
                echo '
                        <div class="menu-container">
                        <div class="Menu-item">
                        <div class="item-container">
                        <h2 class="Item-title">' . $item['Item_title'] .'</h2>
                        <p class="Item-desc">' . $item['Item_description'] .'</p>
                        </div>
                        <div class="price-container">
                        <div class="dash-line">
                        <form action="delete.php" method="POST">
                            <input type="hidden" name="delete_id" value="' . $item['Item_id'] . '"></input>
                            <button type="submit" class="delete-button"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <form action="change.php" method="POST">
                            <input type="hidden" name="change_item" value="' . $item['Item_id'] . '"></input>
                            <button type="submit" class="change-item"><i class="fa-solid fa-pen-to-square"></i></button>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
            }
            ?>
            </div>
    </main>
</body>