<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Logo;
use App\Models\Post;
use App\Models\Social;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $logo = Logo::where('id',1)->first();
        View::share('logo',$logo);

        $social = Social::where('id',1)->first();
        View::share('social',$social);

        $about = About::where('id',1)->first();
        View::share('about',$about);

        $tags = Tag::all();
        View::share('tags',$tags);

        $categories = Category::all();
        View::share('categories',$categories);

        $popularPost = Post::orderBy('created_at','Asc')->take(6)->get();
        View::share('popularPost',$popularPost);

    }
}
