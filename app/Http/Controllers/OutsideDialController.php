<?php

namespace App\Http\Controllers;


use App\OutsideDial;
use App\MasterList;
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
        //  $outsideDial = OutsideDial::create($request->all());
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
    
        $data = $request->all();
        OutsideDial::where('id', $id)->update($data);
    
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

        if ($data['disposition'] === 'approved') {
            $outsideDial = OutsideDial::findOrFail($id);
            $serialNumber = $outsideDial->serial_number;

        // Check if the serial number already exists in the MasterList records
        $existingRecord = MasterList::where('instrument_serial_number', $serialNumber)->exists();
            if(!$existingRecord){
                MasterList::create([
                    'users_id' => $outsideDial->users_id,
                    'equipment_description' => $outsideDial->tool_name,
                    'range' => $outsideDial->measuring_range,
                    'equip_control_no' => $outsideDial->report_no,
                    'inspection_method' => "QAP-WI-06",
                    'acceptance_kriteria' => "+/- 0.005",
                    'frequency' => "3 Mths",
                    'date_cal' => $outsideDial->date_cal,
                    'next_cal' => $outsideDial->next_cal,
                    'dept' => "QC",
                    'instrument_serial_number' => $outsideDial->serial_number,
                    'remark' => "Internal Calibration",
                    'status' => "active"
                ]);
            }
        }
        return redirect('/outsidedial')->with('sukses');
    }
 public function reject($id)
    {
        $data=OutsideDial::find($id);
        $data->disposition = 'reject';
        $data->save();
        return redirect('/outsidedial')->with('sukses');
    }

    public function rejectData($id)
    {
        $data = OutsideDial::find($id);
        $data->disposition = 'reject';
        $data->rejected_reason = request('rejected_reason');
        $data->save();

        return response()->json(['message' => 'Data rejected successfully']);
         // Redirect the user back to the previous page
    }


    public function apiOutsideDials(){
        $data = OutsideDial::all();
         return Datatables::of($data)
            ->addColumn('action', function($data){
            if(auth()->user()->role=="admin"){
                    return         
                   '<a href="/outsidedial/'.$data->id.'/approved" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-ok"></i> Approved</a> ' .
                   '<a href="/outsidedial/' . $data->id . '/reject" class="btn btn-danger btn-xs" onclick="rejectData(' . $data->id . ')"><i class="glyphicon glyphicon-remove"></i> Reject</a> ' .
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
