<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controllers as Controllers;
use Illuminate\Routing\Controller;

/**
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    public function sendResponse($result,$message = 'done'){
        $response=[
            "success"=>true,
            "data"=>$result,
            "message"=>$message,

        ];
        return response()->json($response,200);
    }

    public function sendError($error,$errorMessage=[],$code=404){
        $response=[
            "success"=>false,
            "data"=>$error,

        ];
        return response()->json($response,$code);
    }

}
