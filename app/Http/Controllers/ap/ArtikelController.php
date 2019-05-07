<?php

namespace App\Http\Controllers\ap;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use App\Artikel;
use App\Image_uploaded;
use Carbon\Carbon;
use Image;
use File;

class ArtikelController extends Controller
{
    
    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = 'files/artikel/image/';
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['500'];
    }
    
    public function index()
    {
        $value = '1';
        $artikel = Artikel::with(['user'])
        // ->whereHas('user', function($q) use ($value) {
        //     $q->where('id','=',$value);
        // })
        ->orderBy('created_at','desc')
        ->Paginate(3);
        // die(var_dump($artikel[0]['user']['name']));
        return view('admin/artikel/index',['artikel'=>$artikel]);
    }

    public function add()
    {
        return view('admin/artikel/add');
    }

    public function edit($id)
    {
        $posts = Artikel::where('id',$id)->first();
        return view('admin/artikel/add',['artikel'=>$posts]);
    }

    public function save(Request $req)
    {
        if(isset($req->id)==''){
            $this->validate($req, [
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ]);
    
            $file = $req->file('image');
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // upload origin image
            Image::make($file)->save($this->path . $fileName);
            
            // resize image
            $resizeImage  = Image::make($file)->fit(500, 333);
            if (!File::isDirectory($this->path . '/' . '500')) {
                //MAKA BUAT FOLDER DENGAN NAMA DIMENSI
                File::makeDirectory($this->path . '/' . '500');
            }
            $resizeImage->save($this->path . '/' . '500' . '/' . $fileName);

            $artikel = new Artikel;
            $artikel->judul = $req->judul;
            $artikel->konten = $req->konten;
            $artikel->cover = $fileName;
            $artikel->user_id = "1";
            $artikel->artikel_kategori_id = "1";
            $artikel->save();
        }else{
            $this->validate($req, [
                'image' => 'required|image|mimes:jpg,png,jpeg'
            ],[
                'image' => 'Gambar tidak boleh kosong'
            ]);
            
            $file = $req->file('image');
            // die($file);
            // exit;
            $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // upload origin image
            Image::make($file)->save($this->path . $fileName);
            
            // resize image
            $resizeImage  = Image::make($file)->fit(500, 333);
            if (!File::isDirectory($this->path . '/' . '500')) {
                //MAKA BUAT FOLDER DENGAN NAMA DIMENSI
                File::makeDirectory($this->path . '/' . '500');
            }
            $resizeImage->save($this->path . '/' . '500' . '/' . $fileName);

            $artikel = Artikel::find($req->id);
            $artikel->judul = $req->judul;
            $artikel->konten = $req->konten;
            $artikel->cover = $fileName;
            $artikel->user_id = "1";
            $artikel->save();
            return back()->with(['success' => 'Record has been succesfully updated']);
        }

        return redirect('/ap/artikel')->with(['success' => 'Record has been succesfully added']);
    }

    public function view($id)
    {
        $posts = Artikel::where('id',$id)->first();
        return view('admin/artikel/add',['artikel'=>$posts,'only_view'=>true]);
    }

    public function delete($id)
    {
        $artikel = Artikel::withTrashed()->find($id);
        $artikel->delete();
        return back()->with(['success' => 'Record has been succesfully deleted']);
    }

    public function resotre($id)
    {
        $artikel = Artikel::withTrashed()->find($id);
        $artikel->restore();
        return back()->with(['success' => 'Record has been succesfully retore']);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $file = $request->file('image');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // upload origin image
        Image::make($file)->save($this->path . '/' . $fileName);
        
        // resize image
        $resizeImage  = Image::make($file)->fit(500, 333);
        if (!File::isDirectory($this->path . '/' . '500')) {
            //MAKA BUAT FOLDER DENGAN NAMA DIMENSI
            File::makeDirectory($this->path . '/' . '500');
        }
        $resizeImage->save($this->path . '/' . '500' . '/' . $fileName);

        // SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
        // $fileName
    }

}
