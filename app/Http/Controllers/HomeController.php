<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Models\ImageAnnouncement;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\GoogleVisionRemoveFaces;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    }

    public function create(Request $request){

            $uniquesecret = $request->old('uniquesecret', 
            base_convert(sha1(uniqid(mt_rand())), 16, 36 )
            );

           
            return view('announcement.create',[
                'uniquesecret'=>$uniquesecret
            ]);

            

 
    }

    public function uploadImages(Request $request){

        $uniquesecret=$request->input('uniquesecret');
        
        $fileName=$request->file('file')->store("public/temp/{$uniquesecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniquesecret}",$fileName);

        return response()->json([

            'id'=>$fileName
            
            ]
        );

    }


    public function store(AnnouncementRequest $request){
        // Auth::user()->announcements()->create([
        //     'title'=>$request->title,
        //     'price'=>$request->price,
        //     'body'=>$request->body,
        //     'category_id'=>$request->category,
        //     'uniquesecret'=>$request->uniquesecret,
            $a = new Announcement();
            $a->title = $request->input('title');
            $a->body = $request->input('body');
            $a->category_id = $request->input('category');
            $a->price = $request->input('price');
            $a->user_id = Auth::user()->id;
            $a->save();
            
           
        // dd($uniquesecret);

        $uniquesecret=$request->input('uniquesecret');
       

        $images=session()->get("images.{$uniquesecret}", []);
        $removedImages=session()->get("removedimages.{$uniquesecret}", []);
        $images=array_diff($images,$removedImages);
            // dd($images);
        foreach ($images as $image) {
            $i = new ImageAnnouncement();

            $fileName= basename($image);
            $newFileName = "public/announcements/{$a->id}/{$fileName}";

            Storage::move($image, $newFileName);

            
            $i->file = $newFileName;
            $i->announcement_id = $a->id;
            // dd($i);
            $i->save();
            
            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file,300,150),
                new ResizeImage($i->file,400,300)
            ])->dispatch($i->id);
        }
        
        File::deleteDirectory(storage_path('/app/public/temp/{$uniquesecret}'));
   
        
        return redirect('/')->with('announcement.created.success' , 'ok');
    }



    public function removeImages(Request $request){
        $uniquesecret = $request->input('uniquesecret');
        $fileName =$request->input('id');
        session()->push("removedimages.{$uniquesecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');

        

    }


    public function getImages(Request $request){

        $uniquesecret=$request->input('uniquesecret');

        $images=session()->get("images.{$uniquesecret}", []);
        $removedImages=session()->get("removedimages.{$uniquesecret}", []);

        $images=array_diff($images, $removedImages);

        $data=[];

        foreach($images as $image){
            $data[] = [
                'id'=> $image,
                'src'=> ImageAnnouncement::getUrlByFilePath($image, 120, 120)
            ];
            
        
        }

        return response()->json($data);

    }
}
