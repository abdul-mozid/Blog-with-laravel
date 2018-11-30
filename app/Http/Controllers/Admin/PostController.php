<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Tag;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = [
            'posts' => Post::latest()->get(),
        ];
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ];
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|unique:posts',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'details' => 'required',
            'tags' => 'required',
            'categories' => 'required'
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (!empty($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('post', $imagename);
        } else {
            $imagename = "default.png";
        }
        $post = new Post();
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->image = $imagename;
        $post->body = $request->details;
        $post->user_id = Auth::user()->id;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->save();
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);
        Toastr::success('Post Created Successfully.', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data=[
            'post'=>Post::find($id),
        ];
        return view('admin.post.show_details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data=[
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'post'=>Post::find($id)
        ];
        return view('admin.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'tags' => 'required',
            'categories' => 'required'
        ]);
        $post=Post::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (!empty($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $upload = $request->file('image')->storeAs('post', $imagename);
            if($upload){
                 Storage::disk('public')->delete('post/' . $post->image);
            }
        } else {
            $imagename = $post->image;
        }
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->image = $imagename;
        $post->body = $request->details;
        $post->user_id = Auth::user()->id;
        if (isset($request->status)) {
            $post->status = true;
        } else {
            $post->status = false;
        }
        $post->is_approved = true;
        $post->update();
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        Toastr::success('Post Update Successfully.', 'Success');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::find($id);
        Storage::disk('public')->delete('post/' . $post->image);
        $post->delete();
        Toastr::success('Post Deleted Successfully.', 'Success');
        return redirect()->route('admin.post.index');
    }
    public function pending_posts() {
        $data = [
            'posts' => Post::latest()->get(),
        ];
        return view('admin.post.index', $data);
    }
    public function approve($id) {
    }

}
