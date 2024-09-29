@extends('front.index')
@section('title', __('front.whyChooseUs'))

@section('section')
    <main class="common-container why-choose-us">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<h1>
                {{ __('front.whyChooseUs') }}</h1>
        </div>
        @forelse ($data as $item)
            <div class="abouts-content">
                <div style="position:relative">
                    <h2
                        style="width:100%;font-size:24px;padding:8px 20px 6px 30px;box-sizing:border-box;border-bottom:2px solid #16bd35;border-radius:0 0 0 2px">
                        {{ $item->title }}</h2><span
                        style="display:inline-block;position:absolute;bottom:0;left:0;width:30px;height:6px;background-color:#16bd35;border-radius:2px"></span>
                </div>
                <p><br></p>
                <p>{!! translateWithHTMLTags($item->description) !!}</p>
                <p><br></p>
            </div>

        @empty
        @endforelse



    </main>
@endsection
