<!-- Footer Area -->
<footer id="footer" class="footer ">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>من نحن</h2>
                        <p dir="rtl">{!! Str::limit(strip_tags($aboutUs->description),250)!!} </p>


                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-12 mt-3 text-center">
                                <img src="{{asset('storage/' . $settings->footer_logo)}}">
                                <p>{{$settings->campany_name}}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-footer f-link">
                        <h2>الصفحات</h2>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-12">
                                <ul>
                                    <li><a href="{{route('home')}}"><i class="fa fa-caret-right" aria-hidden="true"></i>الرئيسية</a>
                                    </li>
                                    <li><a href="{{route('about_us')}}"><i class="fa fa-caret-right"
                                                                           aria-hidden="true"></i>من نحن</a>
                                    </li>
                                    <li><a href="{{route('gallery')}}"><i class="fa fa-caret-right"
                                                                          aria-hidden="true"></i>معرض الصور</a>
                                    </li>
                                    <li><a href="{{route('contactus')}}"><i class="fa fa-caret-right"
                                                                            aria-hidden="true"></i>تواصل معنا</a>
                                    </li>
                                    <li><a href="{{route('products.index')}}"><i class="fa fa-caret-right"
                                                                                 aria-hidden="true"></i>المنتجات</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>روابط منصات التواصل</h2>
                        <div class="row">
                            <!-- Social -->
                            <ul class="social">
                                <li><a target="_blank" href="{{$settings->facebook}}"><i
                                            class="icofont-facebook"></i></a></li>
                                <li><a target="_blank" href="{{$settings->instagram }}"><i
                                            class="icofont-instagram"></i></a></li>
                                <li><a target="_blank" href="{{$settings->twitter}}"><i class="icofont-twitter"></i></a>
                                </li>
                            </ul>
                            <!-- End Social -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Top -->
        <!-- Copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="copyright-content">
                            <p>© حقوق الطبع والنشر {{ date('Y') }} | جميع الحقوق محفوظة لـشركة سمور استيل</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Copyright -->
</footer>
<!--/ End Footer Area -->

<!-- jquery Min JS -->
<script src={{asset('front/js/jquery.min.js')}}></script>
<!-- jquery Migrate JS -->
<script src={{asset('front/js/jquery-migrate-3.0.0.js')}}></script>
<!-- jquery Ui JS -->
<script src={{asset('front/js/jquery-ui.min.js')}}></script>
<!-- Easing JS -->
<script src={{asset('front/js/easing.js')}}></script>
<!-- Color JS -->
<script src={{asset('front/js/colors.js')}}></script>
<!-- Popper JS -->
<script src={{asset('front/js/popper.min.js')}}></script>
<!-- Bootstrap Datepicker JS -->
<script src={{asset('front/js/bootstrap-datepicker.js')}}></script>
<!-- Jquery Nav JS -->
<script src={{asset('front/js/jquery.nav.js')}}></script>
<!-- Slicknav JS -->
<script src={{asset('front/js/slicknav.min.js')}}></script>
<!-- ScrollUp JS -->
<script src={{asset('front/js/jquery.scrollUp.min.js')}}></script>
<!-- Niceselect JS -->
<script src={{asset('front/js/niceselect.js')}}></script>
<!-- Tilt Jquery JS -->
<script src={{asset('front/js/tilt.jquery.min.js')}}></script>
<!-- Owl Carousel JS -->
<script src={{asset('front/js/owl-carousel.js')}}></script>
<!-- counterup JS -->
<script src={{asset('front/js/jquery.counterup.min.js')}}></script>
<!-- Steller JS -->
<script src={{asset('front/js/steller.js')}}></script>
<!-- Wow JS -->
<script src={{asset('front/js/wow.min.js')}}></script>
<!-- Magnific Popup JS -->
<script src={{asset('front/js/jquery.magnific-popup.min.js')}}></script>
<!-- Counter Up CDN JS -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<!-- Bootstrap JS -->
<script src={{asset('front/js/bootstrap.min.js')}}></script>
<!-- Main JS -->
<script src={{asset('front/js/main.js')}}></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(session('success'))
    toastr.success('{{ session('success') }}');
    @endif
</script>
</body>
</html>
