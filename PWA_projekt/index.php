<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti";

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjeri konekciju
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, naslov, sazetak, kategorija, slika FROM articles WHERE arhiva = 0 ORDER BY datum DESC";
$result = $conn->query($sql);
?>
<?php


$articles_Paris = array();
$articles_Nogomet = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row['kategorija'] == 'Paris') {
            $articles_Paris[] = $row;
        } elseif ($row['kategorija'] == 'Nogomet') {
            $articles_Nogomet[] = $row;
        }
    }
} else {
    echo "Nema vijesti.";
}


?>





<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="slike/logo.png" alt="Le Parisien Logo" class="logo">
            <nav>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="kategorija.php?kategorija=Paris">Paris</a></li>
                    <li><a href="kategorija.php?kategorija=Nogomet">Nogomet</a></li>
                    <li><a href="administrator.php">ADMINISTRACIJA</a></li>
                    <li><a href="unos.html">UNOS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="content">
            <section class="parisien">
                <h2>Paris</h2>
                <?php
                if ($result->num_rows > 0) {
                    foreach ($articles_Paris as $article) {
                        echo "<article>";
                        echo "<img src='" . $article['slika'] . "' alt='Article Image'>";
                        echo "<h5 class='article-h5'>" . $article['kategorija'] . "</h5>";
                        echo "<h3><a href='clanak.php?id=" . $article['id'] . "'>" . $article['naslov'] . "</a></h3>";
                        echo "</article>";
                    }
                    }
                 else {
                    echo "Nema vijesti u kategoriji Paris.";
                }
                ?>
            </section>
            <section class="vivre-mieux">
                <h2>Nogomet</h2>
                <div class="articles">
                <?php
                if ($result->num_rows > 0) {
                    foreach ($articles_Nogomet as $article) {
                        echo "<article>";
                        echo "<img src='" . $article['slika'] . "' alt='Article Image'>";
                        echo "<h5 class='article-h5'>" . $article['kategorija'] . "</h5>";
                        echo "<h3><a href='clanak.php?id=" . $article['id'] . "'>" . $article['naslov'] . "</a></h3>";
                        echo "</article>";
                    }
                    }
                 else {
                    echo "Nema vijesti u kategoriji zdravlje.";
                }
                ?>
                </div>
            </section>
        </div>
    </main>
    <footer>
    <p>Franko Štefanović | fstefanov@tvz.hr</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>

