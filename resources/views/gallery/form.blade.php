@extends("dcms::template/layout")

@section("content")

    <div class="main-header">
      <h1>Gallery</h1>
      <ol class="breadcrumb">
        <li><a href="{!! URL::to('admin/dashboard') !!}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{!! URL::to('admin/gallery') !!}"><i class="fa fa-file"></i> Gallery</a></li>
        @if(isset($Gallery))
					 	<li class="active">Edit</li>
        @else
			  		<li class="active">Create</li>
        @endif
      </ol>
    </div>


    <div class="main-content">
    	<div class="row">
				<div class="col-md-12">
					<div class="main-content-block">

              @if(isset($Gallery))
                <h2>Edit gallery</h2>
                {!! Form::model($Gallery, array('route' => array('admin.gallery.update', $Gallery->id), 'method' => 'PUT')) !!}
              @else
                <h2>Create gallery</h2>

                  {!! Form::open(array('url' => 'admin/gallery')) !!}
              @endif

              @if($errors->any())
                <div class="alert alert-danger">{!! Html::ul($errors->all()) !!}</div>
              @endif



              <div class="form-group">
	              {!! Form::label('name', 'Name ') !!}
              	{!! Form::text('name', null, array('class' => 'form-control')) !!}
              </div>

              <div class="form-group">
               {!! Form::label('path', 'Path') !!}

               <div class="input-group">
                   {!! Form::text('path', Input::old('path'), array('class' => 'form-control')) !!}
                 <span class="input-group-btn">
                   {!! Form::button('Browse Server', array('class' => 'btn btn-primary browse-server', 'id'=>'browse_path')) !!}
                 </span>
               </div>
             </div>


							{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
              <a href="{!! URL::previous() !!}" class="btn btn-default">Cancel</a>
            	{!! Form::close() !!}

	      	</div>
      	</div>
      </div>
    </div>

<script type="text/javascript" src="{!! asset('/ckeditor/ckeditor.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/ckeditor/adapters/jquery.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/ckfinder/ckfinder.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/ckfinder/ckbrowser.js') !!}"></script>

<script type="text/javascript">
$(document).ready(function() {
	//CKFinder for CKEditor
	CKFinder.setupCKEditor( null, '/ckfinder/' );

	//CKFinder
	$(".browse-server").click(function() {
		BrowseServer( 'Images:/', 'path' );
	})

});

</script>

<script type="text/javascript" src="{!! asset('packages/dcweb/dcms/assets/js/bootstrap.min.js') !!}"></script>
@stop
