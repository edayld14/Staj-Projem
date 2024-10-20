<?php
session_start();
include 'baglanti.php'; // Veritabanı bağlantısını ekleyin

if(isset($_SESSION["kullanici_adi"])) {
    // Kullanıcı bilgilerini veritabanından çek
    $kullanici_adi = $_SESSION["kullanici_adi"];
    $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi='$kullanici_adi'";
    $result = mysqli_query($baglanti, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Kullanıcı bilgilerini getir
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
    }
} else {
    echo "You are not authorized to view this page.";
    echo "<br><br><br><a href='login.php'>Log In</a>";
    exit();
}
?>



<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>HISTORICAL AND CULTURAL GUIDE</title>
        <style>
    body {
        background-image: url('uye.png');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .cardd {
        margin: 45px; /* Kenar boşlukları */
    }
    footer {
        color: rgb(255, 255, 255);
        padding: 1em;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        width: 100%;
        position: relative;
        bottom: 0;
    }
    .container {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        border-radius: 8px;
        width: 50%;
        margin: auto;
        flex: 1; /* Bu sayede footer her zaman sayfanın altında kalır */
    }
    h3 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 10px;
        vertical-align: middle;
    }
    input[type="text"], input[type="email"], input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="checkbox"] {
        width: auto;
    }
    input[type="submit"] {
        background-color: #d9534f;
        color: white;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #c9302c;
    }
    label {
        font-weight: bold;
    }
    @media (max-width: 768px) {
        .container {
            width: 90%;
        }
    }
</style>
</head>
<body>
<header>
          <nav class="navbar fixed-top bg-dark navbar-dark">
      <div class="container-fluid">
       <img src="logotr.png" align="center" class="img-circle" alt="" width="55px" height="55px">
               <a class="navbar-brand mt-2" style="font-size: 30px; font-weight: bold;" href="Anasayfa.html">HISTORICAL AND CULTURAL GUIDE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="mekanlar.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">Places</a>

                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item text-light" href="mosque.html">Mosques and Churches</a></li>
                          <li><a class="dropdown-item text-light" href="palace.html">Palaces and Pavilions</a></li>
                          <li><a class="dropdown-item text-light" href="bazaar.html">Bazaars and Inns</a></li>
                          <li><a class="dropdown-item text-light" href="castle.html">Castles and Walls</a></li>
                          <li><a class="dropdown-item text-light" href="other.html">Others</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="legend.html">Legends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="profil_guncelle.php">Profile</a>
                      </li>
                      <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
                      <li class="nav-item">
                        <a class="nav-link" href="profil_guncelle.html">Türkçe</a>
                      </li>
                      </ul>
                  <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>
                </div>
              </div>
            </div>
          </nav>
        </header>

<br><br><br><br><br>
<div class="container">
    <h3>Editing Information</h3>
    <form action="profile.php" method="post">
        <table>
            <tr>
                <td><label for="ad">Name:</label></td>
                <td><input type="ad" id="ad" name="ad" value="<?php echo $row['ad']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="soyad">Surname:</label></td>
                <td><input type="soyad" id="soyad" name="soyad" value="<?php echo $row['soyad']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="tel">Phone Numbers:</label></td>
                <td><input type="tel" id="tel" name="tel" value="<?php echo $row['tel']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="email">E-Mail:</label></td>
                <td><input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="UPDATE">
                </td>
            </tr>
        </table>
    </form>
</div>
<footer>
        © 2024 HISTORICAL AND CULTURAL GUIDE | Design: Eda Yıldız - Design by 
        <br><a rel="nofollow" href="https://www.instagram.com/istanbuldanereyegidilir/" ><img src="instagram.png" style="width: 3%;" title="Instagram"></a>
        <a rel="nofollow" href="https://www.youtube.com/@zehraakman1761" ><img src="indir.png" style="width: 3%;" title="YouTube"></a>
        <a rel="nofollow" href="mailto:edayld14@gmail.com" ><img src="indir (1).png" style="width: 3%;" title="Mail"></a>
      </footer>
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>