@extends('layouts.backend.backApp')
@section('title','Category')
@push('style')
<link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <a href="{{route('admin.post.create')}}" class="btn btn-primary wave-effect">
                <i class="material-icons">add</i>
                <span>Add New Post</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EXPORTABLE TABLE
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th style="text-align: center;"><i class="material-icons">visibility</i></th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Is Approved</th>
                                        <th>Posted By</th>
                                        <th style="width:25%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th style="text-align: center;"><i class="material-icons">visibility</i></th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Is Approved</th>
                                        <th>Posted By</th>
                                        <th style="width:25%;">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($posts as $key=> $post)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$post->title}}</td>
                                        <td style="text-align: center;">{{$post->view_count}}</td>
                                        <td><img src="{{asset('storage/post/'.$post->image)}}" style="height:50px;width:50px;"/></td>
                                        <td>
                                            @if($post->status==true)
                                            <span class="label bg-green">Published</span>
                                            @else
                                            <span class="label bg-red">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->is_approved==true)
                                            <span class="label bg-green">Approved</span>
                                            @else
                                            <span class="label bg-red">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{$post->posted_by->name}}</td>
                                        <td style="width:25%;">
                                            <a class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                        document.getElementById('approve-{{ $post->id }}').submit();"><i class="material-icons">done</i></a> 
                                            <form class="form-inline" id="approve-{{ $post->id }}" action="{{url('admin/post/'.$post->id.'/approve')}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('patch')
                                            </form>
                                            <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-info btn-sm"><i class="material-icons">visibility</i></a>
                                            <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-success btn-sm"><i class="material-icons">edit</i></a>
                                            <a class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                                        document.getElementById('delete-form-{{ $post->id }}').submit();"><i class="material-icons">delete</i></a> 
                                            <form class="form-inline" id="delete-form-{{ $post->id }}" action="{{route('admin.post.destroy',$post->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
@endsection
@push('script')
<script src = "{{asset('backend/plugins/jquery-datatable/jquery.dataTables.js')}}" ></script>
<script src="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/js/admin.js')}}"></script>
<script src="{{asset('backend/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('backend/js/demo.js')}}"></script>
<script>
                                                            $(function () {
                                                            //Exportable table
                                                            $('.js-exportable').DataTable({
                                                            dom: 'Bfrtip',
                                                                    responsive: true,
                                                                    buttons: [
                                                                            'copy', 'csv', 'excel', 'pdf', 'print'
                                                                    ]
                                                            });
                                                            });
</script>
@endpush

