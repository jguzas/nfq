<?php

class PhotosController extends BaseController {

    protected $layout = 'layout';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($album_id)
	{
        $albums = Albums::find($album_id);

        if(Auth::check()){
            $photos = Photos::where('album_id', '=', $album_id)->get();
            $this->layout->content=View::make('photos/index', compact('photos','albums'));
        } elseif($albums->public==1){
            $photos = Photos::where('album_id', '=', $album_id)->get();
            $this->layout->content=View::make('photos/index', compact('photos', 'albums'));
        } else {
            return Redirect::to('login');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $this->layout->content = View::make('photos/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //
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
	public function destroy($album_id, $photo_id)
	{
        $post = Photos::find($photo_id);
        $post->delete();

        return Redirect::route('albums.photos.index',['albums' => $album_id]);
	}


    public function postUpload($id){

        $file = Input::file('file');
       var_dump($id);
//        return Response::json($a);

        $destinationPath = 'uploads/';
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

       $fileSaved = false;

        while(!$fileSaved){

            $filename = md5($filename).'.'.$extension;
            if(!file_exists($destinationPath.$filename))
            {
                $upload_success = Input::file('file')->move($destinationPath, $filename);
                $fileSaved = true;

            }

        }

        $photo = new Photos;


        $photo->album_id = $id;
        //$photo->title ='a';
       // $photo->description ='a';
        //$photo->lDescription ='a';
        //$photo->place='a';
        $photo->path = $filename;
        $photo->save();

        var_dump($photo);
        //$upload_success = Input::file('file')->move($destinationPath, $filename);
        //$post->title = Input::get('title');
        // $post->sDescription = Input::get('sDescription');
        //$post->lDescription = Input::get('lDescription');
        //$post->place = Input::get('place');

        if( $upload_success ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }


    }


}