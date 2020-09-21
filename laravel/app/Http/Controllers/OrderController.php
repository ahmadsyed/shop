<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\UserCart;
 

class OrderController extends Controller
{
    //to take order details and save them for buying 
    public function addToCart(Request $request){
        //todo: validate here or from independet validator
        try{
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
        }catch(\Exception $e){
            //todo:Rollback db here
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
        
    }
    //to fetch items in cart , if no values handling in React
    public function getCartItems(Request $request){
        try{
            return UserCart::where('user_id',$request->user()->id)->get();
        }catch(\Exception $e){
            //todo:Rollback db here
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
    }
    //if clicked on buy ideally items should be added inside orders table(out of scope for now)
    //hence just deleting (soft-deletes),to clear the cart,response is handeled in React.
    public function buy(Request $request){
        try{
            return UserCart::where('user_id',$request->user()->id)->delete();
        }catch(\Exception $e){
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
    }
}
