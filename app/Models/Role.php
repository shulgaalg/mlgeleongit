<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'permissions'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'permissions'=>'array'
    ];  
    
    public function users(){
        return $this->belongsToMany(User ::class,'role_user','roleId','userId');
    }

    public function hasAccess(array $permissions):bool{
        foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;    
            }
        }
        return false;
    }
    public function hasPermission($permission):bool
    {
        return $this->permissions[$permission]??false;
    }

  

}
