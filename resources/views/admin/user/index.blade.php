@extends('admin.layout')
@section('title', 'Danh sách BQT')
@section('content')

<!-- DataTables -->
<link rel="stylesheet" href="public/admin/css/dataTables.bootstrap.min.css">

<section class="content-header">
    <h1>
        Danh sách
        <small>BQT</small>
      </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            
            <div class="box">
                <div class="box-header">
                    
                	<div class="btn-group">
						<button type="button" class="btn btn-success"><a href="{{ route('user_create') }}"><i class="fa fa-plus"></i> Thêm</a></button>
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><i class="fa fa-remove"></i> Xóa</a></li>
						</ul>
					</div>
                    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                            	<th width="5%"><input type="checkbox" class="checkall"></th>
                                <th width="10%">Avatar</th>
                                <th width="20%">Tài khoản</th>
                                <th width="15%">Quyền</th>
                                <th width="15%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="10%">Ẩn/Hiện</th>
                                <th width="10%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($list_record as $item)
                            <tr>
                            	<td><input type="checkbox" value="{{ $item->id }}"></td>
                                <td>
                                    <img src="{{ !$item->avatar ? asset('storage/app/avatar/no_image.png') : asset('storage/app/'.$item->avatar) }}" alt="{{ $item->username }}" width="100%">
                                </td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->role_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->status == 1 ? 'Hiện' : 'Ẩn' }}</td>
                                <td>
	                                <span class="btn-group block-button">
										<button type="button" class="btn btn-info btn-sm"><a href="#"><i class="fa fa-pencil"></i></a></button>
										<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
				                    </span>
			                	</td>
                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->


<!-- DataTables -->
<script src="public/admin/js/jquery.dataTables.min.js"></script>
<script src="public/admin/js/dataTables.bootstrap.min.js"></script>

<script>
	$(function () {
		$('#example1').DataTable({
			'paging'      : true,
			'lengthChange': true,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : true
		})
	})
</script>

@endsection