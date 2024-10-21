@section('title', 'تواصل معنا')
@include('front.layouts.header')

<!-- Start Contact Us -->
<section class="contact-us section">
    <div class="container">
        <div class="inner">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-us-left">
                        <!-- Start Google-map -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d8525.428910433775!2d31.45274089316434!3d31.073833737877028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e2!4m0!4m3!3m2!1d31.073468499999997!2d31.4554202!5e1!3m2!1sen!2seg!4v1729506108909!5m2!1sen!2seg"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- /End Google-map -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-form">
                        <h2>تواصل معنا</h2>
                        <p>إذا كان لديك أي أسئلة، لا تتردد في التواصل معنا.</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('contactus.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="name" style="direction: rtl;"
                                               placeholder="الاسم"
                                               required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" style="direction: rtl;"
                                               placeholder="البريد الإلكتروني" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="number" name="phone" style="direction: rtl;"
                                               placeholder="رقم الهاتف"
                                               required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="description" style="direction: rtl;"
                                                  placeholder="أكتب رسالتك هنا..."
                                                  required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">إرسال</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-info">
            <div class="row">
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont icofont-ui-call"></i>
                        <div class="content">
                            <p>رقم الهاتف</p>
                            <h3>{{$settings->phone_number}}</h3>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont-google-map"></i>
                        <div class="content">
                            <p>العنوان</p>
                            <p>{{$settings->address}}</p>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
                <!-- single-info -->
                <div class="col-lg-4 col-12 ">
                    <div class="single-info">
                        <i class="icofont icofont-email"></i>
                        <div class="content">
                            <p>البريد الإلكتروني</p>
                            <h3>{{$settings->email}}</h3>
                        </div>
                    </div>
                </div>
                <!--/End single-info -->
            </div>
        </div>
    </div>
</section>
<!--/ End Contact Us -->
<!-- End Portfolio Details Area -->
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDGqTyqoPIvYxhn_Sa7ZrK5bENUWhpCo0w"></script>
<script>
    function initMap() {
        // Specify the latitude and longitude for the desired location
        var location = {lat: 30.0444, lng: 31.2357}; // Example: Cairo, Egypt

        // Create the map centered at the specified location
        var map = new google.maps.Map(document.getElementById('myMap'), {
            zoom: 10, // Adjust the zoom level as needed
            center: location
        });

        // Add a marker at the specified location
        var marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }
</script>

@include('front.layouts.footer')
