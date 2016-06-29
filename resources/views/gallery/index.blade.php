@extends("dcms::template/layout")

@section("content")

    <div class="main-header">
      <h1>Gallery</h1>
      <ol class="breadcrumb">
        <li><a href="{!! URL::to('admin/dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-file"></i> Gallery</li>
      </ol>
    </div>

    <div class="main-content">
    	<div class="row">
				<div class="col-md-12">
					<div class="main-content-block">

  @if (Session::has('message'))
    <div class="alert alert-info">{!! Session::get('message') !!}</div>
  @endif

    <div class="btnbar btnbar-right"><a class="btn btn-small btn-primary" href="{!! URL::to('/admin/gallery/create') !!}">Create new</a></div>

    <h2>Overview</h2>

 {!! Datatable::table()
    ->setId('datatable')
    ->addColumn('Name')
    ->addColumn('Path')
		->addColumn('')
    ->setUrl(route('admin/gallery/api/table'))
    ->setOptions(array(
        'pageLength' => 50,
        ))
    ->render() !!}


    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.css">

    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/be7019ee387/integration/bootstrap/3/dataTables.bootstrap.js"></script>

	      	</div>
      	</div>
      </div>
    </div>

@stop
