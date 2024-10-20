<?php
session_start();
include 'baglanti.php'; // Veritabanı bağlantısını ekleyin

if(isset($_SESSION["kullanici_adi"])) {
    $kullanici_adi = $_SESSION["kullanici_adi"];
    
    // Formdan gelen veriler
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $tel = $_POST["tel"];
    $email = $_POST['email'];
    // Veritabanında güncelleme
    $sql = "UPDATE kullanicilar SET
            ad = '$ad', 
            soyad = '$soyad', 
            tel = '$tel', 
            email='$email'
            WHERE kullanici_adi='$kullanici_adi'";

    if (mysqli_query($baglanti, $sql)) {
        echo "<script>
                if (confirm('Kayıt başarılı şekilde güncellendi. Anasayfaya yönlendirilmek ister misiniz?')) {
                    window.location.href = 'index.php';
                } else {
                    window.location.href = 'profil_update.php';
                }
              </script>";
    } else {
        echo "Update error: " . mysqli_error($baglanti);
    }

    mysqli_close($baglanti);
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
            }
            .cardd {
              margin: 45px; /* Margins */
            }
            footer{
              color: rgb(255, 255, 255);
              padding: 1em;
              text-align: center;
              font-family: 'Times New Roman', Times, serif;
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
                        <a class="nav-link" href="profil.html">Türkçe</a>
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
