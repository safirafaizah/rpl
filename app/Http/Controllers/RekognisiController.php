<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use App\Models\MataKuliah;
use App\Models\Data;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;


class RekognisiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [ 
                'mata_kuliah'=> ['required'],
                'dokumen' => ['required', 'mimes:pdf,doc,docx','max:2048']
            ]);
            $dokName = null;
            if(isset($request->dokumen)){
                $dokName = Carbon::now()->format('YmdHis').'_'.Auth::user()->id.'.'.$request->dokumen->extension(); 
                $folderName =  "dokumen/rekognisi";
                $path = public_path()."/".$folderName;
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0755, true); //create folder
                }
                $request->dokumen->move($path, $dokName); //upload image to folder
                $dokName=$folderName."/".$dokName;
            }
            // dd($request);
            $data = Data::create([
                'id_status'     => 'M',
                'id_user'       => Auth::user()->id,
                'id_mk'         => $request->mata_kuliah,
                'dokumen'       => $dokName
            ]);
            if($data){
                return redirect()->route('rekognisi.index')->with('msg','Data berhasil ditambahkan');
            }else{
                return redirect()->route('rekognisi.index')->with('msg','Data gagal ditambahkan');
            }
           
        }else{
            $mata_kuliah     = MataKuliah::orderBy('id')->get();
            return view('rekognisi.index', compact('mata_kuliah'));
        }       
    }

    public function data(Request $request)
    {
        $data = Data::where("id_user", Auth::user()->id)
        ->with('mata_kuliah')
        ->with('user')
        ->with('status')
                ->select('*')->orderByDesc("updated_at");
            return Datatables::of($data)
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('mata_kuliah'))) {
                            $instance->where('id_mk', $request->get('mata_kuliah'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->whereHas('mata_kuliah', function($q) use($request){
                                $search = $request->get('search');
                                $q->where('mata_kuliah', 'LIKE', "%$search%");
                            });
                        }

                    })
                    ->addColumn('idd', function($x){
                        return Crypt::encrypt($x['id']);
                      })
                    ->rawColumns(['idd'])
                    ->make(true);
    }


}
