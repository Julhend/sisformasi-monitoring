<?php

namespace App\Http\Controllers;


use App\OutsideDial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class OutsideDialController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        $data = OutsideDial::all();
        return view('outsidedial.index', compact('data'));
    }

    public function store(Request $request)
    {
         OutsideDial::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tools Created'
        ]);

    }

  
    public function edit($id)
    {
    
        $data = OutsideDial::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        
        $input = $request->all();
        $data = OutsideDial::findOrFail($id);
        $data->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Thread Gauge Update'
        ]);
    }

 
    public function destroy($id)
    {
        $data = OutsideDial::findOrFail($id);
        OutsideDial::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Products Deleted'
        ]);
    }

    public function apiOutsideDials(){
        $data = OutsideDial::all();

        return Datatables::of($data)
            ->addColumn('action', function($data){
                return '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ' .
                    '<a onclick="editForm('. $data->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $data->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);

    }
}
