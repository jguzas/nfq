<?php

class AlbumsController extends BaseController {

    protected $layout = 'layout';

	/**
	 * Display a listing of the resource.
	 * SELECT * FROM albums
     * SELECT * FROM albums WHERE public=1
	 * @return Response
	 */
	public function index()
	{
        if(Auth::check()){
            $albums = Albums::all();
            $this->layout->content = View::make('albums/index', compact('albums'));
        } else {
            $albums = Albums::where('public', '=', 1)->get();
            $this->layout->content = View::make('albums/indexpublic', compact('albums'));
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('albums/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
     * INSERT INTO albums VALUES ()
	 * @return Response
	 */
	public function store()
	{
		$post = new Albums(Input::all());
        $post->user_id=Auth::user()->id;

        if ($post->save()){
            return Redirect::route('albums.index');
        }

        return Redirect::back()->withInput()->withErrors($post->errors);

	}

	/**
	 * Display the specified resource.
	 *
	 * SELECT * FROM albums WHERE id=$id
     * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $album = Albums::find($id);
        $this->layout->content=View::make('albums/show', compact('album'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
     * SELECT * FROM albums WHERE id=$id
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $album = Albums::find($id);
        $this->layout->content = View::make('albums/edit', compact('album'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * UPDATE Albums SET 'title'=title, 's_description'=s_description, 'l_description'=l_description,
     *                   'place'=place, 'public'=public
     *              WHERE id=$id
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $post = Albums::find($id);
        $post->title = Input::get('title');
        $post->s_description = Input::get('s_description');
        $post->l_description = Input::get('l_description');
        $post->place = Input::get('place');
        $post->public = Input::get('public');


        if ($post->save()){
            return Redirect::route('albums.index');
        }

        return Redirect::back()->withInput()->withErrors($post->errors);
	}

	/**
	 * Remove the specified resource from storage.
	 *
     * DELETE FROM albums WHERE id=$id
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $post = Albums::find($id);
        $post->delete();

        return Redirect::route('albums.index');
	}

    /**
     * Display list of public albums
     *
     * @return Response
     */
    public function publicAlbums(){

        $photos = Albums::with('photos')->where('public', '=','1')->get();
        $this->layout->content=View::make('photos/indexpublic', compact('photos'));
    }
}