<?php

include("baglanti.php");
$username_err="";
$parola_err="";


if(isset($_POST["giris"]))
{
  if(empty($_POST["kullaniciadi"]))
  {
    $username_err="Kullanıcı adı boş bırakılamaz";
  }
  else
  {
    $username=$_POST["kullaniciadi"];
  }

  //parola doğrulama
  if(empty($_POST["parola"]))
  {
    $parola_err="Parola boş bırakılamaz";
  }
  else
  {
    $parola=$_POST["parola"];
  }


    if(isset($username) && isset($parola))
    {
        $secim= "SELECT * FROM kullanicilar WHERE kullanici_adi ='$username'";
        $calistir=mysqli_query($baglanti,$secim);
        $kayitsayisi=mysqli_num_rows($calistir);
        if($kayitsayisi>0)
        {
            $ilgilikayit = mysqli_fetch_assoc($calistir);
            $hashlisifre=$ilgilikayit["parola"];
            if(password_verify($parola,$hashlisifre))
            {
                session_start();
                $_SESSION["kullanici_adi"]=$ilgilikayit["kullanici_adi"];
                $_SESSION["email"]=$ilgilikayit["email"];
                header("location:profil_guncelle.php");
            }
                else
                {
                    echo '<div class="alert alert-danger" role="alert">
                    parola yanlış
            </div>';
                    }
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
        Kullanıcı adı yanlış
            </div>';
        }
    

    mysqli_close($baglanti);

}
}

?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TARİHİ VE KÜLTÜREL REHBER</title>
    <style>
        body {
            background-image: url('uye.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .card {
            background-color: #343a40; /* Koyu gri arka plan */
            border: none;
            color: #f8f9fa; /* Beyaz metin */
        }
        .form-control {
            background-color: #495057; /* Orta gri arka plan */
            color: #f8f9fa; /* Beyaz metin */
            border: none;
        }
        .btn-primary {
            background-color: #6c757d; /* Açık gri */
            border: none;
        }
        .btn-primary:hover {
            background-color: #5a6268; /* Daha koyu gri */
        }
        .text-light {
            color: #f8f9fa !important;
        }
        .text-decoration-none {
            text-decoration: none !important;
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
              <a class="navbar-brand mt-2" style="font-size: 30px; font-weight: bold;" href="Anasayfa.html">TARİHİ VE KÜLTÜREL REHBER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menü</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="Anasayfa.html">Anasayfa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="galeri.html">Galeri</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mekanlar</a>

                      <ul class="dropdown-menu bg-dark">
                        <li><a class="dropdown-item text-light" href="cami.html">Camiler</a></li>
                        <li><a class="dropdown-item text-light" href="saray.html">Saraylar ve Kasırlar</a></li>
                        <li><a class="dropdown-item text-light" href="carsi.html">Çarşı ve Hanlar</a></li>
                        <li><a class="dropdown-item text-light" href="kale.html">Kale ve Surlar</a></li>
                        <li><a class="dropdown-item text-light" href="diğer.html">Diğerleri</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="efsane.html">Efsaneler</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="hakkimda.html">Hakkında</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="bize-ulas.html">Bize Ulaşın</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="uyeol.php">Üye Olun</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="uyegirisi.php">Üye Girişi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">English</a>
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
  <br><br><br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Üye Giriş</h3>
                </div>
                <div class="card-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="firstname">Kullanıcı Adı</label>
                            <input type="text" name="kullaniciadi" class="form-control 
                            
                            <?php
                            if(!empty($username_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="firstname" placeholder="Kullanıcı adınızı girin" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $username_err;
                            ?>
                            </div>
                        <div class="form-group">
                            <label for="password">Parola</label>
                            <input type="password" name="parola" class="form-control 
                            
                            <?php
                            if(!empty($parola_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="password" placeholder="Parolanızı girin" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $parola_err;
                            ?>
                            </div>
                          </div>
                    <button type="submit" name="giris" class="btn btn-primary btn-block mt-4">Giriş Yap</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Zaten hesabınız var mı? <a href="uyegirisi.html" class="text-light">Giriş Yapın</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
            © 2024 TARİHİ VE KÜLTÜREL REHBER | Tasarım : Eda Yıldız - Design by 
            <br><a rel="nofollow" href="https://www.instagram.com/istanbuldanereyegidilir/" ><img src="instagram.png" style="width: 3%;" title="Instagram"></a>
            <a rel="nofollow" href="https://www.youtube.com/@zehraakman1761" ><img src="indir.png" style="width: 3%;" title="YouTube"></a>
            <a rel="nofollow" href="mailto:edayld14@gmail.com" ><img src="indir (1).png" style="width: 3%;" title="Mail"></a>
          </footer>
        
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </body>
</html>