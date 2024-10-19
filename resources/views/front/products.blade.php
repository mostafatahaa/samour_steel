@section('title', 'المنتجات')
@include('front.layouts.header')



<!-- Pricing Table -->
<section class="pricing-table section">
    <div class="container">
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
        {{ $products->links() }}
    </div>
</section>
<!--/ End Pricing Table -->


@include('front.layouts.footer')
