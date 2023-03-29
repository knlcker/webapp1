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
            <div><button onclick="myFunction()" class="filter"><i class="fa-solid fa-arrow-down-short-wide icon"></i></button>
                <div id="myDropdown" class="dropdown-content">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <a href="#bread">Bread</a>
                    <a href="#drinks">Drinks</a>
                    <a href="#deserts">Deserts</a>
                    <a href="#pizza">Pizza</a>
                    <a href="#pasta">Pasta</a>
                </div>
            </div>
            <h1> <a href="index.php">Restaurant</a></h1>
            <a href="/admin-pannel.php"><i class="fa-regular fa-user icon"></i></a>
        </nav>
    </header>
    <main>
        <div class="menu-items-container">
            <?php
            $dns = 'mysql:dbname=webrestaurant;host=127.0.0.1';
            $user = 'root';
            $password = '';

            try {
                $connectie = new PDO($dns, $user, $password);
            }catch (PDOException $e){
                echo "verbinding werkt niet" . $e;
            }

            $resultSet = $connectie->query("SELECT * FROM Menu");

            while ($item = $resultSet->fetch()) {
                echo '<div class="menu-container">
                        <div class="Menu-item">
                        <div class="item-container">
                        <h2 class="Item-title">' . $item['Title'] .'</h2>
                        <p class="Item-disc">' . $item['Discription'] .'</p>
                        </div>
                        <div class="price-container">
                        <div class="dash-line">
                        <div class="Price">€' . $item['Price'] .'</div>
                        </div>
                        </div>
                        </div>
                        </div>
                        ';
            }
            ?>
        </div>
    </main>
    <footer>

    </footer>
    <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>
</body>
</html>
