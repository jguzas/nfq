<?php


class Comments extends BaseModel  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $guarded = [];

    protected static $rules =[
        ///'title' => 'required',
        //'sDescription' => 'required',
        //'lDescription' => 'required',
        //'place' => 'required'
    ];

}