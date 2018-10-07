@extends('admin.layout')
@section('title', 'Cập nhật quyền')
@section('content')

<section class="content-header">
    <h1>
        Cập nhật
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
                @include('blocks.notification')
                <form role="form" action="{{ route('role_update', ['id' => $detail['id']]) }}" method="post">

                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Tên quyền</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <input type="checkbox" id="checkall">
                                </span>
                                <input type="text" class="form-control" placeholder="tên quyền" required="" name="name" value="{{ $detail['role_name'] }}">
                            </div>
                        </div>
                        
                        <?php $detail_module = json_decode($detail['module']); ?>

                        @foreach($module as $key => $items)
                        <div>
                            <span class="module badge">{{ $key }}</span>
                            @foreach($items as $item)
                            <label class="checkbox-inline">
                                <input type="checkbox" name="list_role[{{ $key }}][]" class="checkBoxClass" value="{{ $item }}" > {{ $item }}
                            </label>
                            @endforeach
                        </div>
                        <br>
                        @endforeach

                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="status" value="{{ $detail['status'] }}" {{ $detail['status'] == 1 ? 'checked' : '' }}> Kích hoạt
                            </label>
                        </div>
                    </div>
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