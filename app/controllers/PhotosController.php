<?php

class PhotosController extends BaseController {

    protected $layout = 'layout';

    /**
     * Display a listing of the resource.
     *
     * SELECT * FROM photos WHERE album_id=$album_id
     * @param $album_id
     * @return mixed
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
     * SELECT * FROM albums WHERE id=$album_id AND user_id=$id
     * DELETE FROM photos WHERE id=$photo_id
     * @param $album_id
     * @param $photo_id
     * @return mixed
     */
    public function destroy($album_id, $photo_id)
	{

        if( Albums::where('id','=',$album_id)->where('user_id','=' ,Auth::user()->id)->count()==1){


        $post = Photos::find($photo_id);
        $post->delete();
        }
        return Redirect::route('albums.photos.index',['albums' => $album_id]);
	}

    /**
     * Upload photos
     *
     * INSERT INTO photos VALUES ()
     * @param $id
     * @return mixed
     */
    public function postUpload($id){

        $file = Input::file('file');

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
        $photo->favourites = 0;
        $photo->path = $filename;
        $photo->save();


        if( $upload_success ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }

}