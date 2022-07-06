<?php

namespace App\Http\Controllers\Office;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
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
            $collection = Skill::where('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.office.skill.list',compact('collection'));
        }
        return view('pages.office.skill.main');
    }

    
    public function create()
    {
        return view('pages.office.skill.input',['data'=>new Skill()]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'image_project' => 'required',  
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('image_project')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image_project'),
                ]);
            }
        }
        $file = request()->file('image_project')->store('skill');
        $recap = new Skill;
        $recap->name = $request->nama;
        $recap->image = $file;
        $recap->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $recap->name . ' tersimpan',
        ]);
    }

    
    public function show(Skill $skill)
    {
        //
    }

    
    public function edit(Skill $skill)
    {
        return view('pages.office.skill.input',['data'=>$skill]);
    }

    
    public function update(Request $request, Skill $skill)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'image_project' => 'required',
            'tugas' => 'required',        
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama'),
                ]);
            }elseif ($errors->has('image_project')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image_project'),
                ]);
            }
        }
        if($request->hasFile('image')){
            Storage::delete($skill->image_product);
            $file = request()->file('image_project')->store('Skill');
            $skill->name = $request->nama;
            $skill->image = $file;
            $skill->update();
        }else{
            $skill->name = $request->nama;
            $skill->update();
        }


        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $skill->name . ' tersimpan',
        ]);
    }

    
    public function destroy(Skill $skill)
    {
        Storage::delete($skill->image);
        $skill->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $skill->name . ' terhapus',
        ]);
    }
}