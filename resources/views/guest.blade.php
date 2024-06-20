<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sewa.in</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/logo-green-text.png') }}" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <div class="logo nav-item">
                    <svg width="394" height="82" viewBox="0 0 394 82" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.2328 81.7C23.0995 81.7 18.4995 80.8667 14.4328 79.2C10.3661 77.5333 7.09948 75.0667 4.63281 71.8C2.23281 68.5333 0.966146 64.6 0.832813 60H19.0328C19.2995 62.6 20.1995 64.6 21.7328 66C23.2661 67.3333 25.2661 68 27.7328 68C30.2661 68 32.2661 67.4333 33.7328 66.3C35.1995 65.1 35.9328 63.4667 35.9328 61.4C35.9328 59.6667 35.3328 58.2333 34.1328 57.1C32.9995 55.9667 31.5661 55.0333 29.8328 54.3C28.1661 53.5667 25.7661 52.7333 22.6328 51.8C18.0995 50.4 14.3995 49 11.5328 47.6C8.66615 46.2 6.19948 44.1333 4.13281 41.4C2.06615 38.6667 1.03281 35.1 1.03281 30.7C1.03281 24.1667 3.39948 19.0667 8.13281 15.4C12.8661 11.6667 19.0328 9.8 26.6328 9.8C34.3661 9.8 40.5995 11.6667 45.3328 15.4C50.0661 19.0667 52.5995 24.2 52.9328 30.8H34.4328C34.2995 28.5333 33.4661 26.7667 31.9328 25.5C30.3995 24.1667 28.4328 23.5 26.0328 23.5C23.9661 23.5 22.2995 24.0667 21.0328 25.2C19.7661 26.2667 19.1328 27.8333 19.1328 29.9C19.1328 32.1667 20.1995 33.9333 22.3328 35.2C24.4661 36.4667 27.7995 37.8333 32.3328 39.3C36.8661 40.8333 40.5328 42.3 43.3328 43.7C46.1995 45.1 48.6661 47.1333 50.7328 49.8C52.7995 52.4667 53.8328 55.9 53.8328 60.1C53.8328 64.1 52.7995 67.7333 50.7328 71C48.7328 74.2667 45.7995 76.8667 41.9328 78.8C38.0661 80.7333 33.4995 81.7 28.2328 81.7ZM116.956 52.2C116.956 53.8 116.856 55.4667 116.656 57.2H77.9563C78.2229 60.6667 79.3229 63.3333 81.2563 65.2C83.2563 67 85.6896 67.9 88.5563 67.9C92.8229 67.9 95.7896 66.1 97.4563 62.5H115.656C114.723 66.1667 113.023 69.4667 110.556 72.4C108.156 75.3333 105.123 77.6333 101.456 79.3C97.7896 80.9667 93.6896 81.8 89.1563 81.8C83.6896 81.8 78.8229 80.6333 74.5563 78.3C70.2896 75.9667 66.9563 72.6333 64.5563 68.3C62.1563 63.9667 60.9563 58.9 60.9563 53.1C60.9563 47.3 62.1229 42.2333 64.4563 37.9C66.8563 33.5667 70.1896 30.2333 74.4563 27.9C78.7229 25.5667 83.6229 24.4 89.1563 24.4C94.5563 24.4 99.3563 25.5333 103.556 27.8C107.756 30.0667 111.023 33.3 113.356 37.5C115.756 41.7 116.956 46.6 116.956 52.2ZM99.4563 47.7C99.4563 44.7667 98.4563 42.4333 96.4563 40.7C94.4563 38.9667 91.9563 38.1 88.9563 38.1C86.0896 38.1 83.6563 38.9333 81.6563 40.6C79.7229 42.2667 78.5229 44.6333 78.0563 47.7H99.4563ZM206.077 25.2L190.977 81H172.077L163.277 44.8L154.177 81H135.377L120.177 25.2H137.277L145.177 65.1L154.577 25.2H172.677L182.177 64.9L189.977 25.2H206.077ZM209.198 53C209.198 47.2667 210.265 42.2333 212.398 37.9C214.598 33.5667 217.565 30.2333 221.298 27.9C225.032 25.5667 229.198 24.4 233.798 24.4C237.732 24.4 241.165 25.2 244.098 26.8C247.098 28.4 249.398 30.5 250.998 33.1V25.2H268.098V81H250.998V73.1C249.332 75.7 246.998 77.8 243.998 79.4C241.065 81 237.632 81.8 233.698 81.8C229.165 81.8 225.032 80.6333 221.298 78.3C217.565 75.9 214.598 72.5333 212.398 68.2C210.265 63.8 209.198 58.7333 209.198 53ZM250.998 53.1C250.998 48.8333 249.798 45.4667 247.398 43C245.065 40.5333 242.198 39.3 238.798 39.3C235.398 39.3 232.498 40.5333 230.098 43C227.765 45.4 226.598 48.7333 226.598 53C226.598 57.2667 227.765 60.6667 230.098 63.2C232.498 65.6667 235.398 66.9 238.798 66.9C242.198 66.9 245.065 65.6667 247.398 63.2C249.798 60.7333 250.998 57.3667 250.998 53.1ZM288.47 81.8C285.47 81.8 283.003 80.9333 281.07 79.2C279.203 77.4 278.27 75.2 278.27 72.6C278.27 69.9333 279.203 67.7 281.07 65.9C283.003 64.1 285.47 63.2 288.47 63.2C291.403 63.2 293.803 64.1 295.67 65.9C297.603 67.7 298.57 69.9333 298.57 72.6C298.57 75.2 297.603 77.4 295.67 79.2C293.803 80.9333 291.403 81.8 288.47 81.8ZM317.292 19.4C314.292 19.4 311.826 18.5333 309.892 16.8C308.026 15 307.092 12.8 307.092 10.2C307.092 7.53333 308.026 5.33333 309.892 3.6C311.826 1.79999 314.292 0.899994 317.292 0.899994C320.226 0.899994 322.626 1.79999 324.492 3.6C326.426 5.33333 327.392 7.53333 327.392 10.2C327.392 12.8 326.426 15 324.492 16.8C322.626 18.5333 320.226 19.4 317.292 19.4ZM325.792 25.2V81H308.692V25.2H325.792ZM372.184 24.6C378.718 24.6 383.918 26.7333 387.784 31C391.718 35.2 393.684 41 393.684 48.4V81H376.684V50.7C376.684 46.9667 375.718 44.0667 373.784 42C371.851 39.9333 369.251 38.9 365.984 38.9C362.718 38.9 360.118 39.9333 358.184 42C356.251 44.0667 355.284 46.9667 355.284 50.7V81H338.184V25.2H355.284V32.6C357.018 30.1333 359.351 28.2 362.284 26.8C365.218 25.3333 368.518 24.6 372.184 24.6Z"
                            fill="white" />
                    </svg>
                </div>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0" style="">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#venue">Venue</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item">
                        <form action="{{ url('/login') }}" method="GET" custom-action>
                            @csrf
                            <button class="btn btn-primary">Login</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Sewa Dulu, Main Belakangan</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Cek, sewa, enjoy!</p>
                    <a class="btn btn-primary btn-xl" href="#venue">Book Now</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Lihat jadwal yang tersedia dan langsung pesan lapangan kesayanganmu di
                        mana saja dan kapan saja!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Venue -->
    <div id="venue">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="venue-box" href="{{ asset('assets/img/sports/fullsize/sports-1.jpg') }}"
                        title="Jakarta International Stadium">
                        <img class="img-fluid" src="{{ asset('assets/img/sports/thumbnails/sports-1.jpg') }}"
                            alt="..." />
                        <div class="venue-box-caption">
                            <div class="project-category text-white-50">Running</div>
                            <div class="project-name">Jakarta International Stadium</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="venue-box" href="{{ asset('assets/img/sports/fullsize/sports-5.jpg') }}"
                        title="Asaba Green Arena">
                        <img class="img-fluid" src="{{ asset('assets/img/sports/thumbnails/sports-5.jpg') }}"
                            alt="..." />
                        <div class="venue-box-caption">
                            <div class="project-category text-white-50">Mini Soccer</div>
                            <div class="project-name">Asaba Green Arena</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="venue-box" href="{{ asset('assets/img/sports/fullsize/sports-6.jpg') }}"
                        title="Gelora Bung Karno">
                        <img class="img-fluid" src="{{ asset('assets/img/sports/thumbnails/sports-6.jpg') }}"
                            alt="..." />
                        <div class="venue-box-caption">
                            <div class="project-category text-white-50">Football</div>
                            <div class="project-name">Gelora Bung Karno</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="venue-box" href="{{ asset('assets/img/sports/fullsize/sports-2.jpg') }}"
                        title="Indoor Tennis Senayan">
                        <img class="img-fluid" src="{{ asset('assets/img/sports/thumbnails/sports-2.jpg') }}"
                            alt="..." />
                        <div class="venue-box-caption">
                            <div class="project-category text-white-50">Tennis</div>
                            <div class="project-name">Indoor Tennis Senayan</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="venue-box" href="{{ asset('assets/img/sports/fullsize/sports-8.jpg') }}"
                        title="GOR Kedopok">
                        <img class="img-fluid" src="{{ asset('assets/img/sports/thumbnails/sports-8.jpg') }}"
                            alt="..." />
                        <div class="venue-box-caption">
                            <div class="project-category text-white-50">Swimming</div>
                            <div class="project-name">GOR Kedopok</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="venue-box" href="{{ asset('assets/img/sports/fullsize/sports-11.jpg') }}"
                        title="BBS KJ Secondary Sports Field">
                        <img class="img-fluid" src="{{ asset('assets/img/sports/thumbnails/sports-11.jpg') }}"
                            alt="..." />
                        <div class="venue-box-caption p-3">
                            <div class="project-category text-white-50">Basketball</div>
                            <div class="project-name">BBS KJ Secondary Sports Field</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="col-md-12">
                <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6 text-center">
                            <h2 class="mt-0">Let's Get In Touch!</h2>
                            <hr class="divider" />
                            <p class="text-muted mb-5">Gabung bersama kami dan daftarkan lapanganmu!</p>
                            <a href="mailto:frisaranda@gmail.com" target="_blank" class="btn btn-outline-primary">
                                <i class="bi bi-envelope-fill"></i> Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2024 - Frisaranda Diouf</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
