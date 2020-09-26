<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Router;
 

class RouterController extends Controller
{
    //add new router via UI
    public function addRouter(Request $request){
        //validate all data for format and unique I have validated mac address only
        $validatedData = $request->validate([
            'mac_address' => 'regex:["/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/"]|required|unique:routers|max:255'
        ]);
        if($validatedData){
            try{
                Router::create($request->all());
                return response()->json(['status' => '200', 'msg' => 'success']);
            }catch(\Exception $e){
                //todo:Rollback db here
                dd($e);
                return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
            }
        }else{
            return response()->json(['status' => '500', 'msg' => 'wrong mac format']);
        }
        
    }

    //get router via hostid
    public function getRouter(Request $request){
        try{
            return Router::where('hostid',$request->input('hostid'))->first();
        }catch(\Exception $e){
            //todo:Rollback db here
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
    }

    //update router via hostid
    public function updateRouter(Request $request){
        //Todo:: validate if new mac is not assigned any where
        try{
            return Router::where('hostid',$request->input('hostid'))->update(['mac_address',$request->input('mac_address')]);
        }catch(\Exception $e){
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
    }

    //softdelete router via hostid
    public function deleteRouter(Request $request){
        try{
            return Router::where('hostid',$request->input('hostid'))->delete(); //soft delete is implimented in the model , so will update deleted_at 
        }catch(\Exception $e){
            return response()->json(['status' => '500', 'msg' => 'somthing went wrong']);
        }
    }
}
