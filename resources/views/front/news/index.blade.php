@extends('front.index')
@section('title', __('front.news'))


@section('section')
    <main class="common-container">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<h1>{{ __('front.news') }}</h1>
        </div>
        <div class="news-content">
            <ul class="news-list list-style">
                @forelse ($news as $new)
                    <li class="list-2"><a href="{{ route('news.show', $new->slug) }}">
                            <object>
                                <div class="news-img"><img src="{{ asset('storage/' . $new->image) }}"
                                        alt="{{ $new->title }}" /></div>
                                <div class="news-info">
                                    <h3 class="news-title"><a
                                            href="news/tools-kits-what-you-need-to-install-the-pp-77714352.html">{{ $new->title }}</a>
                                    </h3>
                                    <p class="news-text">
                                        <a
                                            href="news/tools-kits-what-you-need-to-install-the-pp-77714352.html">{{ Str::limit(strip_tags(translateWithHTMLTags($new->description)), 50) }}</a>
                                    </p>
                                    <p class="news-date">{{ $new->created_at->format('M d, Y') }}</p>
                                </div>
                            </object>
                        </a>
                    </li>
                @empty
                @endforelse

            </ul>
            <div class="common-pages"><span> {{ $news->links() }}</span>
            </div>
        </div>
    </main>
@endsection
