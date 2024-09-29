@extends('front.index')

@section('title', __('front.infoAboutUs'))


@section('section')
    <main class="common-container about-us">


        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<h1>
                {{ __('front.infoAboutUs') }}</h1>
        </div>
        <p style="text-align:center"><img alt="NANOLINK" title="NANOLINK" loading="lazy" width="400" height="200"
                src="{{ asset('storage/' . $settings->logo) }}" /></p>
        <div class="abouts-content">
            @forelse ($aboutUsData as $item)
                <h2 class="abouts-title"><strong style="white-space: normal;">{{ $item->title }}</strong></h2>
                <article>
                    {!! translateWithHTMLTags($item->description) !!}
                </article>
                <div class="wmkc-template-43">
                    <div class="wmkc-flex-jc-sb wmkc-text-align-c">
                        @forelse ($item->images as $image)
                            <div class="wmkc-flex-item wmkc-flex-item2">
                                <div class="wmkc-item-img">
                                    <img src="{{ asset('storage/' . $image->image) }}" alt="about-us" title=" "
                                        loading="lazy">
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <p><br></p>

                @once
                    <div class="kche-wrap-width">
                        <div class="kche-t130">
                            <div class="kche-t130-content">
                                <div class="kche-t130-list">
                                    @forelse ($features as $otherItem)
                                        <div class="kche-t130-item">
                                            <div class="kche-color-theme kche-t130-item-icon"><img
                                                    src="{{ asset('storage/' . $otherItem->image) }}" width="70px"
                                                    height="70px"></div>

                                            <p class="kche-t130-item-tit">{{ $otherItem->title }}</p>
                                        </div>

                                    @empty
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                @endonce

                @forelse ($item->moreDetails as $subItem)
                    <div class="kche-wrap-width">
                        <div class="kche-t201">
                            <div class="kche-t201-contant">
                                <div class="kche-t201-top">
                                    <div class="kche-t201-con">
                                        <div class="kche-t201-title">{{ $subItem->en_title }}</div>

                                        <div class="kche-t201-sub">
                                            <div class="kche-bg-theme kche-t201-span">&nbsp;</div>
                                        </div>

                                        <div class="kche-t201-text">
                                            <p>
                                                {!! translateWithHTMLTags($subItem->description) !!}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="kche-t201-img"><img width="1290" height="700"
                                            alt="Automotive Film Manufacturer " loading="lazy"
                                            title="Automotive Film Manufacturer "
                                            src="{{ asset('storage/' . $subItem->image) }}" /></div>
                                </div>
                            </div>
                        </div>
                    </div>



                @empty
                @endforelse

            @empty
            @endforelse


    </main>
@endsection
