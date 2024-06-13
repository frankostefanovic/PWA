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

$kategorija = $_GET['kategorija'];
$sql = "SELECT id, naslov, sazetak, slika FROM articles WHERE kategorija='$kategorija' ORDER BY datum DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $kategorija; ?></title>
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
        <section>
            <h2><?php echo $kategorija; ?> ></h2>
            <div class="articles">
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<article>";
                        echo "<img src='" . $row['slika'] . "' alt='Article Image'>";
                        echo "<h3><a href='clanak.php?id=" . $row['id'] . "'>" . $row['naslov'] . "</a></h3>";
                        echo "<p>" . $row['sazetak'] . "</p>";
                        echo "</article>";
                    }
                } else {
                    echo "Nema vijesti u ovoj kategoriji.";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
    <p>Franko Štefanović | fstefanov@tvz.hr</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
