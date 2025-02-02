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

$id = $_GET['id'];
$sql = "SELECT naslov, sazetak, tekst, slika, datum FROM articles WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Nema takvog članka.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['naslov']; ?></title>
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
    <main class="mainclanak">
        <article class="full-article">
            <h1><?php echo $row['naslov']; ?></h1>
            <img src="<?php echo $row['slika']; ?>" alt="Article Image">
            <p><strong>Sažetak:</strong> <?php echo $row['sazetak']; ?></p>
            <p><?php echo nl2br($row['tekst']); ?></p>
            <p><em>Datum objave: <?php echo $row['datum']; ?></em></p>
        </article>
    </main>
    <footer>
    <p>Franko Štefanović | fstefanov@tvz.hr</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
