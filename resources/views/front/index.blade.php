@include('front.layouts.header')








<!-- Slider Area -->
<section class="slider">
    <div class="hero-slider">
        @forelse($sliders as $slider)
            <!-- Start Single Slider -->
            <div class="single-slider" style="background-image:url({{asset('storage/' . $slider->images)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text text-center">
                                <h1>We Provide <span>Medical</span> Services That You Can <span>Trust!</span></h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl
                                    pellentesque,
                                    faucibus libero eu, gravida quam. </p>
                                <div class="button text-center">
                                    <a href="#" class="btn">مشاهدة منتجاتنا</a>
                                    <a href="#" class="btn primary">معرفة المزيد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slider -->
        @empty
        @endforelse
    </div>
</section>
<!--/ End Slider Area -->

<!-- Start Schedule Area -->
<section class="schedule">
    <div class="container">
        <div class="schedule-inner">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 ">
                    <!-- single-schedule -->
                    <div class="single-schedule first">
                        <div class="inner text-right">
                            <div class="icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="single-content">
                                <h4>الجودة أولاً</h4>
                                <p>نلتزم بتقديم أفضل المنتجات والخدمات التي تتميز بأعلى معايير الجودة، لأننا نؤمن بأن
                                    جودة العمل تحدد مدى نجاح المشاريع.</p>
                                <a href="#">معرفة المزيد<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- single-schedule -->
                    <div class="single-schedule middle">
                        <div class="inner text-right">
                            <div class="icon">
                                <i class="fa fa-trophy"></i>
                            </div>
                            <div class="single-content">
                                <h4>التميز في الأداء</h4>
                                <p>كل منتج وخدمة نقدمها يعكس التفاني الذي نبذله لضمان التفوق، مما يساعدك على إنجاز
                                    مشاريعك بكفاءة ونجاح.</p>
                                <a href="#">معرفة المزيد<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- single-schedule -->
                    <div class="single-schedule last">
                        <div class="inner text-right">
                            <div class="icon">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <div class="single-content">
                                <h4>تقنيات حديثة</h4>
                                <p>نستخدم أحدث الأدوات والتقنيات لضمان تقديم خدمات ذات كفاءة عالية، تساعدك على البقاء في
                                    مقدمة السوق.</p>
                                <a href="#">معرفة المزيد<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/End Start schedule Area -->

<!-- Start Feautes -->
<section class="Feautes section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="section-title">
                    <h2>مميزات تجعلنا الاختيار الأمثل</h2>
                    <p>نحن نفهم تماماً أهمية الجودة والكفاءة في تلبية احتياجات عملائنا. لذلك، نحرص على تقديم حلول
                        متكاملة تتجاوز توقعاتك وتلبي جميع متطلباتك بدقة واحترافية. بفضل خبرتنا الواسعة وفريق العمل
                        المتميز، نضمن لك أعلى مستويات الخدمة والدعم في كل خطوة، مما يجعلنا الشريك المثالي لتحقيق أهدافك
                        بنجاح</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($features as $feature)
                <div class="col-lg-4 col-12">
                    <!-- Start Single features -->
                    <div class="single-features">
                        <div class="signle-icon">
                            <img src="{{asset('storage/' . $feature->image)}}"></div>
                        <h3>{{$feature->title}}</h3>
                        <p>{!! strip_tags($feature->description)!!}</p>
                    </div>
                    <!-- End Single features -->
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--/ End Feautes -->

<!-- Start Fun-facts -->
<div id="fun-facts" class="fun-facts section overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="fa fa-industry"></i>
                    <div class="content">
                        <span class="counter">3468</span>
                        <p>مشاريع تم تجهيزها</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="fa fa-cogs"></i>
                    <div class="content">
                        <span class="counter">3468</span>
                        <p>ماكينات تمت صناعتها</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-user-alt-3"></i>
                    <div class="content">
                        <span class="counter">557</span>
                        <p>عملائنا الحاليين</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Fun -->
                <div class="single-fun">
                    <i class="icofont icofont-table"></i>
                    <div class="content">
                        <span class="counter">32</span>
                        <p>سنوات الخبره</p>
                    </div>
                </div>
                <!-- End Single Fun -->
            </div>
        </div>
    </div>
</div>
<!--/ End Fun-facts -->

<!-- Start Why choose -->
<section class="why-choose section">
    <div dir="rtl" class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>تعرف على شركتنا</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <!-- Start Choose Left -->
                <div class="choose-left">
                    <h3>من نحن</h3>
                    <p>{!! Str::limit(strip_tags($aboutUs->description),500)!!} </p>
                </div>
                <!-- End Choose Left -->
            </div>
            <div class="col-lg-6 col-12">
                <!-- Start Choose Rights -->
                <div class="choose-right">
                    <div class="video-image">
                        <!-- Video Animation -->
                        <div class="promo-video">
                            <div class="waves-block">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div>
                        <!--/ End Video Animation -->
                        <a href="https://www.youtube.com/watch?v=RFVXy6CRVR4" class="video video-popup mfp-iframe"><i
                                class="fa fa-play"></i></a>
                    </div>
                </div>
                <!-- End Choose Rights -->
            </div>
        </div>
    </div>
