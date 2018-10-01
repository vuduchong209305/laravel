@extends('admin.layout')
@section('title', 'Thêm mới quyền')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thêm mới
        <small>Quyền</small>
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
                        <button type="button" class="btn btn-info"><a href="{{ route('role_index') }}"><i class="fa fa-list"></i> Danh sách</a></button>
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
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Tên quyền</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" id="checkall">
                                </span>
                                <input type="text" class="form-control" placeholder="tên quyền">
                            </div>
                        </div>
                        
                        @foreach($module as $key => $items)
                        <div>
                            <span class="module badge">{{ $key }}</span>
                            @foreach($items as $item)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="list_role[{{ $key }}][]" class="checkBoxClass"> {{ $item }}
                            </label>
                            @endforeach
                        </div>
                        <br>
                        @endforeach
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

<script>
    $(document).ready(function () {
        $("#checkall").click(function () {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });
        
        $(".checkBoxClass").change(function(){
            if (!$(this).prop("checked")){
                $("#checkAll").prop("checked",false);
            }
        });
    });
</script>

@endsection