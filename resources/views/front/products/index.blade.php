@extends('front.index')

@section('title', __('front.products'))


@section('section')
    <main class="common-container mobcate-main">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav">
            </h1>
            <div class="pro-filter"><a href="products.html">{{ __('front.products') }}</a><i class="iconfont icon-caret-down"
                    aria-hidden="true"></i></div>
        </div>

        <div class="products-content">
            <div class="filter-box">
                <div class="pro-type-list">
                    <ul class="list-style">
                        @forelse ($categories as $category)
                            <li class="menu-item LiLevel1" id="LeftNavCat3"><a
                                    href="{{ route('products.category', $category->slug) }}"
                                    id="15171677">{{ $category->name }}</a></li>
                        @empty
                        @endforelse

                    </ul>
                </div>
                <div class="scrollTip"><i class="iconfont icon-angle-down"></i></div>
            </div>

            <ul class="pro-list">
                @forelse ($products as $product)
                    <li class="pro-id-{{ $product->id }} list-2 list-style">
                        <div class="pro-img"><a href="{{ route('products.show', $product->slug) }}"><img
                                    src="{{ asset('front/images/imgs/loading.gif') }}"
                                    data-src="{{ asset('storage/' . $product->image) }}" class="lazy"
                                    alt="{{ $product->name }}" /></a></div>
                        <div class="pro-info">
                            <p class="pro-name"><a
                                    href="window-film/automotive-window-film-solar-film.html">{{ $product->name }}</a></p>
                            <p class="product-price"></p>
                            <article><a
                                    href="window-film/automotive-window-film-solar-film.html">{!! Str::limit(translateWithHTMLTags($product->top_description_text), 150) !!}</a>
                            </article>
                            <span></span>
                            <a class="pro-more" href="window-film/automotive-window-film-solar-film.html"></a>
                            <div class="compare-action pro-id-{{ $product->id }}" onclick="addCache(this)">
                                <input class="compare-action-check" type="checkbox">
                                <label class="checkLabel"></label>
                                <span>{{ __('front.add_to_inquiry') }}</span>
                            </div>
                        </div>
                    </li>
                @empty
                @endforelse

            </ul class="list-style">
            <div class="common-pages"><span> {{ $products->links() }}</span>
            </div>
        </div>



    </main>


    <div class="compare-panel">
        <div class="button-area">
            <div><a href="{{ route('inquiry') }}"><button
                        class="contact-button">{{ __('front.contact_supplier') }}</button></a></div>
            <p class="comparenum">(<span class="compare-checked">0</span>/10)</p>
            <div class="clear-all"><img src="https://img01.v15cdn.com/clearall.webp" width="24" height="24"
                    alt="clearall" />
            </div>
            <div class="close"><i class="ic-close"></i></div>
        </div>
        <div class="list-wrapper">
            <div class="cart-list">
                <div id="productChache_listPC"></div>
            </div>
        </div>
    </div>
    <div class="sm-mask"></div>
    <script src="{{ asset('front/js/inquiryList.js') }}"></script>
    <script src="{{ asset('front/js/addInquiry.js') }}"></script>

    <script>
        function addCache(c) {
            var a = [],
                e = {
                    id: null,
                    url: '',
                    image: '',
                    name: '',
                    price: '',
                },
                t = $(c).attr('class').split(' ')[1],
                o = $(c).parents('.'.concat(t))[0];
            $(o).addClass('pro-checked'),
                (e.id = parseInt(t.split('-')[2])), // Extracting product ID
                (e.url = $(o).find('a').attr('href')),
                (e.image = $(o).find('img').attr('src')),
                (e.name = $(o).find('.pro-name a').text()),
                (e.price = $(o).find('.product-price span').text());

            t = localStorage.getItem('productCachePC');
            if (null !== t) a = JSON.parse(t);
            if (a.length >= 10) {
                toastr.warning('The number of products is limited to ten or less.');
                return;
            }
            if (!a.some(function(c) {
                    return c.id == e.id;
                })) {
                a.unshift(e);
                localStorage.setItem('productCachePC', JSON.stringify(a));
            }
            $(c).html(
                '<input class="compare-action-check" type="checkbox" checked> <label class="checkLabel"></label> <span>{{ __('front.added_to_inquiry') }}</span>'
            );
            $(c).attr('onclick', 'removeCache(this)');
            getProductList();
        }
    </script>
@endsection