</section>
<!--/ End Why choose -->

<!-- Start Call to action -->
<section class="call-action overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>Do you need Emergency Medical Care? Call @ 1234 56789</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor dictum turpis nec
                        gravida.</p>
                    <div class="button">
                        <a href="#" class="btn">Contact Now</a>
                        <a href="#" class="btn second">Learn More<i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Call to action -->

<!-- Start portfolio -->
<section class="portfolio section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Maintain Cleanliness Rules Inside Our Hospital</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel portfolio-slider">
                    <div class="single-pf">
                        <img src="img/pf1.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf2.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf3.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf4.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf1.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf2.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf3.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                    <div class="single-pf">
                        <img src="img/pf4.jpg" alt="#">
                        <a href="portfolio-details.html" class="btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End portfolio -->

<!-- Start service -->
<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Offer Different Services To Improve Your Health</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-prescription"></i>
                    <h4><a href="service-details.html">General Treatment</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-tooth"></i>
                    <h4><a href="service-details.html">Teeth Whitening</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-heart-alt"></i>
                    <h4><a href="service-details.html">Heart Surgery</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-listening"></i>
                    <h4><a href="service-details.html">Ear Treatment</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-eye-alt"></i>
                    <h4><a href="service-details.html">Vision Problems</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="icofont icofont-blood"></i>
                    <h4><a href="service-details.html">Blood Transfusion</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut
                        imperdiet. </p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!--/ End service -->

<!-- Pricing Table -->
<section class="pricing-table section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>أحدث منتجاتنا</h2>
                    <p>اكتشف أحدث الماكينات لدينا المصممة بأعلى معايير الجودة لتلبية جميع متطلباتك الصناعية</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Table -->
            @forelse($products as $product)
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="single-table">
                        <!-- Table Head -->
                        <div class="table-head">
                            <div>
                                <img class="product-image" src="{{asset('storage/' . $product->image)}}">
                            </div>
                            <h4 class="title">{{$product->name}}</h4>
                            <div class="price">
                                <p>{!! Str::limit(strip_tags($product->top_description_text, 50))!!}</p>
                            </div>
                        </div>
                        <div class="table-bottom">
                            <a class="btn" href="#">مشاهدة</a>
                        </div>
                        <!-- Table Bottom -->
                    </div>
                </div>
            @empty
            @endforelse
            <!-- End Single Table-->
        </div>
    </div>
</section>
<!--/ End Pricing Table -->


<!-- Start Blog Area -->
<section class="blog section" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Keep up with Our Most Recent Medical News.</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog1.jpg" alt="#">
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">22 Aug, 2020</div>
                            <h2><a href="blog-single.html">We have annnocuced our new product.</a></h2>
                            <p class="text">Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt sed do incididunt sed.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog2.jpg" alt="#">
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">15 Jul, 2020</div>
                            <h2><a href="blog-single.html">Top five way for solving teeth problems.</a></h2>
                            <p class="text">Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt sed do incididunt sed.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Single Blog -->
                <div class="single-news">
                    <div class="news-head">
                        <img src="img/blog3.jpg" alt="#">
                    </div>
                    <div class="news-body">
                        <div class="news-content">
                            <div class="date">05 Jan, 2020</div>
                            <h2><a href="blog-single.html">We provide highly business soliutions.</a></h2>
                            <p class="text">Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt sed do incididunt sed.</p>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->

<!-- Start clients -->
<div class="clients overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="owl-carousel clients-slider">
                    <div class="single-clients">
                        <img src="img/client1.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client2.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client3.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client4.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client5.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client1.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client2.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client3.png" alt="#">
                    </div>
                    <div class="single-clients">
                        <img src="img/client4.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Ens clients -->

