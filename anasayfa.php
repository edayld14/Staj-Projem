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
        echo "Kullanıcı bulunamadı.";
    }
} 
else {
    echo "Bu sayfayı görüntüleme yetkiniz yoktur.";
    echo "<br><br><br><a href='uyegiris.php'>GİRİŞ YAP</a>";
    exit();
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
            .cardd {
              margin: 45px; /* Kenar boşlukları */
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="mekanlar.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mekanlar</a>

                        <ul class="dropdown-menu bg-dark">
                          <li><a class="dropdown-item text-light" href="cami.html">Camiler ve Kiliseler</a></li>
                          <li><a class="dropdown-item text-light" href="saray.html">Saraylar ve Kasırlar</a></li>
                          <li><a class="dropdown-item text-light" href="carsi.html">Çarşılar ve Hanlar</a></li>
                          <li><a class="dropdown-item text-light" href="kale.html">Kaleler ve Surlar</a></li>
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
                        <a class="nav-link" href="bizeulas.php">Bize Ulaşın</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="profil_guncelle.php">Profil</a>
                      </li>
                      <li class="nav-item">
                            <a class="nav-link" href="cikis.php">Çıkış Yap</a>
                        </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.html">English</a>
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
        <table align="center" width="1100px" height="700px" class="mb-5 mt-5">
          <tr>
            <td>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="slider1.png" width="1100px" height="700px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="slider2.jpg" width="1100px" height="700px" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="slider3.jpg" width="1100px" height="700px" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div></td>
        </tr>
      </table>

      <div class="card mb-3 mx-auto bg-dark col-sm" style="max-width: 1300px; height: 400px;">
        <div class="row g-0 align-items-center">
          <div class="col-md-6">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item mb-2 mt-5 mx-4" style="width: 600px; height: 300px;" src="https://www.youtube.com/embed/QBTxuMIq0dU" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-6 col-sm">
            <div class="card-body col-sm">
              <h5 class="card-title text-light">İstanbul'da Görmeniz Gereken 55 Muhteşem Nokta</h5>
              <p class="card-text text-light">İstanbul, tarihi ve kültürel açıdan zengin bir şehir olarak dünya çapında büyük ilgi görüyor. Bu videoda, İstanbul'un görülmesi gereken 55 muhteşem noktasını keşfedeceksiniz. Ayasofya, Topkapı Sarayı, Sultanahmet Camii gibi ünlü yapıların yanı sıra, boğaz manzaraları ve gizli güzellikler de sizleri bekliyor. Modern alışveriş merkezlerinden tarihi çarşılara kadar geniş bir yelpazede İstanbul'un sunduğu deneyimleri bu videoda bulabilirsiniz. Gez Dolaş Keşfet kanalı, İstanbul'u keşfetmek isteyenler için rehber niteliğinde. İstanbul'un tarihi dokusunu, lezzetlerini ve eğlenceli aktivitelerini bu videoda keşfedin ve unutulmaz bir gezi planı yapın.</p>
              <a href="https://www.youtube.com/watch?v=QBTxuMIq0dU" class="btn btn-dark btn-outline-light">YouTube İzle</a>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="container">
        <div class="row">
            <div class="col text-center mb-3">
                <h1 style="color: white;">Popüler Yerler</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm mb-5">
                <div class="card h-100 bg-dark">
                    <img src="sultanahmet.jpg" class="card-img-top" alt="">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-light">Sultan Ahmet Cami</h5>
                        <p class="card-text text-light"></p>
                        <a href="sultanahmet.html" class="btn btn-dark btn-outline-light mt-auto">Detaylı Bilgi</a>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-5">
                <div class="card h-100 bg-dark">
                    <img src="topkapı.jpg" class="card-img-top" alt="">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-light">Topkapı Sarayı</h5>
                        <p class="card-text text-light"></p>
                        <a href="topkapi.html" class="btn btn-dark btn-outline-light mt-auto">Detaylı Bilgi</a>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-5">
                <div class="card h-100 bg-dark">
                    <img src="ayasofya.jpg" class="card-img-top" alt="">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-light">Ayasofya Cami</h5>
                        <p class="card-text text-light"></p>
                        <a href="ayasofya.html" class="btn btn-dark btn-outline-light mt-auto">Detaylı Bilgi</a>
                    </div>
                </div>
            </div>
            <div class="col-sm mb-5">
              <div class="card h-100 bg-dark">
                  <img src="yerebatan.jpg" class="card-img-top" alt="">
                  <div class="card-body d-flex flex-column">
                      <h5 class="card-title text-light">Yerebatan Sarnıcı</h5>
                      <p class="card-text text-light"></p>
                      <a href="yerebatan.html" class="btn btn-dark btn-outline-light mt-auto">Detaylı Bilgi</a>
                  </div>
              </div>
          </div>
        </div>
    </div>
    
        <div class="card cardd bg-dark">
            <div class="card-header text-light">
              Alıntı
            </div>
            <div class="card-body">
              <blockquote class="blockquote text-light">
                <p>“Diğer bütün kentler ölümlüdür, ama sanırım İstanbul, insanlar var oldukça yaşayacaktır.”</p>
                <footer class="blockquote-footer text-light">Petrus Gyllius (Fransız doğa tarihçisi, çevirmen ve topoğraf)</footer>
              </blockquote>
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