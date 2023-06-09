<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')->with('posts', Post::orderBy('created_at','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' .
        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $slug = SlugService::createSlug(Post::class, 'slug',
        $request->title);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => Auth::user()->id,
            'slug' => $slug
        ]);
        return redirect('/blog')->with('message','Your Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
         $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug',$slug)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,
            'slug' => $slug
        ]);

        return redirect('/blog')->with('message','Your Post Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug',$slug);
        $post->delete();

        return redirect('/blog')->with('message','Your Post Has been deleted');
    }
}
