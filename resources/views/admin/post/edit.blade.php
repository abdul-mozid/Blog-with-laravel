@extends('layouts.backend.backApp')
@section('title','Category')
@push('style')
<link href="{{asset('backend/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">
<link href="{{asset('backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add New Tag
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.post.update',$post->id)}}" method='POST'  enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <label for="title">Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}" placeholder="Enter Post Title">
                                </div>
                            </div>
                            <label for="image">Category</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @foreach($post->categories as $cat)
                                                    @if($category->id==$cat->id) selected @endif
                                                @endforeach
                                                >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label for="image">Tag</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                                @foreach($post->tags as $cats)
                                                    @if($tag->id==$cats->id) selected @endif
                                                @endforeach
                                                >{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <img src="{{asset('storage/post/'.$post->image)}}" style="height:30px;width:30px;"/>
                            <label for="image">Photo</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                            </div>
                            <input type="checkbox" id="status" name="status" class="filled-in" value="1"@if($post->status==true) checked @endif>
                                   <label for="status">Publish</label><br/>
                            <label for="details">Details</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea id="details" name="details" class="form-control">{{$post->body}}</textarea>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('backend/plugins/multi-select/js/jquery.multi-select.js')}}"></script>
@endpush
