@include('front.layouts.header')


<div class="main-banner">
    <div class="owl-carousel owl-banner">
        @forelse($sliders as $slider)
            <div class="item item-1">
                <img src="{{ asset('storage/' . $slider->images) }}" alt="Slider Image">
                <div class="header-text">
                    <span class="category">Toronto, <em>Canada</em></span>
                    <h2>Hurry!<br>Get the Best Villa for you</h2>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</div>


<div class="featured section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-image">
                    <img src="{{asset('front/assets/images/featured.jpg')}}" alt="">
                    <a href="property-details.html"><img src="assets/images/featured-icon.png" alt=""
                                                         style="max-width: 60px; padding: 0px;"></a>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="info-table">
                    <ul>
                        @forelse($features as $feature)
                            <li>
                                <img src="{{asset('storage/' . $feature->image)}}" alt=""
                                     style="max-width: 52px;">
                                <h4>{{$feature->title}}<br><span>{!! $feature->description!!}</span></h4>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <h6>| Video View</h6>
                    <h2>Get Closer View & Different Feeling</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="video-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="video-frame">
                    <img src="assets/images/video-frame.jpg" alt="">
                    <a href="https://youtube.com" target="_blank"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fun-facts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="34" data-speed="1000"></h2>
                                <p class="count-text ">Buildings<br>Finished Now</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                                <p class="count-text ">Years<br>Experience</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="counter">
                                <h2 class="timer count-title count-number" data-to="24" data-speed="1000"></h2>
                                <p class="count-text ">Awwards<br>Won 2023</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section best-deal">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>| Best Deal</h6>
                    <h2>Find Your Best Deal Right Now!</h2>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tabs-content">
                    <div class="row">
                        <div class="nav-wrapper ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab"
                                            data-bs-target="#appartment" type="button" role="tab"
                                            aria-controls="appartment" aria-selected="true">Appartment
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab"
                                            data-bs-target="#villa"
                                            type="button" role="tab" aria-controls="villa" aria-selected="false">
                                        Villa
                                        House
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="penthouse-tab" data-bs-toggle="tab"
                                            data-bs-target="#penthouse" type="button" role="tab"
                                            aria-controls="penthouse" aria-selected="false">Penthouse
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="appartment" role="tabpanel"
                                 aria-labelledby="appartment-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Total Flat Space <span>185 m2</span></li>
                                                <li>Floor number <span>26th</span></li>
                                                <li>Number of rooms <span>4</span></li>
                                                <li>Parking Available <span>Yes</span></li>
                                                <li>Payment Process <span>Bank</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-01.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Extra Info About Property</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod
                                            tempor
                                            pack incididunt ut labore et dolore magna aliqua quised ipsum
                                            suspendisse.
                                            <br><br>When you need free CSS templates, you can simply type TemplateMo
                                            in
                                            any search engine website. In addition, you can type TemplateMo
                                            Portfolio,
                                            TemplateMo One Page Layouts, etc.</p>
                                        <div class="icon-button">
                                            <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule
                                                a
                                                visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Total Flat Space <span>250 m2</span></li>
                                                <li>Floor number <span>26th</span></li>
                                                <li>Number of rooms <span>5</span></li>
                                                <li>Parking Available <span>Yes</span></li>
                                                <li>Payment Process <span>Bank</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-02.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Detail Info About Villa</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod
                                            tempor
                                            pack incididunt ut labore et dolore magna aliqua quised ipsum
                                            suspendisse.
                                            <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug,
                                            succulents
                                            typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after
                                            messenger
                                            poutine next level humblebrag swag franzen.</p>
                                        <div class="icon-button">
                                            <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule
                                                a
                                                visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="penthouse" role="tabpanel"
                                 aria-labelledby="penthouse-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="info-table">
                                            <ul>
                                                <li>Total Flat Space <span>320 m2</span></li>
                                                <li>Floor number <span>34th</span></li>
                                                <li>Number of rooms <span>6</span></li>
                                                <li>Parking Available <span>Yes</span></li>
                                                <li>Payment Process <span>Bank</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="assets/images/deal-03.jpg" alt="">
                                    </div>
                                    <div class="col-lg-3">
                                        <h4>Extra Info About Penthouse</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod
                                            tempor
                                            pack incididunt ut labore et dolore magna aliqua quised ipsum
                                            suspendisse.
                                            <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug,
                                            succulents
                                            typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after
                                            messenger
                                            poutine next level humblebrag swag franzen.</p>
                                        <div class="icon-button">
                                            <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule
                                                a
                                                visit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="properties section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="section-heading text-center">
                    <h6>| Properties</h6>
                    <h2>We Provide The Best Property You Like</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="assets/images/property-01.jpg" alt=""></a>
                    <span class="category">Luxury Villa</span>
                    <h6>$2.264.000</h6>
                    <h4><a href="property-details.html">18 New Street Miami, OR 97219</a></h4>
                    <ul>
                        <li>Bedrooms: <span>8</span></li>
                        <li>Bathrooms: <span>8</span></li>
                        <li>Area: <span>545m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>6 spots</span></li>
                    </ul>
                    <div class="main-button">
                        <a href="property-details.html">Schedule a visit</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="assets/images/property-02.jpg" alt=""></a>
                    <span class="category">Luxury Villa</span>
                    <h6>$1.180.000</h6>
                    <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a></h4>
                    <ul>
                        <li>Bedrooms: <span>6</span></li>
                        <li>Bathrooms: <span>5</span></li>
                        <li>Area: <span>450m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>8 spots</span></li>
                    </ul>
                    <div class="main-button">
                        <a href="property-details.html">Schedule a visit</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="assets/images/property-03.jpg" alt=""></a>
                    <span class="category">Luxury Villa</span>
                    <h6>$1.460.000</h6>
                    <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a></h4>
                    <ul>
                        <li>Bedrooms: <span>5</span></li>
                        <li>Bathrooms: <span>4</span></li>
                        <li>Area: <span>225m2</span></li>
                        <li>Floor: <span>3</span></li>
                        <li>Parking: <span>10 spots</span></li>
                    </ul>
                    <div class="main-button">
                        <a href="property-details.html">Schedule a visit</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="assets/images/property-04.jpg" alt=""></a>
                    <span class="category">Apartment</span>
                    <h6>$584.500</h6>
                    <h4><a href="property-details.html">12 New Street Miami, OR 12650</a></h4>
                    <ul>
                        <li>Bedrooms: <span>4</span></li>
                        <li>Bathrooms: <span>3</span></li>
                        <li>Area: <span>125m2</span></li>
                        <li>Floor: <span>25th</span></li>
                        <li>Parking: <span>2 cars</span></li>
                    </ul>
                    <div class="main-button">
                        <a href="property-details.html">Schedule a visit</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="assets/images/property-05.jpg" alt=""></a>
                    <span class="category">Penthouse</span>
                    <h6>$925.600</h6>
                    <h4><a href="property-details.html">34 Beach Street Miami, OR 42680</a></h4>
                    <ul>
                        <li>Bedrooms: <span>4</span></li>
                        <li>Bathrooms: <span>4</span></li>
                        <li>Area: <span>180m2</span></li>
                        <li>Floor: <span>38th</span></li>
                        <li>Parking: <span>2 cars</span></li>
                    </ul>
                    <div class="main-button">
                        <a href="property-details.html">Schedule a visit</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="item">
                    <a href="property-details.html"><img src="assets/images/property-06.jpg" alt=""></a>
                    <span class="category">Modern Condo</span>
                    <h6>$450.000</h6>
                    <h4><a href="property-details.html">22 New Street Portland, OR 16540</a></h4>
                    <ul>
                        <li>Bedrooms: <span>3</span></li>
                        <li>Bathrooms: <span>2</span></li>
                        <li>Area: <span>165m2</span></li>
                        <li>Floor: <span>26th</span></li>
                        <li>Parking: <span>3 cars</span></li>
                    </ul>
                    <div class="main-button">
                        <a href="property-details.html">Schedule a visit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('front.layouts.footer')
