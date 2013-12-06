<?php


class Photos extends BaseModel  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function albums()
    {
        return $this->belongsTo('Albums');
    }

    protected $guarded = [];


    protected static $rules =[
        //'title' => 'required',
        //'sDescription' => 'required',
        //'lDescription' => 'required',
        //'place' => 'required'
    ];

}