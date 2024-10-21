@section('title', 'من نحن')
@include('front.layouts.header')

@forelse($aboutUsData as $data)
    <!-- Start Portfolio Details Area -->
    <section class="pf-details section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-content">
                        <div class="image-slider">
                            <div class="pf-details-slider">
                                <!-- Display the other product images -->
                                @forelse($data->images as $image)
                                    <img class="gallery-image"
                                         style="height: 700px; width: 100%; object-fit: cover;"
                                         src="{{ asset('storage/' . $image->image) }}" alt="Additional Image">
                                @empty
                                    <p>No additional images available.</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="body-text text-right">
                            <h3>{{$data->title}}</h3>
                            <p>{!! $data->description  !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Area -->
@empty
@endforelse
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
            <a href="{{asset('storage/' . $settings->youtube)}}" class="video video-popup mfp-iframe"><i
                    class="fa fa-play"></i></a>
        </div>
    </div>
    <script></script>
    <!-- End Choose Rights -->
</div>
@include('front.layouts.footer')
