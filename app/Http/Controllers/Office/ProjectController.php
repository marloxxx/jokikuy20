<?php

namespace App\Http\Controllers\Office;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
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
            $collection = Project::where('nama_project','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.office.project.list',compact('collection'));
        }
        return view('pages.office.project.main');
    }

    
    public function create()
    {
        return view('pages.office.project.input',['data'=>new Project()]);
    }

    
    public function store(Request $request)
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
            }elseif ($errors->has('tugas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tugas'),
                ]);
            }
        }
        $file = request()->file('image_project')->store('project');
        $recap = new Project;
        $recap->nama_project = $request->nama;
        $recap->deskripsi_project = $request->tugas;
        $recap->image = $file;
        $recap->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $recap->nama_project . ' tersimpan',
        ]);
    }

    
    public function show(Project $project)
    {
        //
    }

    
    public function edit(Project $project)
    {
        return view('pages.office.project.input',['data'=>$project]);
    }

    
    public function update(Request $request, Project $project)
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
            }elseif ($errors->has('tugas')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tugas'),
                ]);
            }
        }
        if($request->hasFile('image')){
            Storage::delete($project->image_product);
            $file = request()->file('image_project')->store('project');
            $project->nama_project = $request->nama;
            $project->deskripsi_project = $request->tugas;
            $project->image = $file;
            $project->update();
        }else{
            $project->nama_project = $request->nama;
            $project->deskripsi_project = $request->tugas;
            $project->update();
        }


        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $project->nama_project . ' tersimpan',
        ]);
    }

    
    public function destroy(Project $project)
    {
        Storage::delete($project->image);
        $project->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $project->nama_project . ' terhapus',
        ]);
    }
}