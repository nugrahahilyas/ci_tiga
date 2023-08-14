<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">

</head>

<body>
<nav class="navbar bgstel navbar-expand-lg navbar-dark fixed-top" data-bs-theme="dark">
    <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="<?= base_url('assets/img/favicon.png'); ?>" alt="logo" width="30" >
                    <span class="ml-1">
                        Hilyas Riza Nugraha
                    </span>
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pengenalan" class="nav-link">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a href="#kompetensi" class="nav-link">Kompetensi</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('auth'); ?>" class="nav-link">Project Dummy</a>
                        </li>
                    </ul>
                </div>
        </div>
</nav>
<!-- end navbar -->

<!-- home -->
<section class="pt-5 mt-5" id="home">
     <div class="container pt-5">
         <div class="row align-items-center justify-content-center">
             <div class="col-lg-6 pb-5">
                 <h3 class="display text-dark">Hallooo Semua 👋, Saya </h3>
                 <h1 class="stel">
                    <strong class="text-dark">
                        Hilyas Riza Nugraha, S.Kom.
                    </strong>
               </h1>
                 <h4 class="mt-2 text-dark"><mark>Pengembang Website</mark> dan <mark>Pemimpi</mark><br></h4>
               <h5 class="mt-3 mb-5 text-dark"><del>Kesulitan</del> adalah tantangan !
               </h5>
              <a class="btn-bgstel py-2 px-4 bgstel rounded-pill border border-light text-white mt-5">Hubungi Saya</a>
             </div>

             <div class="col-lg-6 text-center pb-5">
                <img src="<?= base_url('assets/img/profil2.png'); ?>" alt="Hilyas" class="img-thumb gambar-hero">
            </div>
         </div>
         <div class="row py-3 justify-content-center bgstel rounded-pill mt-5">
            <div class="col-md-6 text-center align-items-center">
                <a href="https://www.instagram.com/nugrahahilyas/" class="btn-bgstel py-2 px-4 bgstel rounded-pill border border-light text-white mt-5 link-underline link-underline-opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                Nugraha Hilyas
            </a>
            </div>
            <div class="col-md-6 text-center align-items-center">
                <a href="https://www.gmail.com/" class="btn-bgstel py-2 px-4 bgstel rounded-pill border border-light text-white mt-5 link-underline link-underline-opacity-0">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg>
                nugraha.hilyas@gmail.com
            </a>
            </div>
         </div>
     </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#e2edff"
              fill-opacity="1"
              d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
            ></path>
    </svg>
 <section class="bgstel2 pt-5" id="pengenalan">
    <div class="container">
        <h1 class="display-6 text-center mb-5 pt-5">Pengenalan Singkat</h1>
           <div class="row justify-content-center pt-5">
                   <div class="col col-md-6">
                       <h3 class="text-center">Tentang Saya</h3>
                       <br>
                       <p class="lead">Saya adalah seorang individu berdedikasi dan berpengalaman dalam dunia organisasi. Selama 12 tahun terakhir, saya telah meniti karier di perusahaan sebelumnya, mengasah kemampuan kepemimpinan dan keterampilan organisasi yang kuat. Kini, minat saya yang mendalam terhadap perusahaan farmagitech telah memicu semangat besar untuk bergabung sebagai seorang programmer.</p>
                   </div>
                   <div class="col col-md-6">
                       <h3 class="text-center">Ketertarikan Pada Farmagitech</h3>
                       <br>
                       <p class="lead">Sejak Desember lalu, ketertarikan saya terhadap industri farmagitech semakin menggelora. Sebagai seorang programmer, saya menyadari potensi teknologi dalam menghadirkan inovasi yang mampu memberikan dampak positif pada masyarakat. Saya berkomitmen untuk berkontribusi dalam menciptakan solusi teknologi yang efisien dan berdaya guna, serta berperan aktif dalam mewujudkan visi perusahaan farmagitech. Saya yakin kombinasi pengalaman berorganisasi dan hasrat dalam dunia farmagitech akan menjadi nilai tambah bagi perusahaan dan membantu mencapai kesuksesan bersama. Saya berharap dapat berkolaborasi dengan perusahaan farmagitech dan memberikan kontribusi terbaik untuk mewujudkan tujuan bersama.</p>
                   </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                      <path
                      fill="white"
                      fill-opacity="1"
                      d="M0,192L40,186.7C80,181,160,171,240,181.3C320,192,400,224,480,213.3C560,203,640,149,720,112C800,75,880,53,960,58.7C1040,64,1120,96,1200,122.7C1280,149,1360,171,1400,181.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"
                      ></path>
                  </svg>
 </section>
 <section class="pt-5 pb-5" id="kompetensi">
    <div class="container">
         <h1 class="display-6 text-center pt-5 mb-5">Kompetensi</h1>
         <div class="row justify-content-around">
             <div class="col-lg-4">
                 <div class="card merahmuda" style="width: 23rem;">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-5">
                             <i class="fa-solid fa-screwdriver-wrench fa-5x" style="color: #ffd43b;"></i>
                            </div>
                             <div class="col-7">
                             <h5 class="card-title ms-2">Perangkat Lunak</h5>
                             <p class="card-text">
                                 <ul>
                                     <li>CodeIgniter 3</li>
                                     <li>Bootstrap 4.6</li>
                                     <li>Xampp</li>
                                     <li>JQuery</li>
                                 </ul>
                             </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4">
                 <div class="card birumuda" style="width: 23rem;">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-5">
                                 <i class="fa-solid fa-user-tie fa-5x"></i>    
                             </div>
                             <div class="col-7">
                             <h5 class="card-title ">Pengalaman Bekerja</h5>
                             <p class="card-text">
                                         12 Tahun sebagai pengembang produk dan IT Support.
                             </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4">
                 <div class="card hijaumuda" style="width: 23rem;">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-3">
                             <i class="fa-solid fa-graduation-cap fa-5x" style="color: #44511f;"></i>    
                             </div>
                             <div class="col-9">
                             <h5 class="card-title ml-3">Tools</h5>
                             <p class="card-text">
                             <ul>
                                     <li>S1 Sistem Informasi 
                                     <br>   
                                     UIN Sunan Kalijaga</li>
                                     <li>Rekayasa Perangkat Lunak 
                                     <br>   
                                     SMK Manangga Pratama</li>
                                 </ul>
                             </p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
 </section>
 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#14b8a6"
          fill-opacity="1"
          d="M0,192L60,202.7C120,213,240,235,360,229.3C480,224,600,192,720,192C840,192,960,224,1080,240C1200,256,1320,256,1380,256L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
        ></path>
      </svg>





<footer class="text-center bgstel p-3">
      <p class="text-light">
        Created with <i class="fas fa-heart" style="color: salmon;"></i> by <a class="link-underline link-underline-opacity-0 text-light" href="https://www.instagram.com/nugrahahilyas/">@nugrahahilyas</a>
      </p>
</footer>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="https://kit.fontawesome.com/d73b9b9954.js" crossorigin="anonymous"></script>
   

</body>

</html>