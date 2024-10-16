<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Features;
use App\Models\Gallery;
use App\Models\Knowledge;
use App\Models\News;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use App\Models\whyChooseUsData;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class PagesController extends Controller
{
    public function homePage()
    {
        $sliders = Slider::all();
        $settings = Settings::first();
        $categories = Category::all();
        $aboutUs = AboutUs::first();
        $features = Features::all();
        $gallery = Gallery::all();
        $products = Product::with('category')->select('ar_name', 'en_name', 'image', 'slug', 'is_special', 'category_id', 'top_description_text')->where('is_special', true)->where('status', 'active')
            ->get();
        $knoledges = Knowledge::take(4)->get();

        return view('front.index', compact('sliders', 'settings', 'categories', 'gallery', 'aboutUs', 'products', 'knoledges', 'features'));
    }

    public function aboutUsPage()
    {

        $aboutUsData = AboutUs::with('images', 'moreDetails')->get();
        $translate = new GoogleTranslate('en');
        $features = Features::all();

        return view('front.about_us', compact('aboutUsData', 'translate', 'features'));
    }

    public function whyChooseUsPage()
    {
        $data = whyChooseUsData::all();
        return view('front.why_choose_us', compact('data'));
    }

    public function newsPage()
    {
        $news = News::paginate(8);
        return view('front.news.index', compact('news'));
    }

    public function newsPageShow($slug)
    {
        $new = News::with('descriptions')->where('slug', $slug)->firstOrFail();
        $sessionKey = 'viewed_news_' . $new->id;

        if (!session()->has($sessionKey)) {
            $new->increment('views');
            session()->put($sessionKey, true);
        }

        return view('front.news.show', compact('new'));
    }

    public function knowledgePage()
    {
        $knowledges = Knowledge::paginate(8);
        return view('front.knowledge.index', compact('knowledges'));
    }

    public function knowledgePageShow($slug)
    {
        $knowledge = Knowledge::where('slug', $slug)->firstOrFail();
        $sessionKey = 'viewed_knowledge_' . $knowledge->id;

        if (!session()->has($sessionKey)) {
            $knowledge->increment('views');
            session()->put($sessionKey, true);
        }

        return view('front.knowledge.show', compact('knowledge'));
    }
}
