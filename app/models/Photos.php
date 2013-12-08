<?php


class Photos extends BaseModel  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';


    public function albums()
    {
        return $this->belongsTo('Albums');
    }

    protected $guarded = [];


    protected static $rules =[

    ];

}