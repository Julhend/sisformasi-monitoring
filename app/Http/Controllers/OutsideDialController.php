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

    public function approved($id)
    {
        $data=OutsideDial::find($id);
        $data->disposition = 'approved';
        $data->approved_by = auth()->user()->name;
        $data->save();
        return redirect('/outsidedial')->with('sukses');
    }
 public function reject($id)
    {
        $data=OutsideDial::find($id);
        $data->disposition = 'reject';
        $data->save();
        return redirect('/outsidedial')->with('sukses');
    }


    public function apiOutsideDials(){
        $data = OutsideDial::all();
         return Datatables::of($data)
            ->addColumn('action', function($data){
            if(auth()->user()->role=="admin"){
                    return         
                   '<a href="/outsidedial/'.$data->id.'/approved" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-ok"></i> Approved</a> ' .
                   '<a href="/outsidedial/'.$data->id.'/reject" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Reject</a> ' .
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
