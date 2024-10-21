@section('title', 'معرض الصور')
@include('front.layouts.header')

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<section class="pricing-table section">
    <div class="container">
        <div class="row">
            @forelse($gallery as $image)
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="single-table">
                        <div class="table-head">
                            <a href="{{ asset('storage/' . $image->image) }}" data-fancybox="gallery">
                                <img class="product-image gallery-image"
                                     src="{{ asset('storage/' . $image->image) }}" alt="Image" loading="lazy">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        {{ $gallery->links() }}
    </div>
</section>

<style>
    .gallery-image {
        width: 100%;
        transition: transform 0.3s ease;
    }

    .gallery-image:hover {
        transform: scale(1.05);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind("[data-fancybox='gallery']", {
            infinite: true,
            preload: 2,
            buttons: ["zoom", "slideShow", "fullScreen", "download", "close"],
        });
    });
</script>

@include('front.layouts.footer')
