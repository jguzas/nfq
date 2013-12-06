<?php

class AlbumsController extends BaseController {

    protected $layout = 'layout';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if(Auth::check()){
            $albums = Albums::where('user_id', '=', Auth::user()->id)->get();
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $post = Albums::find($id);
        $post->delete();

        return Redirect::route('albums.index');
	}


    public function publicAlbums(){
        //$photos = Albums::where('public', '=', '1')->get();
        //$photos = Albums::has('photos')->where('public', '=', 1)->get();
        //$photos = Albums::with(array('photos' => function($query)
        //    {
       //         $query->where('public', '1');
       //     }))->get();

        $photos = Albums::with('photos')->where('public', '=','1')->get();
        $this->layout->content=View::make('photos/indexpublic', compact('photos'));
    }
}