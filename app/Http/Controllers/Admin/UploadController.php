<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
	public function __construct()
	{
		$this->middleWare('auth')->except('showUpload');
	}

    public function showUpload()
    {
    	return view('upload');
    }

    public function uploadFiles(Request $request)
    {
    	//get upload http post
    	$post=$request->all();

    	// VALIDATION RULES
    	$rules = [
            'file' => 'mimes:jpeg,bmp,png,pdf|max:3000',
       ];

        // PASS THE INPUT AND RULES INTO THE VALIDATOR
        $validation=\Validator::make($post,$rules);
    	
        //if validation is fails
        if($validation->fails()){
        	return redirect('upload')->with('errors',$validation->errors());
        }

        //get file handle
        $file = $request->file;
        
        //set upload path
        $path='uploads';

        //get file ext
        $ext = $file->getClientOriginalExtension();

        //rename file
        $fileName= mt_rand(1,99999).'.'.$ext;

    	//save this file
    	$newFile=$file->move($path,$fileName);

    	//show success to blade
    	if ($newFile) {
    		return redirect('upload')->with('message', 'Image uploaded successfully');
    	}
    }
}
