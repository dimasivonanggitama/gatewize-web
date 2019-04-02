@extends('home.app')

@section('content')
<div class="section" id="intro">
        <div class="container">

            <div class="client-logos negative-margin text-center">
                <p class="text-muted">DIPERCAYA OLEH CLIENT TERPERCAYA</p>

                <img src="images/client_logo_1.png" alt="client logo" />
                <img src="images/client_logo_2.png" alt="client logo" />
                <img src="images/client_logo_3.png" alt="client logo" />
                <img src="images/client_logo_4.png" alt="client logo" />
                <img src="images/client_logo_5.png" alt="client logo" />
                <img src="images/client_logo_6.png" alt="client logo" />
                <img src="images/client_logo_7.png" alt="client logo" />
                <img src="images/client_logo_8.png" alt="client logo" />
                <img src="images/client_logo_9.png" alt="client logo" />
                <img src="images/client_logo_10.png" alt="client logo" />

            </div>

        </div>
</div>
    <!-- // end #services.section -->

<div class="section" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6">
                    <div class="browser-window limit-height my-5 mr-0 mr-sm-5">
                            <div class="top-bar">
                                <div class="circles">
                                <div class="circle circle-red"></div>
                                <div class="circle circle-yellow"></div>
                                 <div class="circle circle-blue"></div>
                            </div>
                    </div>
                    <div class="content">
                        <img src="images/dashboard.png" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mt-0">Apa itu Gatewize ?</h3>
                        <p> Gatewize adalah platform H2H yang menghubungkan local market dengan modern market. Fokus kami adalah membantu local market agar dapat bertahan dan terus berkembang mengikuti zaman.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="section bg-light pt-lg" id="feature">
        <div class="container">

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="media mb-5">
                        <div class="media-icon d-flex mr-3"> <i class="pe-7s-paint-bucket pe-3x"></i> </div>
                        <!-- // end .di -->
                        <div class="media-body">
                            <h5 class="mt-0">Satu Akun Untuk Semua</h5> Tidak perlu lagi ribet banyak software, cukup satu Akun Gatewize untuk semua layanan.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="media mb-5">
                        <div class="media-icon d-flex mr-3"> <i class="pe-7s-rocket pe-3x"></i> </div>
                        <!-- // end .di -->
                        <div class="media-body">
                            <h5 class="mt-0">Kecepatan Maksimal</h5> Dibangun dengan teknologi terkini, transaksi akan diproses super cepat oleh sistem kami.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="media mb-5">
                        <div class="media-icon d-flex mr-3"> <i class="pe-7s-piggy pe-3x"></i> </div>
                        <!-- // end .di -->
                        <div class="media-body">
                            <h5 class="mt-0">Keamanan Diutamakan</h5> Kami membangun Gatewize sesuai standard yang berlaku, untuk menjaga keamanan data pelanggan.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="media mb-5">
                        <div class="media-icon d-flex mr-3"> <i class="pe-7s-cloud-upload pe-3x"></i> </div>
                        <!-- // end .di -->
                        <div class="media-body">
                            <h5 class="mt-0">Praktis dan Murah</h5> Tidak perlu ribet, tinggal topup saldo, pilih produk, bayar, jalankan!
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="media mb-5">
                        <div class="media-icon d-flex mr-3"> <i class="pe-7s-science pe-3x"></i> </div>
                        <!-- // end .di -->
                        <div class="media-body">
                            <h5 class="mt-0">Bantuan Terbaik</h5> Kami mengusahakan memberikan bantuan terbaik dari kami untuk menyelesaikan permasalahan anda.
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="media mb-5">
                        <div class="media-icon d-flex mr-3"> <i class="pe-7s-like2 pe-3x"></i> </div>
                        <!-- // end .di -->
                        <div class="media-body">
                            <h5 class="mt-0">Berjalan di Semua Platform</h5> Layanan kami dapat diimplementasi ke hampir semua platform yang support HTTP GET
                        </div>
                    </div>
                </div>
                <!-- // end .col -->
            </div>
        </div>
    </div>

    <!-- Signup -->
    <div class="section" id="contact">
        <div class="container">
            <div class="section-title text-center">
                <h3>Ada pertanyaan untuk kami ?</h3>
                <p>Jangan ragu untuk menghubungi kami, kami akan melayani dengan senang hati</p>
            </div>
            <div class="row justify-content-md-center">
                <div class="col col-md-5">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <textarea style="height:150px;" class="form-control" placeholder="Write your message here ..."></textarea>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('register') }}" class="btn btn-xl btn-block btn-primary">CONTACT US</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('hero')
<section class="jumbotron text-center">
    <div class="container">
            <h1 class="display-4">Solusi Praktis untuk Bisnis Anda</h1>
            <p class="lead my-4">Satu Akun Gatewize untuk terhubung ke semua layanan pembayaran, memudahkan anda bertransaksi dan melihat laporan secara realtime.</p>
            <p>
                <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Daftar Sekarang</a>
            </p>
     </div>
</section>
        <!-- // end hero -->
<div class="split-bg">
    <div class="macbook-hero">
        <img src="images/macbook.png" alt="macbook" class="img-fluid" />
        <div class="macbook-screen"><img src="images/screen.jpg" alt="screen" class="img-fluid" /></div>
    </div>
</div>
@endsection
