@extends('layouts.home')

@section('container')

	<div class="container" style="margin-top: 120px">
		<div class="row">
			<div class="col-sm-8" style="background: #FFFFFF;width: 1100px">


              <div class="panel-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                 Add New
                </button>
                <a href="" data-toggle="modal" data-target="#myModal"></a>
              </div>

				<table class="table table-bordered" id="myTable">
					<thead >
						<tr>
	
							<th>ID<span class="pull-left glyphicon glyphicon-arrow-up"></span><span class="pull-left glyphicon glyphicon-arrow-down"></span></th>
							<th>SemesterName<span class="pull-left glyphicon glyphicon-arrow-up"></span><span class="pull-left glyphicon glyphicon-arrow-down"></span></th>
							<th>Comments<span class="pull-left glyphicon glyphicon-arrow-up"></span><span class="pull-left glyphicon glyphicon-arrow-down"></span></th>
              <th>Upload Image<span class="pull-left glyphicon glyphicon-arrow-up"></span><span class="pull-left glyphicon glyphicon-arrow-down"></span></th>
						
						</tr>

					</thead>
					<tbody>
					
						@foreach ($datas as $value) 
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->seminame }}</td>
								<td>{{ $value->comments }}</td>
                <td>{{ $value->imagename }}</td>
                
                
								
						
							<!-- 	
								<td>
									<a class="btn btn-link" href="{{ URL::to('semester/show'.$value->id) }}" >View</a>
								</td> -->

								<td>
									<a class="btn btn-link" href="{{ URL::to('semester/edit/'.$value->id) }}" class="btn btn-link" data-toggle="modal" data-target="#confirm-edit" href=""  >Edit </a>
								</td>

								<td>
								 <a data-href="{{ URL::to('semester/delete/'.$value->id) }}" class="btn btn-link" data-toggle="modal" data-target="#confirm-delete" href="" >Delete</a>
								</td>


								
                               
							</tr>

						@endforeach 
						
						  
					</tbody>
				
				</table>
	
	                    <tr>
							<td colspan="5">{{ $datas->links() }}</td>
						</tr>
	
			</div>
		</div>
	</div>
	
		<!-- Modal for edit -->
    <div class="modal fade " id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
           
        </div>
      </div>
    </div>


	<!-- Modal for delete -->
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
              </div>
              <div class="modal-body">
                    <strong>Are you sure to delete?</strong>
                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>

     <!-- Modal for add new -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
      </div>
      <div class="modal-body">
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
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cencel</button>
        {{ Form::close() }}  
      </div>
      <div class="modal-footer">
      
        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
      </div>
    </div>
  </div>
</div> 
     

@stop