<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  
use App\User;
use Validator; 

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	$validator = Validator::make($request->all(), [ 
      		'name' => 'required', 
      		'email' => 'required|email|unique:users', 
      		'password' => 'required'      
    	]);
    	if ($validator->fails()) { 
      		return response()->json([
      			'error'=> true,
      			'message' => "Hibas adatok",      			
      		]);
    	} 
        
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'error'=>false,
            'message' => 'Registered successfully!',
            ]
        ]);
	}

	public function login(Request $request)
    {
      	$validator = Validator::make($request->all(), [       	
      		'email' => 'required|email', 
      		'password' => 'required'      
    	]);
    	if ($validator->fails()) { 
      		return response()->json([
      			'error'=> true,
      			'message' => "Hibas adatok",      			
      		]);
    	} 
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                    'error'=>true,
            		'message' => 'Unauthorized!'            		
            ]);
 
        return response()->json([
            'error'=>false,
            'message' => 'Login successfully!'            
        ]);
    }

}
