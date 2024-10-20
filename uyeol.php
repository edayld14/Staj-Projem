<?php

include("baglanti.php");
$ad_err="";
$soyad_err="";
$username_err="";
$email_err="";
$tel_err="";
$parola_err="";
$parolatkr_err="";

if(isset($_POST["kaydet"]))
{
  //ad doğrulama
  if(empty($_POST["ad"]))
  {
    $ad_err="Ad boş bırakılamaz";
  }
  else if(strlen($_POST["ad"])<2)
  {
    $ad_err="Adınız 2 karakterden fazla olmalıdır";
  }
  else
  {
    $ad=$_POST["ad"];
  }

  //soyad doğrulama
  if(empty($_POST["soyad"]))
  {
    $soyad_err="Soyad boş bırakılamaz";
  }
  else
  {
    $soyad=$_POST["soyad"];
  }


  //kullanıcı adı doğrulama
  if(empty($_POST["kullaniciadi"]))
  {
    $username_err="Kullanıcı adı boş bırakılamaz";
  }
  else if(strlen($_POST["kullaniciadi"])<6)
  {
    $username_err="Kullanıcı adı en az 6 karakter olmalıdır";
  }
  else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullaniciadi"])) 
  {
   $username_err="Kullanıcı adı büyük küçük harf ve rakamdan oluşmalıdır.";
  } 
  else
  {
    $username=$_POST["kullaniciadi"];
  }

  //tel doğrulama
  if(empty($_POST["tel"]))
  {
    $tel_err="Telefon numarası boş bırakılamaz";
  }
  else if(strlen($_POST["tel"])<10)
  {
    $tel_err="Telefon numarası en az 10 karakter olmalıdır";
  }
  else
  {
    $tel=$_POST["tel"];
  }


  //email doğrulama
  if(empty($_POST["email"]))
  {
    $email_err="Email boş bırakılamaz";
  }
  else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
  {
    $email_err = "Geçersiz email formatı";
  }
  else
  {
    $email=$_POST["email"];
  }


  //parola doğrulama
  if(empty($_POST["parola"]))
  {
    $parola_err="Parola boş bırakılamaz";
  }
  else
  {
    $parola=password_hash($_POST["parola"],PASSWORD_DEFAULT);
  }

  //parola tekrar kısmı
  if(empty($_POST["parolatkr"]))
  {
    $parolatkr_err="Parola tekrar kısmı boş bırakılamaz";
  }
  else if($_POST["parola"]!=$_POST["parolatkr"])
  {
    $parolatkr_err="Parolalar eşleşmiyor";
  }
  else
  {
    $parolatkr=$_POST["parolatkr"];
  }

    if(isset($ad) && isset($soyad) && isset($username) && isset($email) && isset($tel) && isset($parola))
    {

    
    
    $ekle="INSERT INTO kullanicilar (ad, soyad, kullanici_adi, email, tel, parola) VALUES ('$ad', '$soyad', '$username', '$email', '$tel', '$parola')";
    $calistirekle = mysqli_query($baglanti, $ekle);
    if($calistirekle){
        echo '<div class="alert alert-success" role="alert">
        Kayıt Başarılı
        </div>';
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
            Kayıt Başarısız
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
                        <a class="nav-link" href="signup.php">English</a>
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
                    <h3 class="text-center">Üye Kayıt</h3>
                </div>
                <div class="card-body">
                    <form action="uyeol.php" method="POST">

                    <div class="form-group">
                            <label for="ad">Ad</label>
                            <input type="text" name="ad" class="form-control
                            
                            <?php
                            if(!empty($ad_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="ad" placeholder="Adınızı girin" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $ad_err;
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="soyadı">Soyad</label>
                            <input type="text" name="soyad" class="form-control 
                            
                            <?php
                            if(!empty($soyad_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="soyad" placeholder="Soyadınızı girin" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $soyad_err;
                            ?>
                            </div>
                          </div>


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
                          </div>
                        <div class="form-group">
                            <label for="email">Email adresi</label>
                            <input type="text" name="email" class="form-control 
                            
                            <?php
                            if(!empty($email_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="email" placeholder="Email adresinizi girin" required>
                            <div class="invalid-feedback">
                              <?php
                            echo $email_err;
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="tel">Telefon Numarası</label>
                            <input type="bigint" name="tel" class="form-control 
                            
                            <?php
                            if(!empty($tel_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="tel" placeholder="Telefon numaranızı girin" required>
                            <div class="invalid-feedback">
                              <?php
                            echo $tel_err;
                            ?>
                            </div>
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
                            
                            mb-3" id="password" placeholder="Parolanizi girin" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $parola_err;
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="password">Parola</label>
                            <input type="password" name="parolatkr" class="form-control 
                            
                            <?php
                            if(!empty($parolatkr_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="password" placeholder="Parolanizi girin" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $parolatkr_err
                            ?>
                            </div>
                          </div>

                        <button type="submit" name="kaydet" class="btn btn-primary btn-block mt-4">Kayıt Ol</button>
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
    © 2024 İstanbul Gezi Rehberi | Tasarım : Eda Yıldız - Design by 
    <br><a rel="nofollow" href="https://www.instagram.com/istanbuldanereyegidilir/" ><img src="instagram.png" style="width: 3%;" title="Instagram">
        <a rel="nofollow" href="https://www.youtube.com/@zehraakman1761" ><img src="indir.png" style="width: 3%;" title="YouTube">
        <a rel="nofollow" href="mailto:edayld14@gmail.com" ><img src="indir (1).png" style="width: 3%;" title="Mail">
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
