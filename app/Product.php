<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

// use SearchableTrait;

// protected $searchable= [

//    'columns'=>[
//       'products.productName'=> 10,
//       'products.Description'=>5,

//    ],
// ];

   protected $fillable = ['Picture', 'productName', 'Description', 'Price', 'quantity_available'];
}
