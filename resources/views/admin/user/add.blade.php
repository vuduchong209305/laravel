@extends('admin.layout')
@section('title', 'Thêm mới BQT')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới
        <small>BQT</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">

                    <div class="btn-group">
                        <button type="button" class="btn btn-info"><a href="{{ route('user_index') }}"><i class="fa fa-list"></i> Danh sách</a></button>
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="fa fa-remove"></i> Xóa</a></li>
                        </ul>
                    </div>
                    
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data" action="{{ route('user_store') }}">

                    {{ csrf_field() }}
                    <div class="box-body">

                        @include('blocks.notification')

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="username" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="phone" required="required">
                        </div>
                        <div class="form-group">
                            <label>Quyền</label>
                            <select class="form-control" name="role" required="required">
                                @foreach($list_role as $item)
                                <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Avatar</label>
                            <img src="/storage/app/avatar/no_image.png" alt="" class="preview_image">
                            <input type="file" name="avatar" class="hidden imgUpload" accept="image/*">
                            <i class="fa fa-close remove_preview"></i>
                            <a class="btn btn-app btn_select" >
                                <i class="fa fa-upload"></i> Chọn ảnh
                            </a>

                            <p class="help-block">Dung lượng ảnh <= 2MB.</p>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="status"> Khóa</label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
            
        </div>
        <!--/.col (left) -->
        
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection