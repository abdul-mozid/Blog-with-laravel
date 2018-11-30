<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $currentDate = Carbon::now()->toDateString();
        if (!empty($image)) {
            $imagename = $slug . '-' .$currentDate.'-'. uniqid() . '.' . $image->getClientOriginalExtension();
            //Code for store category image
            $category = Image::make($image)->resize(1600, 479)->save('foo.jpg');
            Storage::disk('public')->put('category/' . $imagename, $category);
            //Code for store category slider image
            $categorya = Image::make($image)->resize(500, 333)->save('foo.jpg');
            Storage::disk('public')->put('category/slider/' . $imagename, $categorya);
        } else {
            $image_name = "default.png";
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
        $category->created_by = Auth::user()->id;
        $category->updated_by = Auth::user()->id;
        $category->save();
        Toastr::success('Category Created Successfully.', 'Success');
        return redirect()->route('admin.category.index');
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
            'category' => Category::find($id),
        ];
        return view('admin.category.edit', $data);
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
            'name' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $currentDate = Carbon::now()->toDateString();
        if (!empty($image)) {
            $imagename = $slug . '-' .$currentDate.'-'. uniqid() . '.' . $image->getClientOriginalExtension();
            //Code for store category image
            $category = Image::make($image)->resize(1600, 479)->save('foo.jpg');
            Storage::disk('public')->put('category/' . $imagename, $category);
            //Code for store category slider image
            $categorya = Image::make($image)->resize(500, 333)->save('foo.jpg');
            Storage::disk('public')->put('category/slider/' . $imagename, $categorya);
        } else {
            $image_name = "default.png";
        }
        $category = Category::find($id);
        Storage::disk('public')->delete('category/' . $category->image);
        Storage::disk('public')->delete('category/slider/' . $category->image);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
        $category->updated_by = Auth::user()->id;
        $update = $category->update();
        Toastr::success('Category Updated Successfully.', 'Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $category = Category::find($id);
        Storage::disk('public')->delete('category/' . $category->image);
        Storage::disk('public')->delete('category/slider/' . $category->image);
        $category->delete();
        Toastr::success('Category Deleted Successfully.', 'Success');
        return redirect()->route('admin.category.index');
    }

}
