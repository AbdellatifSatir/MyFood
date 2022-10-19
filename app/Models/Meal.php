<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Meal extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'title','description','image','category','price' ];
    protected $guarded = [];

    /*
     * Guarded is the reverse of fillable. 
     * If fillable specifies which fields to be mass assigned, 
     * guarded specifies which fields are not mass assignable.
     */

}
