<?php

namespace App\Http\Controllers\Office;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
            $collection = Order::where('nama','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.office.order.list',compact('collection'));
        }
        return view('pages.office.order.main');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Order $order)
    {
        //
    }

    
    public function edit(Order $order)
    {
        //
    }

    
    public function update(Request $request, Order $order)
    {
        //
    }

    
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json([
            'alert' => 'success',
            'message' => ' '. $order->nama . ' terhapus',
        ]);
    }
}