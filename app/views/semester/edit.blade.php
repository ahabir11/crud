@extends('layouts.home')

@section('container')
 <div class="container" style="margin-top: 70px; width:500px">

    <div class='row clearfix'>
      <div class='col-md-12'style="width:450px;background:#E7E7E7">
          @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
          @endif
          {{ HTML::ul($errors->all()) }}
       </div>
     </div>

     <div class="row clearfix">
      <div class="col-sm-12">

       {{Form::model($data, array('route'=>['semester.update', $data->id],'method' => 'post', 'class'=>'form-horizontal'))}}

       
             <div class='form-group'>
                {{ Form::label('seminame', 'SemesterName') }} 
                {{ Form::text('seminame', $data->seminame, array('class'=>'form-control','required'=>'required')) }}
            </div>

            <div class='form-group'>
          {{ Form::label('comments', 'Comments') }} 
          {{ Form::textarea('comments', $data->comments,['class'=>'form-control','size'=>'30x5']) }}
          </div>

                                      
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

        {{Form::close()}}
       
      </div>
      </div>
     </div>