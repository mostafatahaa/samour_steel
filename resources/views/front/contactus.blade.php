@extends('front.index')
@section('title', __('front.contact_us'))


@section('section')
    <main class="common-container contact-us">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<h1>{{ __('front.contact_us') }}
            </h1>
        </div>
        <div class="abouts-content">
            <div class="contact-wrapper">
                <div class="contact-left">
                    <h3 class="title" style="margin-bottom: 30px">{{ __('front.contact_information') }}</h3>
                    <ul class="list-paddingleft-2">
                        <li class="list-style" style="margin-bottom: 10px">
                            <p class="contact-num">{{ __('front.address') }}:
                                {{ translateWithHTMLTags($settings->address) }}</p>
                        </li>
                        <li class="list-style" style="margin-bottom: 10px">
                            <p class="contact-num">{{ __('front.whatsapp') }}: {{ $settings->whatsapp }}</p>
                        </li>
                        <li class="list-style" style="margin-bottom: 10px">
                            <p class="contact-num">{{ __('front.phone') }}: {{ $settings->phone_number }}</p>
                        </li>
                        <li class="list-style" style="margin-bottom: 10px">
                            <p class="contact-num">{{ __('front.email') }}: {{ $settings->email }}</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="wmkcfeedback" class="wmkcfeedback">
                <div class="send-inquiry">
                    <form class="inquiry-form" method="post" action="{{ route('contactus.store') }}">
                        @csrf
                        <input type="email" id="wmkcfb-email" class="wmkcfb-email require" name="email"
                            placeholder="{{ __('front.email_placeholder') }}" required>
                        <input type="number" name="phone" id="wmkcfb-phone" class="wmkcfb-phone"
                            placeholder="{{ __('front.phone_placeholder') }}" required>
                        <input type="text" id="wmkcfb-company" name="company_name" class="wmkcfb-company"
                            placeholder="{{ __('front.company_placeholder') }}" required>
                        <textarea name="description" id="wmkcfb-content" class="wmkcfb-content require" cols="30" rows="10" required
                            placeholder="{{ __('front.inquiry_placeholder', ['hours' => $settings->duration_of_response_inquiries]) }}"></textarea>
                        <button type="submit" class="send-btn">{{ __('front.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
