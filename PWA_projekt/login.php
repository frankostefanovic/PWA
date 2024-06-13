<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
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
        <h2>Prijava</h2>
        <form action="login_skripta.php" method="post">
            <label for="korisnicko_ime">Korisničko ime:</label>
            <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br>
            
            <label for="lozinka">Lozinka:</label>
            <input type="password" id="lozinka" name="lozinka" required><br>
            
            <input type="submit" value="Prijavi se">
        </form>
    </main>
    <footer>
    <p>Franko Štefanović | fstefanov@tvz.hr</p>
    </footer>
</body>
</html>
