<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
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
        <h2>Registracija</h2>
        <form action="registracija_skripta.php" method="post">
            <label for="korisnicko_ime">Korisničko ime:</label>
            <input type="text" id="korisnicko_ime" name="korisnicko_ime" required><br>
            
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required><br>

            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required><br>
            
            <label for="lozinka">Lozinka:</label>
            <input type="password" id="lozinka" name="lozinka" required><br>
            
            <label for="lozinka2">Ponovite lozinku:</label>
            <input type="password" id="lozinka2" name="lozinka2" required><br>
            
            <input type="submit" value="Registriraj se">
        </form>
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <p style="color:green;">Uspješna registracija. <a href="login.php">Prijavite se ovdje</a>.</p>
        <?php endif; ?>
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p style="color:red;">Lozinke nisu identične. Pokušajte ponovno.</p>
        <?php endif; ?>
    </main>
    <footer>
    <p>Franko Štefanović | fstefanov@tvz.hr</p>
    </footer>
</body>
</html>
