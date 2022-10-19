<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class RekognisiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function rekognisi(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [ 
                'mata_kuliah'=> ['required'],
                'dokumen' => ['required', 'mimes:pdf,doc,docx','max:2048']
            ]);
            $dokName = null;
            if(isset($request->dokumen)){
                $dokName = Carbon::now()->format('YmdHis').'_'.md5(Auth::user()->id).'.'.$request->dokumen->extension(); 
                $folderName =  "dokumen/rekognisi";
                $path = public_path()."/".$folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $request->dokumen->move($path, $dokName); //upload image to folder
                $dokName=$folderName."/".$dokName;
            }
            
            $data = Data::create([
               
                'id_jadwal'     => $request->jadwal,
                'id_status'     => $request->kegiatan,
                'dokumen' => $dokName
            ]);
            if($data){
                return redirect()->route('rekognisi')->with('msg','Data berhasil ditambahkan');
            }else{
                return redirect()->route('rekognisi')->with('msg','Data gagal ditambahkan');
            }
           
        }else{
            $data = "";
            return view('rekognisi.index', compact('data'));
        }
            
    }

}
