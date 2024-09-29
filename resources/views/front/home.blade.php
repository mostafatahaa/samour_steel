@extends('front.index')

@section('title', __('front.home'))

@section('section')
    <main class="home-container">
        <div class="swiper-container" id="swiper-banner">
            <ul class="swiper-wrapper">
                @forelse ($slider as $image)
                    <li class="swiper-slide">
                        <a href="{{ $image->image_link }}" title="banner">
                            <img src="{{ asset('storage/' . $image->images) }}" width="1920" height="700" alt="banner" />
                        </a>
                    </li>
                @empty
                @endforelse

            </ul>
            <div class="swiper-button-prev"><i class="iconfont icon-angle-right" aria-hidden="true"></i></div>
            <div class="swiper-button-next"><i class="iconfont icon-angle-left" aria-hidden="true"></i></div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="welcome-info">
            <div class="part-title wow fadeInDown">
                <h3><em> {{ __('front.welcome_to') }}</em></h3>
                <p>{{ $settings->campany_name }}</p> <!-- You may also translate company name if it's dynamic -->
            </div>

            <div class="part-item swiper-container" id="swiper-part">
                <div class="swiper-wrapper">
                    @forelse ($news as $new)
                        <div style="margin-left: 10px" class="swiper-slide"><a class="part-list-item" href="">
                                <object>
                                    <div style="font-size: 14px;" class="item-img"><a href=""
                                            rel="nofollow">{{ __('front.more_info') }}</a><img
                                            src="{{ asset('storage/' . $new->image) }}" class="swiper-lazy" alt="">

                                    </div>
                                    <p class="item-title">{{ Str::limit($new->title, 50) }}</p>
                                    <p class="item-content">
                                        {{ Str::limit(strip_tags(translateWithHTMLTags($new->description)), 50) }}</p>
                                    </p>
                                </object>
                            </a>
                        </div>
                    @empty
                    @endforelse

                </div>
                <div class="swiper-part-pagination"></div>
            </div>

        </div>
        <div class="about-info">
            <div class="about-img wow fadeInLeft"><img src="{{ asset('storage/' . $settings->home_banner) }}"
                    alt="{{ $settings->campany_name }}" /></div>
            <div class="about-content wow fadeInRight">
                <h3 class="content-title">{{ __('front.about_our_company') }}</h3>
                <article>
                    @isset($aboutUs->description)
                        <p>{!! Str::limit(translateWithHTMLTags($aboutUs->description), 400) !!}</p>
                    @endisset
                </article>
                <div class="about-btn"><a href="{{ route('about_us') }}"
                        title="{{ __('front.more_information') }}">{{ __('front.more_information') }}</a></div>
            </div>
        </div>
        <div class="hot-product">
            <div class="part-title wow fadeInDown">
                <h3>{{ __('front.some') }} <em>{{ __('front.products') }}</em></h3>
            </div>
            <ul class="list-style">
                @forelse ($products as $product)
                    <li class="wow fadeInUp">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <object>
                                <div class="pro-img"><a href="{{ route('products.show', $product->slug) }}"><img
                                            src="{{ asset('storage/' . $product->image) }}" class="lazy"
                                            alt="{{ $product->name }}" /></a></div>
                                <p class="pro-name"><a
                                        href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a></p>
                                <div class="pro-btn"><a style="font-size: 13px;"
                                        href="{{ route('products.show', $product->slug) }}">{{ __('front.more_information') }}</a>
                                </div>
                            </object>
                        </a>
                    </li>

                @empty
                @endforelse
            </ul>
        </div>
        <div class="lastest-news">
            <ul class="wow list-style">
                @forelse ($knoledges as $knoledge)
                    <li>
                        <a href="{{ route('knowledge.show', $knoledge->slug) }}">
                            <object>
                                <div class="news-img wow fadeInDown"><img
                                        src="{{ asset('storage/' . $knoledge->image) }}" />
                                </div>
                                <div class="news-content">
                                    <p class="news-title wow fadeInUp">{{ $knoledge->title }}</p>
                                    <p class="news-date wow fadeInUp">{{ $knoledge->created_at->format('M d, Y') }}</p>
                                    <article class="wow fadeInUp">{!! translateWithHTMLTags($knoledge->description) !!}</article>
                                    <p class="more-link wow fadeInUp"><a
                                            href="{{ route('knowledge.show', $knoledge->slug) }}">{{ __('front.show_more') }}<i
                                                class="iconfont icon-angle-right" aria-hidden="true"></i></a></p>
                                </div>
                            </object>
                        </a>
                    </li>

                @empty
                @endforelse

            </ul>
        </div>
    </main>
@endsection
