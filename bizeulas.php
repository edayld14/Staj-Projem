<?php
include("baglanti.php");
if(isset($_POST["adsoyad"], $_POST["tel"], $_POST["mail"], $_POST["konu"], $_POST["mesaj"]))
{
  $adsoyad=$_POST["adsoyad"];
  $telefon=$_POST["tel"];
  $email=$_POST["mail"];
  $konu=$_POST["konu"];
  $mesaj=$_POST["mesaj"];
  
  $ekle="INSERT INTO iletisim(adsoyad, telefon, email, konu, mesaj) VALUES ('$adsoyad','$telefon','$email','$konu','$mesaj')";


  if($baglanti->query($ekle)===TRUE)
  {
    echo "<script>alert('Mesajınız başarılı bir şekilde gönderildi.')</script>";
    }

  else{
    echo "<script>alert('Mesajınız gönderilemedi.')</script>";
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
          #iletisim {
            background-size: cover;
            padding: 50px;
            height: auto;
            text-align: center;
          }
          #h3iletisim {
            color: #ffffff;
          }
          #iletisimopak {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px 20px;
            border-radius: 5px;
            margin-bottom: 50px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
          }
          #formgroup {
            width: 60%;
            text-align: left;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
          }
          .form-control {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            line-height: 1.5;
            color: #495057;
            background-color: white;
            border-radius: 5px;
            border: 1px solid #ced4da;
          }
          textarea {
            font-family: Arial, Helvetica, sans-serif;
            width: 1200px;
            padding: 10px;
          }
          input[type="submit"] {
            cursor: pointer;
            background-color: #445c6e;
            font-size: 18px;
            letter-spacing: 1px;
            padding: 10px 30px;
            color: white;
            border-radius: 5px;
            border: 2px solid white;
            margin-top: 10px;
          }
          #adres {
            width: 35%;
            padding: 30px;
            text-align: left;
          }
          #adresbaslik {
            font-size: 30px;
            color: white;
          }
          .adresp {
            font-size: 15px;
            color: #ddd;
            letter-spacing: 1.5px;
          }
          .container {
            max-width: 1200px;
            margin: auto;
          }
          body {
            background-image: url('uye.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
          }
          .cardd {
            margin: 45px; /* Kenar boşlukları */
          }
          footer {
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
                      <a class="nav-link dropdown-toggle" href="mekanlar.html" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mekanlar</a>
                      <ul class="dropdown-menu bg-dark">
                        <li><a class="dropdown-item text-light" href="mekanlar.html">Tümü</a></li>
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
                      <a class="nav-link" href="iletisim.html">İletişim</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="bize-ulas.html">Bize Ulaşın</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="uyeol.html">Üye Olun</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="uyegirisi.html">Üye Girişi</a>
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
        <section id="iletisim">
          <div class="container">
            <h3 id="h3iletisim">İletişim</h3>
            <br>
            <form action="bizeulas.php" method="POST">
            <div id="iletisimopak">
              <div id="formgroup">
                <input type="text" name="adsoyad" placeholder="Ad Soyad" required class="form-control">
                <input type="text" name="tel" placeholder="Telefon Numarası" required class="form-control">
                <input type="email" name="mail" placeholder="E-mail Adresi" required class="form-control">
                <input type="text" name="konu" placeholder="Konu Başlığı" required class="form-control">
                <textarea name="mesaj" cols="30" placeholder="Mesaj Giriniz" rows="10" required class="form-control"></textarea>
              </div>
              <div id="adres">
                <h4 id="adresbaslik">Adres:</h4>
                <p class="adresp">Mehmet Akif Ersoy Mah.</p>
                <p class="adresp">Akyıldız Caddesi</p>
                <p class="adresp">Oğuz Bey sokak No:123</p>
                <p class="adresp">0212 389 99 99</p>
                <p class="adresp">Email : paylastikca@paylastikca.com</p>
              </div>
              <div>
                <input type="submit" value="Gönder"></div>
            </div>
          </form>
          </div>
        </section>
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