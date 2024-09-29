@extends('front.index')

@section('title', __('front.knowledge'))

@section('section')
    <main class="common-container">
        <div class="inner-banner"><img src="#" class="pc" onerror="this.parentNode.removeChild(this)"
                alt="banner" />
            <div class="sm"></div>
        </div>
        <div class="breadcrumbs-nav"><a href="{{ route('home') }}">{{ __('front.home') }}</a>/<h1>{{ __('front.knowledge') }}
            </h1>
        </div>
        <div class="news-content">
            <ul class="news-list list-style">
                @forelse ($knowledges as $knowledge)
                    <li class="list-2"><a href="{{ route('knowledge.show', $knowledge->slug) }}">
                            <object>
                                <div class="news-img"><img src="{{ asset('storage/' . $knowledge->image) }}"
                                        alt="{{ $knowledge->title }}" /></div>
                                <div class="news-info">
                                    <h3 class="news-title"><a
                                            href="{{ route('knowledge.show', $knowledge->slug) }}">{{ $knowledge->title }}</a>
                                    </h3>
                                    <p class="news-text">
                                        <a
                                            href="{{ route('knowledge.show', $knowledge->slug) }}">{{ Str::limit(strip_tags(translateWithHTMLTags($knowledge->description)), 50) }}</a>
                                    </p>
                                    <p class="news-date">{{ $knowledge->created_at->format('M d, Y') }}</p>
                                </div>
                            </object>
                        </a>
                    </li>
                @empty
                @endforelse

            </ul>
            <div class="common-pages"><span> {{ $knowledges->links() }}</span>
            </div>
        </div>
    </main>
@endsection
