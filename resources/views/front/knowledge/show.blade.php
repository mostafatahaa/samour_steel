@extends('front.index')

@section('title', $knowledge->title)


@section('section')
    <main class="common-container">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<a
                href="{{ route('knowledge.index') }}">{{ __('front.knowledge') }}</a>/
            <h2>{{ __('front.details') }}</h2>
        </div>
        <div class="news-detail-content">
            <h1 class="news-title">{{ $knowledge->title }}</h1>
            <div style="display: block" class="news-info">
                <p class="news-date">{{ $knowledge->created_at->format('M d, Y') }}</p><br>
                <p class="news-views" id="page-content-view"></p>
                <p class="news-date">{{ $knowledge->views ?? 0 }} {{ __('front.view') }}</p>
                <p class="news-views" id="page-content-view"></p>
            </div>

            <article>
                <p><br></p>
                <p style="text-align: center;"><img src="{{ asset('storage/' . $knowledge->image) }}" alt="1"
                        width="1000" height="563" loading="lazy"></p>
                <p style="text-align: center;"><br></p>
                <p>{!! translateWithHTMLTags($knowledge->description) !!}</p>
                <p><br></p>
        </div>


        <div class="inquiry-pro-list"></div>
        <div id="wmkcfeedback" class="wmkcfeedback"></div>
        <div id="wmkcfeedback" class="wmkcfeedback">
            <div style="padding: 30px;" class="send-inquiry">
                <form class="inquiry-form" method="post" action="{{ route('contactus.store') }}" id="inquiryForm">
                    @csrf
                    <input type="hidden" name="product_ids" id="product_ids" value="">

                    <input type="email" id="wmkcfb-email" class="wmkcfb-email require" name="email"
                        placeholder="{{ __('front.email_placeholder') }}" required>
                    <input type="number" name="phone" id="wmkcfb-phone" class="wmkcfb-phone"
                        placeholder="{{ __('front.phone_placeholder') }}" required>
                    <input type="text" id="wmkcfb-company" name="company_name" class="wmkcfb-company"
                        placeholder="{{ __('front.company_name_placeholder') }}" required>
                    <textarea name="description" id="wmkcfb-content" class="wmkcfb-content require" cols="30" rows="10" required
                        placeholder="{{ __('front.inquiry_placeholder', ['hours' => $settings->duration_of_response_inquiries]) }}"></textarea>
                    <button type="submit" class="send-btn">{{ __('front.send') }}</button>
                </form>
            </div>
        </div>

    </main>
@endsection
