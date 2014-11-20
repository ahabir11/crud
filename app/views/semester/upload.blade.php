@extends('layouts.home')
 @section('container')

  @if (Session::has('message'))
    <div class="alert alert-info">{{Session::get("message")}}</div>
  @endif
 
  <div class="panel-body">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
    Upload Images
    </button>
    <a href="" data-toggle="modal" data-target="#uploadModal"></a>
  </div>

  <!-- get all image name from db and show the images from image folder starts-->

     <ul class="row image_thumbs">
          @foreach ($photos as $value) 
            <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
              <img src="{{URL::to('/')}}/file/thumbs/thumb_{{$value->photos}}" data_description="{{URL::to('/')}}/file/user_photos/{{$value->photos}}" class="img-responsive" />
            </li> 
          @endforeach        
     </ul>

     {{ $photos->links()}}

    <!-- create a light box modal to show the main file -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body"> 
            <!-- show the main image from file/user_photos directory using jquery. jquery written in home.blade.php -->              
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <!-- image gallery ends -->

  <!-- get all image name from db and show the images from image folder starts-->

  <!-- Modal for upload photo-->
  <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
        </div>
        <div class="modal-body">
     		 {{ Form::open(array('url' => 'upload/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}  
         <div class='form-group'>

                 {{ Form::label('imagename', 'Upload File') }} 
              
                 {{Form::file('images[]', ['multiple' => true], ['class'=>'form-control'])}}

              </div>



              {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
              <button type="button" class="btn btn-default" data-dismiss="modal">Cencel</button>
          {{ Form::close() }}  
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
    </div>
  </div> 

@stop