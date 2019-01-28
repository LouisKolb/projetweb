<?php

namespace App\Http\Controllers;

use App\picture;
use App\user;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Path = public_path('image_site.zip');
        \Zipper::make($Path)->extractTo('Appdividend');
        $pictures= picture::get();
        return view('picture.all',compact('pictures'));
    }








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = glob(public_path('storage/pictures/*'));
        \Zipper::make(public_path('storage/image_site.zip'))->add($files)->close();
        return response()->download(public_path('storage/image_site.zip'))->deleteFileAfterSend(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(picture $picture)
    {
        return view('picture.show',compact('picture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(picture $picture)
    {
        //
    }

    public function download()
    {
      if(session()->has('user'))
      {
        $user = user::find(session()->get('user')[0]);

        if ($user->hasRole('admin') || $user->hasRole('tutor'))
        {
          $files = glob(public_path('storage/pictures/*'));
          \Zipper::make(public_path('storage/image_site.zip'))->add($files)->close();
          return response()->download(public_path('storage/image_site.zip'))->deleteFileAfterSend(true);
        }
      }

      return redirect('/picture');



    }




    public function like($pictureid){
        

            if(session()->has('user')){
                $user = user::find(session()->get('user')[0]);
    
                if($user->haveLikedPicture($pictureid)){
                    $user->unLikePicture($pictureid);
                }else{
    
                    $user->LikePicture($pictureid);
                }
                return response()->json(picture::find($pictureid)->likeCount());
            }
    
    
            return redirect()->back();
        }
        

        public function signal($pictureid){
            $connected = false;
            if(session()->has('user')){
                $user = user::find(session()->get('user')[0]);
                if($user->hasRole('Admin')){
                    $picture = picture::find($pictureid);
                    $picture->signal();
                    echo "L'image a ete signalé";

                }
            }
            
            
            
            
        }
    

}
