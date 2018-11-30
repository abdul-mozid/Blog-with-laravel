<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = [
            'tags' => Tag::latest()->get(),
        ];
        return view('admin.tag.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'tag_name' => 'required',
        ]);
        $tag = new Tag();
        $tag->name = $request->tag_name;
        $tag->slug = str_slug($request->tag_name);
        $tag->created_by=Auth::user()->id;
        $tag->updated_by=Auth::user()->id;
        $tag->save();
        Toastr::success('Tag Saved Successfully.', 'Success');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = [
            'tag' => Tag::find($id),
        ];
        return view('admin.tag.edit', $data);
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
            'tag_name' => 'required',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->tag_name;
        $tag->slug = str_slug($request->tag_name);
        $tag->updated_by=Auth::user()->id;
        $tag->update();
        Toastr::success('Tag Updated Successfully.', 'Success');
        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Tag::find($id)->delete();
        Toastr::success('Tag Deleted Successfully.', 'Success');
        return redirect()->route('admin.tag.index');
    }

}
