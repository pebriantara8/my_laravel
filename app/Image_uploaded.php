<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Image_uploaded;
use Carbon\Carbon;
use Image;
use File;

class Image_uploaded extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artikel';
    
    protected $guarded = []; //tambahkan baris ini

    
    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = 'files/artikel/image/';
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['500'];
        ini_set('memory_limit','256M');

    }
    

    //     'is_update' => TRUE,
    //     'name_input' => 'file',
    //     'allowed_types' => 'gif|jpg|png',
    //     'old_file' => 'file',
    //     'path' => './public/post_file/',
    //     'path_thumb' => './public/post_file/thumb/',

    //     'create_thumb' => TRUE,
    //     'height' => '200',
    //     'width' => '400',
    //     'crop' => TRUE,
    public function upload(Request $req)
    {
        $name_input = $pr['name_input'];
        $update = $pr['is_update'];
        $path = $pr['path'];
        $create_thumb = $pr['create_thumb'];
        $path_thumb = $pr['path_thumb'];
        $crop = $pr['crop'];
        $dimension_w = $pr['width'];
        $dimension_h = $pr['height'];

        $this->validate($req, [
            $name_input => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $file = $req->file($name_input);
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // upload origin image
        Image::make($file)->save($path . $fileName);
        
        // // resize image
        // $resizeImage  = Image::make($file)->fit($dimension_w, $dimension_h);
        // if (!File::isDirectory($path . '/' . 'thumb')) {
        //     //MAKA BUAT FOLDER DENGAN NAMA DIMENSI
        //     File::makeDirectory($path . '/' . 'thumb');
        // }
        // $resizeImage->save($path . '/' . 'thumb' . '/' . $fileName);
    }
}
