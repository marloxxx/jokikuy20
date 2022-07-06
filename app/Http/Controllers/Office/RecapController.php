<?php

namespace App\Http\Controllers\Office;

use App\Models\Recap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RecapController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next) {
            $role = Auth::user()->role;
            if($role != 'admin'){
                abort(403);
            }
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Recap::where('nama_pelanggan','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.office.recap.list',compact('collection'));
        }
        return view('pages.office.recap.main');
    }

    
    public function create()
    {
        return view('pages.office.recap.input',['data'=>new Recap()]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tugas' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',          
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('tugas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tugas'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            }
        }
        $recap = new Recap;
        $recap->nama_pelanggan = $request->nama;
        $recap->nama_tugas = $request->tugas;
        $recap->deskripsi_tugas = $request->deskripsi;
        $recap->harga = $request->harga;
        $recap->status = 'Sedang Diproses';
        $recap->save();
        return response()->json([
            'alert' => 'success',
            'message' => ' '. $recap->nama_pelanggan . ' tersimpan',
        ]);
    }

    
    public function show(Recap $recap)
    {
        //
    }

    
    public function edit(Recap $recap)
    {
        return view('pages.office.recap.input',['data'=>$recap]);
    }

    
    public function update(Request $request, Recap $recap)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'tugas' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',          
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('tugas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tugas'),
                ]);
            }elseif ($errors->has('deskripsi')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('deskripsi'),
                ]);
            }elseif ($errors->has('harga')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('harga'),
                ]);
            }
        }
        $recap->nama_pelanggan = $request->nama;
        $recap->nama_tugas = $request->tugas;
        $recap->deskripsi_tugas = $request->deskripsi;
        $recap->harga = $request->harga;
        $recap->update();
        return response()->json([
            'alert' => 'success',
            'message' => ' '. $recap->nama_pelanggan . ' tersimpan',
        ]);
    }

    
    public function destroy(Recap $recap)
    {
        $recap->delete();
        return response()->json([
            'alert' => 'success',
            'message' => ' '. $recap->nama_pelanggan . ' terhapus',
        ]);
    }

    public function selesai(Recap $recap)
    {
        $recap->status = 'Selesai';
        $recap->update();
        return response()->json([
            'alert' => 'success',
            'message' => ' '. $recap->nama_pelanggan . ' selesai',
        ]);
    }
}