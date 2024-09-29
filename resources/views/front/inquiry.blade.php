@extends('front.index')
@section('title', __('front.contact_us'))

<style>
    /* .ic-close {
        display: none;
    } */
</style>
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
                    <ul class="list-paddingleft-2">
                        <li class="list-style" style="margin-bottom: 10px">
                            <p class="contact-num">{!! translateWithHTMLTags($settings->inquireies_description) !!}</p> <!-- Assuming this is already translated -->
                        </li>
                    </ul>
                </div>
            </div>

            <div class="inquiry-pro-list"></div>
            <div id="wmkcfeedback" class="wmkcfeedback"></div>
            <div id="wmkcfeedback" class="wmkcfeedback">
                <div class="send-inquiry">
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
        </div>
    </main>
    <script src="{{ asset('front/js/inquiryList.js') }}"></script>
    <script src="{{ asset('front/js/addInquiry.js') }}"></script>
    <script>
        // Ensure the form submission captures the product IDs from localStorage
        document.getElementById('inquiryForm').addEventListener('submit', function() {
            var productCache = localStorage.getItem('productCachePC');
            if (productCache) {
                var products = JSON.parse(productCache);
                var productIds = products.map(product => product.id);
                document.getElementById('product_ids').value = productIds.join(',');
            }
        });

        "use strict";

        // Function to remove a product from the cache
        function removeCache(productId) {
            var productCache = localStorage.getItem("productCachePC");
            var products = [];

            if (productCache) {
                products = JSON.parse(productCache);
            }

            // Debugging: Before removal
            console.log("Products before removal:", products);

            // Filter out the product with the matching ID
            products = products.filter(function(product) {
                return product.id != productId;
            });

            // Debugging: After removal
            console.log("Products after removal:", products);

            // Update the localStorage with the new product list
            localStorage.setItem("productCachePC", JSON.stringify(products));

            // Debugging: Check localStorage after update
            console.log("Updated localStorage:", localStorage.getItem("productCachePC"));

            // If there are no products left, hide the inquiry list
            if (products.length === 0) {
                $(".inquiry-pro-list").css("display", "none");
            }
        }

        // Document ready function
        $(function() {
            // Initialize the product list from localStorage

            // Add event listener for the delete button with the class 'ic-close'
            $(".inquiry-pro-list").on("click", ".ic-close", function() {
                var productId = $(this).closest(".inquiry-pro-item").data("id");

                console.log("Clicked remove for product ID:", productId); // Debugging

                // Remove the item from the DOM
                $(this).closest(".inquiry-pro-item").remove();

                // Remove the item from the localStorage
                removeCache(productId);
            });
        });
    </script>
@endsection
