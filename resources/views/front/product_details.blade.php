@section('title', $product->name)
@include('front.layouts.header')

<!-- Start Portfolio Details Area -->
<section class="pf-details section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-content">
                    <div class="image-slider">
                        <div class="pf-details-slider">
                            <!-- Display the main product image -->
                            @if($product->image)
                                <img class="gallery-image"
                                     style="height: 700px; width: 100%; object-fit: cover;"
                                     src="{{ asset('storage/' . $product->image) }}" alt="Main Image">
                            @endif

                            <!-- Display the other product images -->
                            @forelse($product->images as $image)
                                <img class="gallery-image"
                                     style="height: 700px; width: 100%; object-fit: cover;"
                                     src="{{ asset('storage/' . $image->image) }}" alt="Additional Image">
                            @empty
                                <p>No additional images available.</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="body-text text-right">
                        <h3>{{$product->name}}</h3>
                        <p>{!! $product->description  !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Portfolio Details Area -->

@include('front.layouts.footer')