<!-- Start Appointment -->
<section class="appointment">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>We Are Always Ready to Help You. Book An Appointment</h2>
                    <img src="img/section-img.png" alt="#">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form class="form" action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input name="phone" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                        class="current">Department</span>
                                    <ul class="list">
                                        <li data-value="1" class="option selected ">Department</li>
                                        <li data-value="2" class="option">Cardiac Clinic</li>
                                        <li data-value="3" class="option">Neurology</li>
                                        <li data-value="4" class="option">Dentistry</li>
                                        <li data-value="5" class="option">Gastroenterology</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <div class="nice-select form-control wide" tabindex="0"><span
                                        class="current">Doctor</span>
                                    <ul class="list">
                                        <li data-value="1" class="option selected ">Doctor</li>
                                        <li data-value="2" class="option">Dr. Akther Hossain</li>
                                        <li data-value="3" class="option">Dr. Dery Alex</li>
                                        <li data-value="4" class="option">Dr. Jovis Karon</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Date" id="datepicker">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea name="message" placeholder="Write Your Message Here....."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn">Book An Appointment</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8 col-12">
                            <p>( We will be confirm by an Text Message )</p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 ">
                <div class="appointment-image">
                    <img src="img/contact-img.png" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment -->

<!-- Start Newsletter Area -->
<section class="newsletter section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-text ">
                    <h6>Sign up for newsletter</h6>
                    <p class="">Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu,<br> homero alterum.</p>
                </div>
                <!-- End Newsletter Form -->
            </div>
            <div class="col-lg-6  col-12">
                <!-- Start Newsletter Form -->
                <div class="subscribe-form ">
                    <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                        <input name="EMAIL" placeholder="Your email address" class="common-input"
                               onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Your email address'" required="" type="email">
                        <button class="btn">Subscribe</button>
                    </form>
                </div>
                <!-- End Newsletter Form -->
            </div>
        </div>
    </div>
</section>
<!-- /End Newsletter Area -->


{{--<div class="main-banner">--}}
{{--    <div class="owl-carousel owl-banner">--}}
{{--        @forelse($sliders as $slider)--}}
{{--            <div class="item item-1">--}}
{{--                <img src="{{ asset('storage/' . $slider->images) }}" alt="Slider Image">--}}
{{--                <div class="header-text">--}}
{{--                    <span class="category">Toronto, <em>Canada</em></span>--}}
{{--                    <h2>Hurry!<br>Get the Best Villa for you</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @empty--}}
{{--        @endforelse--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="featured section">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4">--}}
{{--                <div class="left-image">--}}
{{--                    <img src="{{asset('front/assets/images/featured.jpg')}}" alt="">--}}
{{--                    <a href="property-details.html"><img src="assets/images/featured-icon.png" alt=""--}}
{{--                                                         style="max-width: 60px; padding: 0px;"></a>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="col-lg-7">--}}
{{--                <div class="info-table">--}}
{{--                    <ul>--}}
{{--                        @forelse($features as $feature)--}}
{{--                            <li>--}}
{{--                                <img src="{{asset('storage/' . $feature->image)}}" alt=""--}}
{{--                                     style="max-width: 52px;">--}}
{{--                                <h4>{{$feature->title}}<br><span>{!! $feature->description!!}</span></h4>--}}
{{--                            </li>--}}
{{--                        @empty--}}
{{--                        @endforelse--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="video section">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4 offset-lg-4">--}}
{{--                <div class="section-heading text-center">--}}
{{--                    <h2>تعرف على شركتنا</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="video-content">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-10 offset-lg-1">--}}
{{--                <div class="video-frame">--}}
{{--                    <img src="{{asset('front/assets/images/video-frame.jpg')}}" alt="">--}}
{{--                    <a href="https://www.youtube.com/watch?v=uFqBwi_E274" target="_blank"><i class="fa fa-play"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="fun-facts">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="wrapper">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="counter">--}}
{{--                                <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>--}}
{{--                                <p class="count-text ">Buildings<br>Finished Now</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="counter">--}}
{{--                                <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>--}}
{{--                                <p class="count-text ">Years<br>Experience</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="counter">--}}
{{--                                <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>--}}
{{--                                <p class="count-text ">Awwards<br>Won 2023</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="properties section">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4 offset-lg-4">--}}
{{--                <div class="section-heading text-center">--}}
{{--                    <h2>بعض من منتجاتنا</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @forelse($products as $product)--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="item">--}}
{{--                        <a href="property-details.html"><img src="{{asset('storage/' . $product->image)}}" alt=""></a>--}}
{{--                        <span class="category">{{$product->category->name}}</span>--}}
{{--                        <h4><a href="property-details.html">{{$product->name}}</a></h4>--}}
{{--                        <div class="product-description">--}}
{{--                            <p>{!! Str::limit(strip_tags($product->top_description_text, 50))!!}</p>--}}
{{--                        </div>--}}

{{--                        <div class="main-button mt-5">--}}
{{--                            <a href="property-details.html">مشاهدة التفاصيل</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--            @endforelse--}}
{{--        </div>--}}
{{--        <div class="d-flex justify-content-center">--}}
{{--            <div class="section-heading text-center">--}}
{{--                <div class="all-products-button mt-6">--}}
{{--                    <a href="property-details.html">عرض جميع المنتجات</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}


@include('front.layouts.footer')
