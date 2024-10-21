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

@include('front.layouts.footer')
