<?php

namespace App\Models;

use App\Models\Scroll as ModelsScroll;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'formId',
        'description',
        'header',
        'offer',
        'imagepath',
        'html',
        'typeScroll',
        'name'  
    ];
    public static function NametoId ($name)
    {
        $scroll=Scroll::where('name',$name)->first();
        return $scroll->id;
    }
}
