<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserCart;
 

class OrderController extends Controller
{
    public function addToCart(Request $request){
        $DatatoInsert = [];
        $inputs = $request->all() ;
        $user_id = $request->user()->id;
        foreach($inputs['items'] as $item){
            //dd($item['title']);
            $data = [];
            $data['title'] = $item['title'];
            $data['price'] = $item['price'];
            $data['user_id'] = $user_id;
            $DatatoInsert[] = $data;
        }
        //dd($DatatoInsert);
        UserCart::insert($DatatoInsert);
    }
}
