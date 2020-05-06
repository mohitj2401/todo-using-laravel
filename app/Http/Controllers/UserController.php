<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if($request->hasfile('image'))
        {   
            $filename=$request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images',$filename,'public');
            auth()->user()->update(['avtar'=>$filename]);
           
            return redirect()->back()->with('message','Image Uploaded.');
            
        }
        
        return redirect()->back()->with('error','Plz Select an image');
    }
    protected function deleteOldImage()
    {
        if(auth()->user()->avtar){
            Storage::delete('/public/images/'.auth()->user()->avtar);
        }
    }
}
