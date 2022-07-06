<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Skill;
use App\Models\Project;
use App\Mail\RequestMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Project::where('nama_project', 'like', '%' . $keywords . '%')
                ->paginate(10);
            return view('pages.landing.list', compact('collection'));
        }
        $skil = Skill::get();
        $project = Project::get();
        return view('pages.landing.main', compact('skil', 'project'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'services' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            } elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            } elseif ($errors->has('services')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('services'),
                ]);
            } elseif ($errors->has('message')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('message'),
                ]);
            }
        }
        $order = new Order;
        $order->nama = $request->name;
        $order->email = $request->email;
        $order->no_hp = $request->phone;
        $order->services = $request->services;
        $order->deskripsi = $request->message;
        $order->save();

        Mail::to($request->email)->send(new RequestMail($order));

        return response()->json([
            'alert' => 'success',
            'message' => 'Email ' . $order->nama . ' Terkirim',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
