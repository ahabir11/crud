<?php

class SemesterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
	

	public function scroll()
	{
        $user = DB::table('semesters')->paginate(3);;
        //$list = File::allFiles('images/gallery');
        return View::make('semester.infinitescroll', compact('user'))->with('title','infinite scroll');
    }  
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('semester.create')->with('title','Create Semester');
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
	public function save()
	{
			  $token=csrf_token(); 
			  $rules=array
			  (
			   'seminame'=>'Required|Min:4|Max:32',  
			   'comments'=>'Min:4|Max:200',
			   'imagename'=>'Required'

			  ); 

			  $validator= Validator::make(Input::all(), $rules);
			  
			  if($validator->fails())
			  {
				  return Redirect::to('semester/create')->withErrors($validator)->withInput();
				   //*seme/create is come from route which will be redirect
			  }
			  else
			  {
				   if($token == Input::get('_token'))
				   	{

				   	$data = new Semester();
				    $data->seminame = Input::get('seminame');
				    $data->comments = Input::get('comments'); 

				    //file upload starts here
	                $imagefile=Input::file('imagename');
	                if ($imagefile) 
	                {
	                	$directory=public_path().'/file/user_photos'; //file directory//all uploaded photo will be stored here. only name of the photo will store in the db
	                	$imageName=Input::file('imagename')->getClientOriginalName();//this will get the image name and set to imageName variable  
	                	Input::file('imagename')->move($directory,$imageName);//this line upload the file into  directory where we want to store  
	                	$data->imagename=$imageName;
	 				}
 				//file upload ends   
 				
			
				    if($data->save())
				    {
				     Session::flash('message', 'Data Successfully Saved');
				     return Redirect::to('semester/show');
				    }

			     }
		       }
		 }


		public function images_upload()
		{
			$photos = Photos::paginate(10);			
			return View::make('semester.upload')->with('title','upload images')->with('photos', $photos);
		}
		public function images_save()
	    {
		
 	    $files = Input::file('images');
         foreach($files as $file)
          {
             $rules = array(           	
             'file' => 'required|mimes:png,gif,jpeg,txt,pdf,doc,rtf|max:20000'
             );

	        $validator = Validator::make(array('file'=> $file), $rules);
	   
		    if($validator->passes())
		    {
		        $id = Str::random(14);

		        $main_dir = 'file/user_photos';
		        $thumb_dir = 'file/thumbs';
		        $tempPath = $file->getRealPath(); 
		        $imageName = $file->getClientOriginalName();	
		        $extension = $file->getClientOriginalExtension();
		        

		        $profile_thumbs_height= 120;
	            $profile_thumbs_width=120;

	            $profile_image_height=740;
	            $profile_image_width= 500;

	            Image::make($tempPath)->resize($profile_thumbs_height, $profile_thumbs_width)->save($thumb_dir.'/thumb_'.$imageName);//for thumb images size min
	            Image::make($tempPath)->resize($profile_image_height, $profile_image_width)->save($main_dir.'/'.$imageName);//for main image resize
	           
	            $data = new Photos;
	            $data->user_id = 12;
	            $data->photos = $imageName;
	            $data->save();  

           } 
		    else 
		    {
		    	Session::flash('message', 'Only accept images');
		        return Redirect::back()->with('error', 'I only accept images.');		        
		    }
		}

		Session::flash('message', 'Image uploaded Successfully');
		return Redirect::to('upload/image')->with('title','upload images');
	} 

	public function show_semester()
	{
		//$data=Semester::all();
		$data=Semester::orderBy('id', 'desc')->paginate(5);

		return View::make('semester.show')->with('datas',$data)->with('title','All Semester List');
	
	}

	 
	 public function delete_semester($id)
	{
		// echo("OK");
		// exit();
		$data= Semester::find($id);
		if($data->delete())
		{
		 return Redirect::to('semester/show')->with('title','All Semester List');
		}
	 }
	 
	public function edit_semester($id)
	{
		$data = Semester::find($id);
		return View::make('semester.edit', compact('data'))->with('title','Edit Semester');

	}

   public function update_semester($id)
   {
  	          $token=csrf_token(); 
			  $rules=array
			  (
			   'seminame'=>'Required|Min:4|Max:32',  
			   'comments'=>'Required|Min:4|Max:200'
			  ); 

			  $validator= Validator::make(Input::all(), $rules);
			  
			  if($validator->fails())
			  {
				  //Session::flash('message', 'Data not saved');
	              return Redirect::to('edit/'.$id)->withErrors($validator)->withInput();
			  }
			  else
			  {
				   if($token == Input::get('_token'))
				   {
				   // $data = new Semester();
				    $data = Semester::find($id);
				    $data->seminame = Input::get('seminame');
				    $data->comments = Input::get('comments');       
				    if($data->save())
				    {
				     //Session::flash('message', 'Data Successfully Saved');
				     return Redirect::to('semester/show');
				    }

				  
			     }
		       }

  }



	public function store()
	{
		
    }
		/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
