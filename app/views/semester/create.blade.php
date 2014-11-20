@extends('layouts.home')
 @section('container')

 <div class="container" style="margin-top: 70px; width:500px">

    <div class='row clearfix'>
    <div class='col-md-12'style="width:500px;background:#E7E7E7">
       
          @if (Session::has('message'))
          <div class="alert alert-info">{{Session::get("message")}}</div>
           @endif
           
        {{ HTML::ul($errors->all()) }} 

      {{ Form::open(array('url' => 'semester/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}  
    
         <div class='form-group'>
                {{ Form::label('seminame', 'SemesterName') }} 
                {{ Form::text('seminame', Input::old('seminame'), array('class'=>'form-control','required'=>'required')) }}
            </div>

            <div class='form-group'>
    			{{ Form::label('comments', 'Comments') }} 
    			{{ Form::textarea('comments', Input::old('comments'),['class'=>'form-control','size'=>'30x5']) }}
    		</div>
              <div class='form-group'>
                {{ Form::label('imagename', 'Upload File') }} 
                {{ Form::file('imagename', Input::old('imagename'), array('class'=>'form-control')) }}
            </div>

            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
        {{ Form::close() }} 
    </div>
</div>
</div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div -->
<!-- </div> -->


@stop

           