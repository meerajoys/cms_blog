<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    //

    public function upload(Request $request){



        if ($request-> hasFile('upload')){

            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('ckimages'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('ckimages/'. $fileName);
            $msg = "Image successfully uploaded";
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg') </script>";

            @header('Content-type: text/html; charset=utf8');
            echo $response;
        }
    }

    // public function show(Request $request){

    //     $data = $request->input('body');

    //     preg_match_all('/<img[^>]+>/i', $data, $result);

    //     foreach ($result as $img_tag) {
    //        echo $img_tag;
    //     }
    //     return view('blog-post', ['post'=>$post]);
    // }


}
