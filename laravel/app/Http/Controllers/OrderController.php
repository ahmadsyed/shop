<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserCart;
 

class OrderController extends Controller
{
    public function addToCart(Request $request){
        //todo: validate here or from independet validator
        $DatatoInsert = [];
        $inputs = $request->all() ;
        $user_id = $request->user()->id;
        foreach($inputs['items'] as $item){
            //dd($item['title']);
            $data = [];
            $data['title'] = $item['title'];
            $data['price'] = $item['price'];
            $data['user_id'] = $user_id;
            $data['img_path'] = $item['image'];
            $DatatoInsert[] = $data;
        }
        UserCart::insert($DatatoInsert);
        return response()->json(['status' => '200', 'msg' => 'success']);
    }

    public function getCartItems(Request $request){
        return UserCart::where('user_id',$request->user()->id)->get();
    }
    public function buy(Request $request){
        return UserCart::where('user_id',$request->user()->id)->delete();
    }
}
