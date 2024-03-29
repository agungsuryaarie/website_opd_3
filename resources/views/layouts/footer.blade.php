<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row px-6">
                <div class="col-lg-4">
                    <img src="{{ url('front/img/logo-white.png') }}" class="img-footer mb-6">
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Kategori Berita</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Dinas</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Pemerintahan</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Umum</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Profil</h4>
                    <ul>
                        @foreach ($halaman as $h)
                            <li><i class="bx bx-chevron-right"></i><a
                                    href="{{ route('halamanprofil.index', $h->slug) }}">{{ $h->judul }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Kontak Kami</h4>
                    <p><i class="bi bi-house-fill"></i> {{ $setting->alamat }}</p>
                    <p><i class="bi bi-telephone-inbound-fill"></i> {{ $setting->telepon }}</p>
                    <p><i class="bi bi-envelope-open-fill"></i> {{ $setting->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="px-4">
            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        Copyright &copy; <span>{{ $setting->nama_instansi }}</span>
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="youtube"><i class="bx bxl-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<div id="preloader">
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="{{ url('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Vendor JS Files -->
<script src="{{ url('front/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ url('front/vendor/aos/aos.js') }}"></script>
<script src="{{ url('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ url('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ url('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ url('front/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ url('front/js/main.js') }}"></script>
<script src="{{ url('front/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>

@yield('script')
</body>

</html>
