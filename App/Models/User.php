<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    protected $table = 'users';

    public $timestamps = false;

    public $primaryKey = 'u_id';
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

    public function __construct()
    {
        // echo "Model loaded";
    }

    
    protected $fillable = [

        'name', 'email', 'password', 'userimage',

    ];

    protected $hidden = [

        'password', 'remember_token',

    ];


    // public function todo()
    // {
    //     return $this->hasMany('Todo');

    // }

}
