@extends('front.index')
@section('title', __('front.thanks'))


@section('section')
    <main class="common-container">
        <div class="inner-banner"><img src="" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
    </main>
    <div class="thanks-dialog-box">
        <p class="thanks-title">{{ __('front.thanks') }}</p>
        <div class="thanks-con"><img src="{{ asset('front/images/ok.png') }}" alt="{{ __('front.thanks') }}">
            <p>{{ __('front.sent_successfully') }}</p><a href="{{ route('home') }}">{{ __('front.return_home') }}<img
                    src="{{ asset('front/images/home.png') }}" alt="{{ __('front.return_home') }}"></a>
        </div>
    </div>
    <!-- footer -->
    <footer>
    @endsection
