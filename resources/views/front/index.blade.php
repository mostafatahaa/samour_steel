<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<?php $settings = App\Models\Settings::first(); ?>
<?php $categories = App\Models\Category::get(); ?>
<title>@yield('title')</title>

<head>
    <meta charset="utf-8" />
    <meta property="og:title" content="@yield('title', $settings->company_name)">
    <meta property="og:description" content="{{ $settings->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/' . $settings->logo) }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">

    <link rel="icon" sizes="32x32" href="{{ asset('storage/' . $settings->logo) }}" type="image/x-icon">



    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $settings->company_name)">
    <meta name="twitter:description" content="{{ $settings->meta_description }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $settings->twitter_image) }}">

    <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <!-- Keywords meta tag -->
    @php
        $keywords = is_array($settings->meta_keywords)
            ? $settings->meta_keywords
            : json_decode($settings->meta_keywords ?? '[]', true);
    @endphp
    @if (!empty($keywords))
        <meta name="keywords" content="{{ implode(', ', $keywords) }}">
    @endif



    <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&amp;display=swap" rel="stylesheet" />
    <link href="{{ asset('front/css/swiper-animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/arstyle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/message.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/templates.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/css/page.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('front/js/jquery-3.6.0.js') }}"></script>
    <link href="{{ asset('front/css/payment.css') }}" rel="stylesheet" type="text/css" id="wmkcproducts" />

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TMJL7S4');
    </script>
    <script type="application/ld+json">
</script>
    <!--<script async src="js/script.js" data-website-id="77f7f94e-0c37-473a-a4d4-e47a00c85dd1"></script>-->
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            '../connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1079374510022692');
        fbq('track', 'PageView');
        fbq('track', 'Lead');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1079374510022692&amp;ev=PageView&amp;noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<div id="wmkc">
    <ul class="wmkc-list">
        <li class="wmkc-whatsapp"><a href="https://web.whatsapp.com/send?l=en&amp;phone={{ $settings->whatsapp }}"
                target="_blank" title="WhatsApp:{{ $settings->whatsapp }}" id="F8"><i class="wmkc-icon"><img
                        src="{{ asset('front/images/whatsapp.png') }}" alt=""></i>
                <p>WhatsApp</p>
            </a></li>
        <li class="wmkc-email"><a href="mailto:{{ $settings->email }}" target="_blank"
                title="mailto:{{ $settings->email }}" id="F9"><i class="wmkc-icon"><img
                        src="{{ asset('front/images/email.png') }}" alt=""></i>
                <p>E-Mail</p>
            </a></li>
    </ul>
</div>

