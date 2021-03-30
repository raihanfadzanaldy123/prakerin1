<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>TRACKING COVID-19</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset ('frontEnd/assets/img/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset ('frontEnd/assets/css/styles.css') }}" rel="stylesheet" />
    <!-- Table Pagination -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <i class="fas fa-2x fa-briefcase-medical  mb-2"></i> &nbsp;
            <!-- <i class="fas fa-briefcase-medical"></i> -->
            <a class="navbar-brand js-scroll-trigger " href="#page-top">Tracking Covid</a>
            <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#indonesia">Data Kasus Indonesia</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#provinsi">Data Kasus Proinvsi</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#global">Data Kasus Global</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#layanan">Layanan</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="page-section bg-primary" id="judul">
        <div class="container h-100"">
            <div class=" row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end">
                <i class="fas fa-3x fal fa-virus text-white mb-4"></i>
                <i class="fas fa-6x fal fa-virus text-white mb-4"></i>
                <i class="fas fa-3x fal fa-virus text-white mb-4"></i>
                <h1 class="text-uppercase text-white font-weight-bold">TRACKING COVID-19</h1>
                <h2 class="text-uppercase text-white font-weight-bold">Coronavirus Global & Indonesia Live Data</h2> <br> <br><br>
                <p class="text-white">Update terakhir : {{ $tanggal }}</p>
            </div>
        </div>
        </div>
    </header>
    <!-- About -->
    <!-- <section class="page-section bg-primary" id="judul">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">


                </div>
            </div>
        </div>
    </section> -->
    <!-- Services-->
    <section class="page-section" id="indonesia">
        <div class="container">
            <h2 class="text-center mt-0">Data Kasus Indonesia</h2>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-6x fas fa-plus text-primary mb4"></i>
                        <br><br>
                        <h3 class="h4 mb-2">Total Positif</h3>
                        <p class="text-muted h3 mb-4"><span data-toggle="counter-up">
                                {{$positif}}
                            </span></p>
                        <p class="text-muted mb-0">Orang</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-6x fas fa-heartbeat text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Total Sembuh</h3>
                        <h2 class="text-muted h3 mb-4"><span data-toggle="counter-up">
                                {{ $sembuh }}
                            </span></h2>
                        <p class="text-muted mb-0">Orang</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-6x fa-skull-crossbones text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Total Meninggal</h3>
                        <p class="text-muted h3 mb-4"><span data-toggle="counter-up">
                                {{ $meninggal}}
                            </span></p>
                        <p class="text-muted mb-0">Orang</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <!-- <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset ('frontEnd/assets/img/portfolio/fullsize/1.jpg') }}">
                        <img class="img-fluid" src="{{ asset ('frontEnd/assets/img/portfolio/thumbnails/1.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset ('frontEnd/assets/img/portfolio/fullsize/2.jpg') }}">
                        <img class="img-fluid" src="{{ asset ('frontEnd/assets/img/portfolio/thumbnails/2.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset ('frontEnd/assets/img/portfolio/fullsize/3.jpg') }}">
                        <img class="img-fluid" src="{{ asset ('frontEnd/assets/img/portfolio/thumbnails/3.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset ('frontEnd/assets/img/portfolio/fullsize/4.jpg') }}">
                        <img class="img-fluid" src="{{ asset ('frontEnd/assets/img/portfolio/thumbnails/4.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="{{ asset ('frontEnd/assets/img/portfolio/fullsize/5.jpg') }}">
                        <img class="img-fluid" src="{{ asset ('frontEnd/assets/img/portfolio/thumbnails/5.jpg') }}" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Call to action-->
    <section class="page-section bg-primary text-black" id="provinsi">
        <div class="container text">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-2">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h5>
                </div>

                <table class="table table-bordered auto ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">PROVINSI</th>
                            <th scope="col">POSITIF</th>
                            <th scope="col">SEMBUH</th>
                            <th scope="col">MENINGGAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($provinsi as $dataCovid)
                        <tr>
                            <th scope="row">{{ $no++ }} </th>
                            <td>
                                {{ $dataCovid->nama_provinsi }}
                            </td>
                            <td>
                                {{ $dataCovid->positif}}
                            </td>
                            <td>
                                {{ $dataCovid->sembuh}}
                            </td>
                            <td>
                                {{ $dataCovid->meninggal }}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </section>

    <!-- Kasus Global -->
    <section class="page-section" id="global">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-2">Data Kasus Coronavirus di Dunia</h5>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Negara</th>
                                <th>POSITIF</th>
                                <th>SEMBUH</th>
                                <th>MENINGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($data3 as $dataCorona3)
                            <tr>
                                <th>{{ $no++ }} </th>
                                <td>
                                    {{ $dataCorona3['attributes']['Country_Region'] }}
                                </td>
                                <td>
                                    {{ number_format($dataCorona3['attributes']['Confirmed'] )}}
                                </td>
                                <td>
                                    {{ number_format($dataCorona3['attributes']['Recovered']) }}
                                </td>
                                <td>
                                    {{ number_format($dataCorona3['attributes']['Deaths']) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact-->
    <!-- <section class="page-section bg-primary" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider my-4" />
                    <p class="text-white mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                    <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div class="text-white">+1 (555) 123-4567</div>
                </div>
                <div class="col-lg-4 mr-auto text-center">
                    <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <a class="d-block text-white" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
                </div>
            </div>
        </div>
    </section> --> &nbsp;&nbsp;&nbsp;

    <!-- Layanan Section -->
    <section id="layanan" class="page-section bg-primary">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Layanan</h2>
                <h3>Berikut <span>Layanan</span></h3>
                <h4>
                    <p>beberapa lembaga mengenai tentang coronavirus</p>
                </h4>
            </div>

            <div class="row">
                <div class="col-lg-3  " data-aos="zoom-out" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a class="text-white" href="https://www.unicef.org/indonesia/id/coronavirus">
                                Novel Coronavirus (COVID-19)</a></h4>
                        <p>Hal-hal yang perlu anda ketahui</p><br>
                        <p>Unicef</p>
                    </div>
                </div>

                <div class="col-lg-3  " data-aos="zoom-out" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a class="text-white" href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
                                Daftar Rumah Sakit</a></h4> <br>
                        <p>Daftar 100 rumah sakit di Indoneis rujukan penanganan virus corona</p><br>
                        <p>Kompas</p>
                    </div>
                </div>

                <div class="col-lg-3  " data-aos="zoom-out" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a class="text-white" href="https://infeksiemerging.kemkes.go.id/">
                                Media Informasi</a></h4> <br>
                        <p>Media informasi resmi penyakit Infeksi Emerging</p><br>
                        <p>Kementrian Kesehatan</p>
                    </div>
                </div>

                <div class="col-lg-3  " data-aos="zoom-out" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-first-aid"></i></div>
                        <h4><a class="text-white" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
                                Coronavirus Disease(COVID-19)</a></h4>
                        <p>Coronavirus Disease advice for the public</p><br>
                        <p>WHO</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="large text-center text-muted">
                <li>
                    <a class="social-icon" href="https://instagram.com/ethicalhack.id" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset ('frontEnd/assets/js/scripts.js') }}"></script>
    <!-- Table Pagination -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>