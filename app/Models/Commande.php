<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class Commande extends Model
{
    use HasFactory;
    
    protected $fillable = ['cartId','ClientId','ClientName','title','quantity','total','address','note','status'];
}
