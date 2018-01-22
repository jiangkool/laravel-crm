<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','slug','permissions'
    ];

    public function user()
    {
    	return $this->hasMany(User::class); 
    }

    public static function getAllRoles()
    {
    	return self::where('id','>',1)->get();
    }

}
