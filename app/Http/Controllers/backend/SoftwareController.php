<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Software;

class SoftwareController extends Controller
{
    //software management
    public function getSoftwares()
    {
        $softwares=Software::all();

        return $softwares;
    }
    public function updateSoftware($sof_id, $name, $description){
       if($name == "-") {
            $name = NULL;
        }
        if($description == "-") {
            $description = NULL;
        }
        
        Software::where('sof_id', $sof_id)->update(array('sof_name' => $name,'sof_description' => $description));

        return response()->json(['message'=>'Software have been updated successfully !!']);

    }

    public function statusSoftware($sof_id){    
        $currentSoftware=Software::where('sof_id', $sof_id)->first();

        if($currentSoftware->sof_status== "0")
        {
        	Software::where('sof_id', $sof_id)->update(['sof_status' => "1"]);
        	return response()->json(['message'=>'Software have been updated successfully !!']);
        }
        if($currentSoftware->sof_status== "1")
        {
        	Software::where('sof_id', $sof_id)->update(['sof_status' => "0"]);
        	return response()->json(['message'=>'Software have been updated successfully !!']);
        }   
    }

    public function deleteSoftware($sof_id){
      
       Software::where('sof_id',$sof_id)->delete();
       return response()->json(['message'=>'Software have been deleted successfully !!']);
    }

}
