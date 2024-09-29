@extends('front.index')

@section('title', $product->name)


@section('section')
    <main class="common-container detail-container">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" /></div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<a
                href="{{ route('products.index') }}">{{ __('front.products') }}</a> / <a
                href="#">{{ $product->name }}</a></div>
        <div class="pro-detail-content">
            <div class="pro-review">
                <div class="pro-preview-left pro-container">
                    <div class="preview-container">
                        <div class="small-box">
                            <img src="{{ asset('storage/' . $product->image) }}" />
                            <span class="hover"></span>

                        </div>

                        <div class="thumbnail-box"><a href="javascript:;" class="btn btn-prev btn_prev_disabled"
                                title="prev"></a><a href="javascript:;" class="btn btn-next" title="next"></a>
                            <div class="list swiper-container" id="gallery">
                                <ul class="wrapper swiper-wrapper">
                                    @forelse ($product->images as $images)
                                        @if ($images->image !== null)
                                            <li class="swiper-slide item"><img
                                                    src="{{ asset('storage/' . $images->image) }}" alt="car film" />
                                            </li>
                                        @endif

                                    @empty
                                    @endforelse

                                </ul>
                                <div class="banner-page"><span class="page-now">1</span><span class="of">/</span><span
                                        class="page-all">3</span></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <div class="big-box"><img src="../uploads/34088/paint-protective-film-ppf86a96.jpg" /></div>
                    </div>
                </div>

                <div class="pro-preview-right">
                    <h1 class="pro-name prodetails-name">{{ $product->name }}</h1>

                    <article>{!! Str::limit(translateWithHTMLTags($product->top_description_text), 200) !!}</article>

                    <div class="share-btn-list">
                    </div>
                    <div class="btn-list">
                        <a href="{{ route('contactus') }}">
                            <div class="btn send hvr-shutter-out-vertical"><span>{{ __('front.for_inquiries') }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="pro-detail-title"><span>{{ __('front.description') }}</div>
            <div class="pro-intro">
                <article><input type="hidden" id="productID" name="productID" value="159192530" />
                    {!! translateWithHTMLTags($product->top_description_text) !!}
                </article>
            </div>

            <article style="text-align: center;"><input type="hidden" id="productID" name="productID" value="202078885" />
                <div class="kche-wrap-width">
                    <div class="kche-t171">
                        <div class="kche-t171-content">
                            <div style="margin-top:50px;" class="kche-t171-list">
                                @forelse ($product->descriptions as $item)
                                    <div class="kche-t171-item">
                                        @if ($item->image !== null)
                                            <div class="kche-t171-item-img">
                                                <img width="567" height="567" alt="HD30" loading="lazy"
                                                    title="HD30" src="{{ asset('storage/' . $item->image) }}"
                                                    class="custom-image">
                                            </div>
                                        @endif

                                        <div class="kche-t171-item-info">
                                            <p class="kche-t171-item-tit"><span style="color:#32d9c3"><span
                                                        style="font-size:24px"><strong>{{ $item->title }}</strong><strong>
                                                        </strong></span></span></p>

                                            <div class="kche-t171-item-des">
                                                {!! translateWithHTMLTags($item->description) !!}
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </article>


            <div class="pro-page-switch">
                <div class="page-prev">
                    @if ($previousProduct)
                        <div class="page-btn">
                            <a href="{{ route('products.show', $previousProduct->slug) }}">
                                <i class="iconfont icon-arrowleft" aria-hidden="true"></i> {{ __('front.previous') }}
                            </a>
                        </div>
                    @else
                        <div class="page-btn disabled"><i class="iconfont icon-arrowleft" aria-hidden="true"></i>
                            {{ __('front.previous') }}
                        </div>
                    @endif
                </div>
                <div class="page-next">
                    @if ($nextProduct)
                        <div class="page-btn">
                            <a href="{{ route('products.show', $nextProduct->slug) }}">
                                {{ __('front.next') }} <i class="iconfont icon-arrowright" aria-hidden="true"></i>
                            </a>
                        </div>
                    @else
                        <div class="page-btn disabled">{{ __('front.next') }} <i class="iconfont icon-arrowright"
                                aria-hidden="true"></i>
                        </div>
                    @endif
                </div>
            </div>


            <div class="random-pro-list">
                <div class="random-title">{{ __('front.you_may_like') }}</div>
                <ul style="justify-content: space-around">
                    @forelse ($products as $product)
                        <li style="padding: 15px" class="list-style">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <object>
                                    <div class="pro-img"><img src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}" />
                                    </div>
                                    <div class="pro-name">{{ $product->name }}</div>
                                </object>
                            </a>
                        </li>
                    @empty
                    @endforelse

                </ul>
            </div>
        </div>
    </main>
@endsection
