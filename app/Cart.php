<?php

namespace App;
use App\Product;
use DB;



class Cart
{
   public $items = null;
   public $totalQty = 0;
   public $totalPrice = 0;

   public function __construct($oldCart) {

       if ($oldCart) { 
           $this->items = $oldCart->items;
           $this->totalQty = $oldCart->totalQty;
           $this->totalPrice = $oldCart->totalPrice;
       }
   }

   public function add( $item, $id){
    $product = Product::find($id);
       $storedItem = ['qty'=>0, 'price'=>$item->Price, 'item'=>$item];
       if ($this->items) {
           if (array_key_exists($id, $this->items)) {
               $storedItem = $this->items[$id];
           }
       }
       $storedItem['qty']++;
       $storedItem['price'] = $item->Price * $storedItem['qty'];
       $this->items[$id] = $storedItem;
       $this->totalQty++;
       $this->totalPrice += $item->Price;
   
   }
}
?>
