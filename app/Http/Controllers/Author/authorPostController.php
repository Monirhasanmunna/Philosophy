<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;

class authorPostController extends Controller
{
    public function index()
    {
      $user = User::FindorFail(Auth::id());
      $posts = Post::latest()->paginate();
      return view('author.post.index',compact('posts','user'));
    }

    public function create()
    {
        $user = User::FindorFail(Auth::id());
        $categories = Category::all();
        $tags = Tag::all();
        return view('author.post.create',compact('categories','tags','user'));
    }

    public function store(Request $request)
    {
      $request->validate([

        'title'      => 'required|unique:posts,title|max:200',
        'description'=> 'required|max:1000',
        'category'   => 'required',
        'tag'        => 'required',
        'image'      => 'required|mimes:jpg,jpeg,png,web,gif|max:2024',
        'status'     =>'sometimes',

      ]);

      $image = $request->file('image');
      $slug = Str::slug($request->title);

      if(isset($image))
        {
            //make unique name for image`
            $imageName = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

            $postImage = Image::make($image)->resize(2000,1200)->stream();
            Storage::disk('public')->put('post/'.$imageName,$postImage);
        }else{

            $imageName = 'default.png';
        }
      
      $post = new Post;~
      $post->title = $request->title;
      $post->user_id = Auth::id();
      $post->slug = $slug;
      $post->image = $imageName;
      $post->description= $request->description;
      if(isset($request->status)){
        $post->status = true;
      }else{
        $post->status = false;
      }
      $post->is_approve = false;
      $post->save();
      $post->categories()->attach($request->category);
      $post->tags()->attach($request->tag);
      toastr()->success('Post Added Succesfully :)');
      return redirect()->back();
    }

    public function show($id)
    {
      $post = Post::FindorFail($id);
      return view('author.post.show',compact('post'));
    }

    
    public function edit($id)
    {
      $user = User::FindorFail(Auth::id());
      $post = Post::FindorFail($id);
      $categories = Category::all();
      $tags = Tag::all();
      return view('author.post.edit',compact('post','categories','tags','user'));
    }


    public function update(Request $request,$id)
    {
      $post = Post::FindorFail($id);

      $request->validate([

        'title'      => 'required|max:200',
        'description'=> 'required|max:1000',
        'category'   => 'required',
        'tag'        => 'required',
        'image'      => 'sometimes|mimes:jpg,jpeg,png,web,gif|max:2024',
        'status'     =>'sometimes',

      ]);

      $image = $request->file('image');
      $slug = Str::slug($request->title);

      if(isset($image))
        {
            //make unique name for image`
            $imageName = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }

            if(Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }

            $postImage = Image::make($image)->resize(2000,1200)->stream();
            Storage::disk('public')->put('post/'.$imageName,$postImage);
        }else{

            $imageName = $post->image;
        }
      
      $post->title = $request->title;
      $post->user_id = Auth::id();
      $post->slug = $slug;
      $post->image = $imageName;
      $post->description= $request->description;
      if(isset($request->status)){
        $post->status = true;
      }else{
        $post->status = false;
      }
      $post->is_approve = false;
      $post->save();
      $post->categories()->sync($request->category);
      $post->tags()->sync($request->tag);
      toastr()->success('Post Updated Succesfully :)');
      return redirect()->back();
    }

    public function destroy($id)
    {
        $post = Post::FindorFail($id);

        if(Storage::disk('public')->exists('post/'.$post->image))
        {
          Storage::disk('public')->delete('post/'.$post->image);
        }
        
        $post->delete();
        toastr()->success('Post Deleted Succesfully :)');
        return redirect()->back();
    }
}
