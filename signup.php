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
    $ad_err="Name cannot be left blank.";
  }
  else if(strlen($_POST["ad"])<2)
  {
    $ad_err="Your name must be more than 2 characters.";
  }
  else
  {
    $ad=$_POST["ad"];
  }

  //soyad doğrulama
  if(empty($_POST["soyad"]))
  {
    $soyad_err="Surname cannot be left blank.";
  }
  else
  {
    $soyad=$_POST["soyad"];
  }


  //kullanıcı adı doğrulama
  if(empty($_POST["kullaniciadi"]))
  {
    $username_err="Username cannot be left blank.";
  }
  else if(strlen($_POST["kullaniciadi"])<6)
  {
    $username_err="Username must be at least 6 characters.";
  }
  else if (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST["kullaniciadi"])) 
  {
   $username_err="Username must consist of uppercase and lowercase letters and numbers.";
  } 
  else
  {
    $username=$_POST["kullaniciadi"];
  }

  //tel doğrulama
  if(empty($_POST["tel"]))
  {
    $tel_err="Phone number cannot be left blank.";
  }
  else if(strlen($_POST["tel"])<10)
  {
    $tel_err="The phone number must be at least 10 characters.";
  }
  else
  {
    $tel=$_POST["tel"];
  }


  //email doğrulama
  if(empty($_POST["email"]))
  {
    $email_err="Email cannot be left blank.";
  }
  else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
  {
    $email_err = "Invalid email format.";
  }
  else
  {
    $email=$_POST["email"];
  }


  //parola doğrulama
  if(empty($_POST["parola"]))
  {
    $parola_err="Password cannot be left blank.";
  }
  else
  {
    $parola=password_hash($_POST["parola"],PASSWORD_DEFAULT);
  }

  //parola tekrar kısmı
  if(empty($_POST["parolatkr"]))
  {
    $parolatkr_err="Password repeat section cannot be left blank.";
  }
  else if($_POST["parola"]!=$_POST["parolatkr"])
  {
    $parolatkr_err="Passwords do not match.";
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
        Registration Successful
        </div>';
        }
        else{
            echo '<div class="alert alert-danger" role="alert">
            Registration Failed
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
    <title>HISTORICAL AND CULTURAL GUIDE</title>
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
                    <a class="nav-link" href="signup.php">Sign Up</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Anasayfa.html">Türkçe</a>
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
                    <h3 class="text-center">Member Registration</h3>
                </div>
                <div class="card-body">
                    <form action="signup.php" method="POST">

                    <div class="form-group">
                            <label for="ad">Name</label>
                            <input type="text" name="ad" class="form-control
                            
                            <?php
                            if(!empty($ad_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="ad" placeholder="Enter your name" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $ad_err;
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="soyadı">Surname</label>
                            <input type="text" name="soyad" class="form-control 
                            
                            <?php
                            if(!empty($soyad_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="soyad" placeholder="Enter your surname" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $soyad_err;
                            ?>
                            </div>
                          </div>


                        <div class="form-group">
                            <label for="firstname">Username</label>
                            <input type="text" name="kullaniciadi" class="form-control 
                            
                            <?php
                            if(!empty($username_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="firstname" placeholder="Enter your username" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $username_err;
                            ?>
                            </div>
                          </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" name="email" class="form-control 
                            
                            <?php
                            if(!empty($email_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="email" placeholder="Enter your email address" required>
                            <div class="invalid-feedback">
                              <?php
                            echo $email_err;
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="tel">Phone Numbers</label>
                            <input type="bigint" name="tel" class="form-control 
                            
                            <?php
                            if(!empty($tel_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="tel" placeholder="Enter your phone numbers" required>
                            <div class="invalid-feedback">
                              <?php
                            echo $tel_err;
                            ?>
                            </div>
                          </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="parola" class="form-control 
                            
                            <?php
                            if(!empty($parola_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="password" placeholder="Enter your password" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $parola_err;
                            ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="parolatkr" class="form-control 
                            
                            <?php
                            if(!empty($parolatkr_err))
                            {
                              echo "is-invalid";
                            }
                            ?>
                            
                            mb-3" id="password" placeholder="Enter your passward" required>
                            <div class="invalid-feedback">
                            <?php
                            echo $parolatkr_err
                            ?>
                            </div>
                          </div>

                        <button type="submit" name="kaydet" class="btn btn-primary btn-block mt-4">Sign Up</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Already have an account? <a href="uyegirisi.html" class="text-light">Log in</a></small>
                </div>
            </div>
        </div>
    </div>
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
