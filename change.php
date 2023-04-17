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
    <?php
        $dns = 'mysql:dbname=webrestaurant;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $connectie = new PDO($dns, $user, $password);
        }catch (PDOException $e){
            echo "verbinding werkt niet" . $e;
        }

// bij laden data ophalen
$currentId = $_POST['change_item'];


echo $currentId;

// dan in formulier zetten


        // if sumbit
        $resultSet = $connectie->prepare("SELECT * FROM Menu WHERE Item_id = ?");
        $resultSet->execute([$currentId]);
        $current_item = $resultSet->fetch();

       

    echo '
    <div class="add-menu">
        <form method="post" action="changeitem.php?Id_to_change=' . $current_item['Item_id'] . '" class="add-form" >
           <div class="add-main"> 
    	        <div class="label">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="textfield" value="' . $current_item['Item_title'] . '">
                </div>
                <div class="label">
                    <label for="price">Prijs:</label>
                    <input type="number" step="0.01" name="price" class="textfield" value="' . $current_item['Item_price'] . '">
                </div>
                <div class="label">
                    <label for="description">Omschrijving:</label>
                    <input type="text" name="discription" class="textfield" value="'  . $current_item['Item_description'] . '">
                </div>
                <div class="label">
                    <label for="category">Category:</label>
                    <input type="text" name="category" class="textfield" value="' . $current_item['Item_category'] . '">
                </div>
                <div class="button">
                    <button type="submit" name="submit-button">Wijzigingen Toepassen</button>
                </div>
            </div>
        </form>
    </div>'

    ?>
</body>
</html>