<body class="index" dir="{{ session('direction', 'rtl') }}">
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TMJL7S4" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <header>
        <div class="header-top">
            <div class="top-info">
                <div class="info-tel"><i class="iconfont icon-phone"
                        aria-hidden="true"></i>{{ $settings->phone_number }}</div>
                <div class="info-email"><i class="iconfont icon-email" aria-hidden="true"></i><a
                        href="mailto:{{ $settings->email }}" id="T9">{{ $settings->email }}</a></div>
            </div>
            <div class="top-right">
                <div class="search-input" style="border-radius: 7px;">
                    <i class="iconfont icon-search" aria-hidden="true"></i>
                    <form action="{{ route('product.search') }}" method="GET">
                        <input type="text" name="query" id="txtSearch" placeholder="{{ __('front.search') }}"
                            value="">
                        <button type="submit" class="search-btn">{{ __('front.search') }}</button>
                    </form>
                </div>

                <div class="lang">
                    <!-- Language Icon showing current language -->
                    <div title="language" class="lang-icon" data-lang="{{ session('locale', 'ar') }}">
                        @if (session('locale', 'ar') == 'ar')
                            <img src="https://img01.v15cdn.com/language/ar.webp" width="24" height="16"
                                loading="lazy" alt="ar" />
                            <span>عربي</span>
                        @else
                            <img src="https://img01.v15cdn.com/language/en.webp" width="24" height="16"
                                loading="lazy" alt="English" />
                            <span>English</span>
                        @endif
                    </div>
                    <div class="lang-drop">
                        <span class="lang-arrow"></span>
                        <ul class="lang-wrap list-style">
                            @if (session('locale', 'ar') == 'ar')
                                <li>
                                    <a href="/set-language/en" data-lang="en">
                                        <img src="https://img01.v15cdn.com/language/en.webp" width="24"
                                            height="16" loading="lazy" alt="English" /> English
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="/set-language/ar" data-lang="ar">
                                        <img src="https://img01.v15cdn.com/language/ar.webp" width="24"
                                            height="16" loading="lazy" alt="ar" /> عربي
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- language list -->

                <div class="lage lage-ثى"></div>
            </div>
        </div>
        <nav>
            <div class="nav-btn"><span></span><span></span><span></span></div>
            <div class="header-logo"> <a href="{{ route('home') }}"><img
                        src="{{ asset('storage/' . $settings->logo) }}" /></a></div>
            <div class="mobile-search-btn"><i class="iconfont icon-search" aria-hidden="true"></i></div>
            <ul>
                <li id="liHome"> <a href="{{ route('home') }}"
                        class="{{ Request::is('/') ? 'inmenu_1' : '' }}">{{ __('front.homePage') }}</a></li>
                <li id="liproducts" onmouseover="displaySubMenu(this)" onmouseout="hideSubMenu(this)"><a
                        href="{{ route('products.index') }}"
                        class="{{ Request::is('products') ? 'inmenu_1' : '' }}">{{ __('front.products') }}</a>
                    <ul class="submenu nav0">
                        @forelse ($categories as $category)
                            <li class="side_nav1"><a
                                    href="{{ route('products.category', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </li>
                <li id="liabout-us"> <a href="{{ route('about_us') }}"
                        class="{{ Request::is('about-us') ? 'inmenu_1' : '' }}">{{ __('front.infoAboutUs') }}</a>
                </li>
                <li id="liwhy-choose-us"> <a href="{{ route('why_choose_us') }}"
                        class="{{ Request::is('why-choose-us') ? 'inmenu_1' : '' }}">{{ __('front.whyChooseUs') }}</a>
                </li>
                <li id="linewslist-1"><a href="{{ route('news.index') }}"
                        class="{{ Request::is('news') ? 'inmenu_1' : '' }}">{{ __('front.news') }}</a></li>
                <li id="liInfo"><a href="{{ route('knowledge.index') }}"
                        class="{{ Request::is('knowledge') ? 'inmenu_1' : '' }}">{{ __('front.knowledge') }}</a></li>
                <li id="licontact-us"> <a href="{{ route('contactus') }}"
                        class="{{ Request::is('contact-us') ? 'inmenu_1' : '' }}">{{ __('front.contactUs') }}</a>
                </li>

            </ul>
        </nav>
    </header>

    @yield('section')

    <footer>

        <div class="top-btn"><i class="iconfont icon-angle-up" aria-hidden="true"></i></div>
        <div class="footer-top wow fadeInLeft">
            <div class="contact-left">
                <div class="contact-logo"><img src="https://css02.v15cdn.com/m401/contact.webp" width="81"
                        height="111" alt="contact" /></div>
                <!-- foottop -->
                <div class="contact-content">
                    <p>{{ __('front.haveAnyQuestions') }}</p>
                    <p>{{ __('front.contactUsDescription') }}</p>
                </div>
            </div>
            <div class="contact-btn"><a href="{{ route('contactus') }}">{{ __('front.contactUs') }}</a></div>
        </div>
        <div class="footer-container">
            <ul class="wow fadeInRight">
                <li class="map">
                    <div class="logo"></div>
                    <span></span>
                    <div class="content">
                        <p class="content-title">{{ __('front.address') }}</p>
                        <p class="content-text">{{ $settings->address }}
                        </p>
                    </div>
                </li>
                <li class="email">
                    <div class="logo"></div>
                    <span></span>
                    <div class="content">
                        <p class="content-title">{{ __('front.email') }}</p>
                        <p class="content-text"><a href="mailto:{{ $settings->email }}"
                                id="A_3">{{ $settings->email }}</a></p>
                    </div>
                </li>
                <li class="tel">
                    <div class="logo"></div>
                    <span></span>
                    <div class="content">
                        <p class="content-title">{{ __('front.contactUs') }}</p>
                        <p class="content-text">{{ $settings->phone_number }}</p>
                    </div>
                </li>
            </ul>
            <ul class="bottom-info">
                <li class="intro">
                    <!-- footintro -->
                    <p class="title">{{ __('front.infoAboutUs') }}</p>
                    @isset($aboutUs->description)
                        <a class="intro-text footer-text">{!! Str::limit(translateWithHTMLTags($aboutUs->description), 200) !!}</a>
                    @endisset
                    <div class="contact-list">

                        <ul>
                            <li><a href="https://www.facebook.com/Isffilm-103689239128582" class="social-item fb"
                                    rel="nofollow" target="_blank" title="facebook"><i
                                        class="iconfont icon-facebook"></i></a></li>
                            <li><a href="https://twitter.com/isffilm1" class="social-item tw" rel="nofollow"
                                    target="_blank" title="twitter"><i class="iconfont icon-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/87079363/admin/" class="social-item lk"
                                    rel="nofollow" target="_blank" title="linkedin"><i
                                        class="iconfont icon-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/isffilm/" class="social-item ins" rel="nofollow"
                                    target="_blank" title="instagram"><i class="iconfont icon-instagram"></i></a>
                            </li>
                            <li><a href="https://www.youtube.com/channel/UCe0QQfyj_4_-ZDhi5Brc81Q"
                                    class="social-item you" rel="nofollow" target="_blank" title="youtube"><i
                                        class="iconfont icon-youtube"></i></a></li>
                            <li><a href="https://www.tiktok.com/@ppf_isffilm" class="social-item tik" rel="nofollow"
                                    target="_blank" title="tiktok"><i class="iconfont icon-tiktok"></i></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav list-style">
                    <p class="title">{{ __('front.pages') }}</p>
                    <ul class="wow fadeInUp list-style">
                        <li id="li_Menu101_MainHome"> <a href="{{ route('home') }}">{{ __('front.homePage') }}</a>
                        </li>
                        <li id="li_Menu101_products"> <a href="{{ route('products.index') }}"
                                class="inmenu">{{ __('front.products') }}</a></li>
                        <li id="li_Menu101_about-us"> <a href="{{ route('about_us') }}"
                                class="inmenu">{{ __('front.infoAboutUs') }}</a></li>
                        <li id="li_Menu101_why-choose-us"> <a href="{{ route('why_choose_us') }}"
                                class="inmenu">{{ __('front.whyChooseUs') }}</a></li>
                        <li id="li_Menu101_newslist-1"> <a href="{{ route('news.index') }}"
                                class="inmenu">{{ __('front.news') }}</a>
                        </li>
                        <li id="li_Menu101_Info"> <a href="{{ route('knowledge.index') }}"
                                class="inmenu">{{ __('front.knowledge') }}</a>
                        </li>
                        <li id="li_Menu101_contact-us"> <a href="{{ route('contactus') }}"
                                class="inmenu">{{ __('front.contactUs') }}</a></li>
                        {{-- <li id="li_Menu101_contact-us"> <a href="{{ route('inquiry') }}"
                                class="inmenu">{{ __('front.inquiry') }}</a></li> --}}

                    </ul>
                </li>
                <li class="cate">
                    <p class="title">{{ __('front.categories') }}</p>
                    <ul class="wow fadeInUp list-style">
                        @forelse ($categories as $category)
                            <li class="side_nav1" id="HeadProCat1"><a
                                    href="car-paint-protection-film/index.html">{{ $category->name }}</a></li>
                        @empty
                        @endforelse

                    </ul>
                </li>
                <!-- footcont -->

                <li class="code">
                    <p class="title">QR</p>
                    <img src="{{ asset('storage/' . $settings->qr_image) }}" width="180" height="180"
                        loading="lazy" class="ErWeiImg" alt="QR Code" />
                </li>
            </ul>
            <p class="right-text">حقوق النشر © {{ $settings->campany_name }} الكل الحقوق محجوز.</p>
        </div>
        <!-- mobile display -->
        <div class="mobile-bottom">
            <div class="mobile-bottom-item"><a href="https://api.whatsapp.com/send?l=en&amp;phone=8618201786076"
                    id="M8" target="_blank" rel="nofollow" title="whatsapp"><i
                        class="iconfont icon-whatsapp" aria-hidden="true"></i>{{ __('front.whatsapp') }}</a></div>
            <div class="mobile-bottom-item"><a href="tel:{{ $settings->whatsapp }}" id="M7" target="_blank"
                    rel="nofollow" title="phone"><i class="iconfont icon-phone"
                        aria-hidden="true"></i>{{ __('front.phone') }}</a>
            </div>
            <div class="mobile-bottom-item">
                <div class="top-btn"><i class="iconfont icon-angle-up" aria-hidden="true"></i></div>
            </div>
            <div class="mobile-bottom-item"><a href="mailto:{{ $settings->email }}" id="M9" target="_blank"
                    rel="nofollow" title="{{ __('front.email') }}"><i class="iconfont icon-email1"
                        1aria-hidden="true"></i>{{ __('front.email') }}</a></div>
            <div class="mobile-bottom-item"><a href="inquiry.html" title="التحقيق"><i
                        class="iconfont icon-commenting" aria-hidden="true"></i>التحقيق</a></div>
        </div>
    </footer>

    <script src="{{ asset('front/js/Site_Common.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    <script src="{{ asset('front/js/count.js') }}"></script>
    <script src="{{ asset('front/js/share.js') }}"></script>
    <script src="{{ asset('front/js/wow.min.js') }}"></script>


    <script>
        $(".pro-intro a").each(function() {
            var h = $(this).attr("href");
            if (/^#\d+$/ig.test(h)) {
                $(this).click(function(e) {
                    e.preventDefault();
                    $("body,html").scrollTop($(h).offset().top - 70)
                })
            }
        });

        document.querySelectorAll('.lang-wrap a').forEach(element => {
            element.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                let lang = this.getAttribute('data-lang');

                // Update the language via URL
                window.location.href = `/set-language/${lang}`;
            });
        });
    </script>


    </script>

</body>

</html>
