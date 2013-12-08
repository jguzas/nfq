<?php


class Albums extends BaseModel  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'albums';

    public function photos()
    {
        return $this->hasMany('Photos', 'album_id');
    }

    public function users()
    {
        return $this->belongsTo('Users');
    }

    protected $guarded = [];

    protected static $rules =[
        'title' => 'required',
        's_description' => 'required',
        'l_description' => 'required',
        'place' => 'required'
    ];

}