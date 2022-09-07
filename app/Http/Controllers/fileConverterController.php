<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \ConvertApi\ConvertApi;

class fileConverterController extends Controller
{
    public function index()
    {
        return view('fileUpload');
    }
    
    public function jpgAction(Request $request )
    {

        $request->validate([
            'main_file'=>'required|mimes:pdf|max:2048',
        ],[
            'main_file.image'=>'File Must Be an Image',
            'main_file.mimes'=>'Image type must be pdf',
            'main_file.max'=>'Image Size must be less then 2 mb',
        ]);


        $image = $request->main_file;

        if ($request->hasfile('main_file')) {
            $file = $request->file('main_file');
            $path = rand() . '.' . $file->getClientOriginalExtension();
            $file->move("signature/pdf/", $path);
            $image->fromt = $path;
        }

        // DD($path);

        ConvertApi::setApiSecret('zMtddsaaQZFBbc82');
            $result = ConvertApi::convert('jpg', [
                    'File' => 'signature/pdf/'.$path,
                ], 'pdf'
            );
          
        DD($result);
        $result->saveFiles('/home/supratim/php_projects/converterApp/public/signature/image/');
            


        // return view('fileUpload');
    }
}
