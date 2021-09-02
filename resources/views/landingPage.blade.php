@extends('layouts/landingPageLayout')


@section('container')
    @include('components/generalNavbar')

    <div class="container-md">
        <div class="section s1" data-background="#ffff">
            <div class="home-first">
                <div class="display">
                    <div class="slogan">
                        <h1>Antrie Aplikasi Antrian Online</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <a type="button" class="btn btn-success" href="{{ route('beranda') }}">Try it Now!</a>
                    </div>
                    <div class="image">
                        <div class="imageSlogan d-flex justify-content-end">
                            <img src="img/homepageAntrie.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section s2" data-background="#4DB0FF">
            <div class="home-second">
                <div class="slogan-second">
                    <h1>Apa itu Antrie ?</h1>
                    <p>Antrie merupakan platform berbasis website yang menyediakan antre online atau online queueing
                        yang dapat digunakan secara universal oleh berbagai instansi ataupun kegiatan serta dapat
                        dikonfigurasi sesuai dengan kebutuhan antrean dari suatu instansi ataupun kegiatan.</p>
                </div>
                <div class="image-second">
                    <img src="img/komputerHompage.png" alt="">
                </div>
            </div>
        </div>
        <div class="section s3" data-background="#ffff">
            <div class="home-third">
                <div class="slogan-third">
                    <h1>Temukan peran mu</h1>
                    <h1>dalam website kami</h1>
                </div>
                <div class="slogan-pembuat-antrean">
                    <div class="word-pembuat-antrean">
                        <h1>Pembuat Antrean</h1>
                        <p>Lorem a dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <button type="button" id="kelebihan-pembuat-antrean" class="mt-2">Kelebihan<i <<<<<<< HEAD
                                class="fas fa-plus" id="tambah-pembuat-antrean"></i></button>
                        <ul class="mt-3">
                            <li>Lorem a dolor sit ametconsectetur adipiscing elit, sed do eiusmod</li>
                            <li>Lorem a dolor sit ametconsectetur adipiscing elit, sed do eiusmod</li>
                            <li>Lorem a dolor sit ametconsectetur adipiscing elit, sed do eiusmod</li>
                        </ul>
                    </div>
                    <div class="img-pembuat-antrean">
                        <img src="img/pembuatAntrean.png" alt="">
                    </div>
                </div>

                <div class="slogan-pengantre">
                    <div class="img-pengantre">
                        <img src="img/pengantre.png" alt="">
                    </div>
                    <div class="word-pengantre">
                        <h1>Pengantre</h1>
                        <p>Lorem a dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <button type="button" id="kelebihan-pengantre">Kelebihan<i class="fas fa-plus"
                                id="tambah-pengantre"></i></button>
                        <ul class="mt-3">
                            <li>Lorem a dolor sit ametconsectetur adipiscing elit, sed do eiusmod</li>
                            <li>Lorem a dolor sit ametconsectetur adipiscing elit, sed do eiusmod</li>
                            <li>Lorem a dolor sit ametconsectetur adipiscing elit, sed do eiusmod</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="section s4" data-background="#FFE77A">
            <div class="home-forth">
                <div class="word-kenapa-pilih">
                    <h1>Kenapa harus pilih kami ?</h1>
                    <p>Kami berusaha untuk memberikan solusi yang berupa platform antrian online berbasis web yang
                        memungkinkan setiap penggunanya untuk mengantri dan membuat antrian dengan mudah. </p>
                </div>
                <div class="card-kenapa-pilih">
                    <div class="kemudahan-kenapa-pilih">
                        <div class="front">
                            <div class="up-icon">
                                <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M38.3333 38.3333L23 23M17.25 9.58333V5.75M17.25 28.75V24.9167M9.58333 17.25H5.75M28.75 17.25H24.9167M12.4584 12.4584L8.3925 8.3925M12.4584 22.0417L8.39254 26.1076M26.1076 8.39244L22.0417 12.4583"
                                        stroke="#FFE77A" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="kemudahan-word">
                                <p>Kemudahan</p>
                            </div>
                        </div>
                        <div class="back">
                            test
                        </div>
                    </div>
                    <div class="kecepatan-kenapa-pilih">
                        <div class="front">
                            <div class="up-icon">
                                <svg width="43" height="50" viewBox="0 0 43 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.1538 5H11.8462L4 28.2941H14.4615L9.23077 49L38 20.5294H23.8769L30.1538 5Z"
                                        stroke="#FFE77A" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="kemudahan-word">
                                <p>Kecepatan</p>
                            </div>
                        </div>
                        <div class="back">
                            test
                        </div>
                    </div>
                    <div class="fleksibilitas-kenapa-pilih">
                        <div class="front">
                            <div class="up-icon">
                                <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 40L9.2602 40.1233C9.32048 40.4849 9.63337 40.75 10 40.75V40ZM38 40V40.75C38.3666 40.75 38.6795 40.4849 38.7398 40.1233L38 40ZM31 25L30.3673 25.4027C30.4824 25.5836 30.6694 25.7065 30.8811 25.7405C31.0928 25.7745 31.309 25.7162 31.4749 25.5805L31 25ZM17 25L16.5251 25.5805C16.691 25.7162 16.9072 25.7745 17.1189 25.7405C17.3306 25.7065 17.5176 25.5836 17.6327 25.4027L17 25ZM5.2602 16.1233L9.2602 40.1233L10.7398 39.8767L6.7398 15.8767L5.2602 16.1233ZM10 40.75H38V39.25H10V40.75ZM38.7398 40.1233L42.7398 16.1233L41.2602 15.8767L37.2602 39.8767L38.7398 40.1233ZM41.5251 15.4195L30.5251 24.4195L31.4749 25.5805L42.4749 16.5805L41.5251 15.4195ZM5.52507 16.5805L16.5251 25.5805L17.4749 24.4195L6.47493 15.4195L5.52507 16.5805ZM17.6327 25.4027L24.6327 14.4027L23.3673 13.5973L16.3673 24.5973L17.6327 25.4027ZM23.3673 14.4027L30.3673 25.4027L31.6327 24.5973L24.6327 13.5973L23.3673 14.4027ZM26.25 11C26.25 12.2426 25.2426 13.25 24 13.25V14.75C26.0711 14.75 27.75 13.0711 27.75 11H26.25ZM24 13.25C22.7574 13.25 21.75 12.2426 21.75 11H20.25C20.25 13.0711 21.9289 14.75 24 14.75V13.25ZM21.75 11C21.75 9.75736 22.7574 8.75 24 8.75V7.25C21.9289 7.25 20.25 8.92893 20.25 11H21.75ZM24 8.75C25.2426 8.75 26.25 9.75736 26.25 11H27.75C27.75 8.92893 26.0711 7.25 24 7.25V8.75ZM8.25 13C8.25 14.2426 7.24264 15.25 6 15.25V16.75C8.07107 16.75 9.75 15.0711 9.75 13H8.25ZM6 15.25C4.75736 15.25 3.75 14.2426 3.75 13H2.25C2.25 15.0711 3.92893 16.75 6 16.75V15.25ZM3.75 13C3.75 11.7574 4.75736 10.75 6 10.75V9.25C3.92893 9.25 2.25 10.9289 2.25 13H3.75ZM6 10.75C7.24264 10.75 8.25 11.7574 8.25 13H9.75C9.75 10.9289 8.07107 9.25 6 9.25V10.75ZM44.25 13C44.25 14.2426 43.2426 15.25 42 15.25V16.75C44.0711 16.75 45.75 15.0711 45.75 13H44.25ZM42 15.25C40.7574 15.25 39.75 14.2426 39.75 13H38.25C38.25 15.0711 39.9289 16.75 42 16.75V15.25ZM39.75 13C39.75 11.7574 40.7574 10.75 42 10.75V9.25C39.9289 9.25 38.25 10.9289 38.25 13H39.75ZM42 10.75C43.2426 10.75 44.25 11.7574 44.25 13H45.75C45.75 10.9289 44.0711 9.25 42 9.25V10.75Z"
                                        fill="#FFE77A" />
                                </svg>
                            </div>
                            <div class="kemudahan-word">
                                <p>Fleksibilitas</p>
                            </div>
                        </div>
                        <div class="back">
                            test
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section s5" data-background="#ffff">
            <div class="home-fifth">
                <div class="share-love-img-left">
                    <img src="img/shareThelove1.png" alt="">
                </div>
                <div class="share-love-word">
                    <h1>Share The Love</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore.</p>
                </div>
                <div class="share-love-img-right">
                    <img src="img/shareThelove2.png" alt="">
                </div>
            </div>
            <div class="footer">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img src="img/logoAntrielight.png" alt="">
                    </div>
                    <div class="footer-word1">
                        <ul>
                            <p>Kunjungi kami</p>
                            <li>Instagram</li>
                            <li>Twitter</li>
                            <li>Github</li>
                        </ul>
                    </div>
                    <div class="footer-word2">
                        <ul>
                            <p>Company</p>
                            <li>Contact us</li>
                            <li>Our Customer</li>
                        </ul>
                    </div>
                    <div class="footer-word3">
                        <ul>
                            <p>Support</p>
                            <li>Quick Start Guide</li>
                            <li>Customer Support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
