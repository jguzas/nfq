<?php

class FavouritesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        // First we fetch the Request instance
        $request = Request::instance();

        // Now we can get the content from it
        $content = $request->getContent();
        $photo_id = substr($content, 3);


        $favourites = Favourites::where('photo_id','=',$photo_id)->where('user_id','=',Auth::user()->id)->count();
        if($favourites==0){

            $favourite = new Favourites;
            $favourite->user_id = Auth::user()->id;
            $favourite->photo_id = $photo_id;
            $favourite->save();

            $photo = Photos::find($photo_id);
            $photo->favourites = $photo->favourites+1;
            $photo->save();

            $like = Photos::find($photo_id);
            return "<button class=\"btn btn-success btn-xs\">Patinka: ".$like->favourites."</button>";

        } else {

            $like = Photos::find($photo_id);
            return "<button class=\"btn btn-success btn-xs\">Patinka: ".$like->favourites."</button>";
        }

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
	public function destroy($id)
	{
		//
	}

}