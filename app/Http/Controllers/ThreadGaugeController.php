<?php

namespace App\Http\Controllers;


use App\ThreadGauge;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class ThreadGaugeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $data = ThreadGauge::all();
        return view('threadgauge.index', compact('data'));
    }

    public function store(Request $request)
    {
         ThreadGauge::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tools Created'
        ]);

    }

  
    public function edit($id)
    {
    
        $data = ThreadGauge::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        
        $input = $request->all();
        $data = ThreadGauge::findOrFail($id);
        $data->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Thread Gauge Update'
        ]);
    }

 
    public function destroy($id)
    {
        $data = ThreadGauge::findOrFail($id);
        ThreadGauge::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Products Deleted'
        ]);
    }

    public function apiThreadGauges(){
        $data = ThreadGauge::all();

        return Datatables::of($data)
            ->addColumn('action', function($data){
            if(auth()->user()->role=="admin"){
                    return 
                    '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-ok"></i> Approved</a> ' .         
                    '<a onclick="editForm('. $data->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $data->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                } else{

                    return 
                        '<a onclick="editForm('. $data->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                        '<a onclick="deleteData('. $data->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                }
            })
            ->rawColumns(['action'])->make(true);

    }
}
