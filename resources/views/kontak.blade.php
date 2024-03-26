@extends('layouts.app')

@section('content')
    <div class="contact section-content">
        <div class="container mb-30" data-aos="fade-up">
            <div class="section-title">
                <h2>Contact</h2>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Alamat</h3>
                        <p>{{ $setting->alamat }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>{{ $setting->email }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Telepon</h3>
                        <p>{{ $setting->telepon }}</p>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <iframe class="mb-4 mb-lg-0"
                        src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d31869.274314955386!2d99.44162365360816!3d3.1840006516258934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d3.1718838999999996!2d99.4209133!4m5!1s0x3033c9a7a7d0826d%3A0xfc2028610963e0b!2s5FVW%2BPWH%20Dinas%20Perumahan%20Kawasan%20Permukiman%20dan%20Lingkungan%20Hidup%20Kabupaten%20Batu%20Bara%2C%20Simpang%20Dolok%2C%20Lima%20Puluh%2C%20Batu%20Bara%20Regency%2C%20North%20Sumatra!3m2!1d3.1942749!2d99.4973516!5e0!3m2!1sid!2sid!4v1679310860334!5m2!1sid!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d31869.274314955386!2d99.44162365360816!3d3.1840006516258934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d3.1718838999999996!2d99.4209133!4m5!1s0x3033c9a7a7d0826d%3A0xfc2028610963e0b!2s5FVW%2BPWH%20Dinas%20Perumahan%20Kawasan%20Permukiman%20dan%20Lingkungan%20Hidup%20Kabupaten%20Batu%20Bara%2C%20Simpang%20Dolok%2C%20Lima%20Puluh%2C%20Batu%20Bara%20Regency%2C%20North%20Sumatra!3m2!1d3.1942749!2d99.4973516!5e0!3m2!1sid!2sid!4v1679310860334!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
