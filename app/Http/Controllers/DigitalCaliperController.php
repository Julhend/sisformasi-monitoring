<?php

namespace App\Http\Controllers;


use App\DigitalCaliper;
use App\MasterList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class DigitalCaliperController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        // $category = Category::orderBy('name','ASC')
        //     ->get()
        //     ->pluck('name','id');

        $data = DigitalCaliper::all();
        return view('digitalcaliper.index', compact('data'));
    }

    public function store(Request $request)
    {

        $this->validate($request , [
            'tool_name'          => 'required',
            'serial_number'         => 'required',
            'measuring_range'           => 'required',
            'report_no'         => 'required',
            'date_cal'   => 'required',
            'next_cal'   => 'required',
            'measured_value1'   => 'required',
            'measured_value2'   => 'required',
            'measured_value3'   => 'required',
            'measured_value4'   => 'required',
            'measured_value5'   => 'required',
            'measured_value6'   => 'required',
            'measured_value7'   => 'required',
            'measured_value8'   => 'required',
            'measured_value9'   => 'required',
            'measured_value10'   => 'required',
            'measured_value11'   => 'required',
            'measured_value12'   => 'required',
            'error1'   => 'required',
            'error2'   => 'required',
            'error3'   => 'required',
            'error4'   => 'required',
            'error5'   => 'required',
            'error6'   => 'required',
            'error7'   => 'required',
            'error8'   => 'required',
            'error9'   => 'required',
            'error10'   => 'required',
            'error11'   => 'required',
            'error12'   => 'required',
        ]);
  
              $data = new DigitalCaliper();
              $data-> tool_name  = $request->input('tool_name');
              $data-> serial_number  = $request->input('serial_number');
              $data-> measuring_range  = $request->input('measuring_range');
              $data-> report_no  = $request->input('report_no');
              $data-> date_cal  = $request->input('date_cal');
              $data-> next_cal  = $request->input('next_cal');
              $data-> measured_value1  = $request->input('measured_value1');
              $data-> measured_value2  = $request->input('measured_value2');
              $data-> measured_value3  = $request->input('measured_value3');
              $data-> measured_value4  = $request->input('measured_value4');
              $data-> measured_value5  = $request->input('measured_value5');
              $data-> measured_value6  = $request->input('measured_value6');
              $data-> measured_value7  = $request->input('measured_value7');
              $data-> measured_value8  = $request->input('measured_value8');
              $data-> measured_value9  = $request->input('measured_value9');
              $data-> measured_value10  = $request->input('measured_value10');
              $data-> measured_value11  = $request->input('measured_value11');
              $data-> measured_value12  = $request->input('measured_value12');
              $data-> error1  = $request->input('error1');
              $data-> error2  = $request->input('error2');
              $data-> error3  = $request->input('error3');
              $data-> error4  = $request->input('error4');
              $data-> error5  = $request->input('error5');
              $data-> error6  = $request->input('error6');
              $data-> error7  = $request->input('error7');
              $data-> error8  = $request->input('error8');
              $data-> error9  = $request->input('error9');
              $data-> error10  = $request->input('error10');
              $data-> error11  = $request->input('error11');
              $data-> error12  = $request->input('error12');
              $data->users_id = Auth::id();
              $data->checked_by = auth()->user()->name;
              $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Tools Created'
        ]);

    }

  
    public function edit($id)
    {
    
        $data = DigitalCaliper::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
             'tool_name'          => 'required',
            'serial_number'         => 'required',
            'measuring_range'           => 'required',
            'report_no'         => 'required',
            'date_cal'   => 'required',
            'next_cal'   => 'required',
            'measured_value1'   => 'required',
            'measured_value2'   => 'required',
            'measured_value3'   => 'required',
            'measured_value4'   => 'required',
            'measured_value5'   => 'required',
            'measured_value6'   => 'required',
            'measured_value7'   => 'required',
            'measured_value8'   => 'required',
            'measured_value9'   => 'required',
            'measured_value10'   => 'required',
            'measured_value11'   => 'required',
            'measured_value12'   => 'required',
            'error1'   => 'required',
            'error2'   => 'required',
            'error3'   => 'required',
            'error4'   => 'required',
            'error5'   => 'required',
            'error6'   => 'required',
            'error7'   => 'required',
            'error8'   => 'required',
            'error9'   => 'required',
            'error10'   => 'required',
            'error11'   => 'required',
            'error12'   => 'required',
        ]);

        $input = $request->all();
        $data = DigitalCaliper::findOrFail($id);
        $data->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Dial Caliper Update'
        ]);
    }

 
    public function destroy($id)
    {
        $data = DigitalCaliper::findOrFail($id);
        DigitalCaliper::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Products Deleted'
        ]);
    }
 public function approved($id)
    {
        $data=DigitalCaliper::find($id);
        $data->disposition = 'approved';
        $data->approved_by = auth()->user()->name;
        $data->save();
        if ($data['disposition'] === 'approved') {
            $outsideDial = DigitalCaliper::findOrFail($id);
            $serialNumber = $outsideDial->serial_number;

        // Check if the serial number already exists in the MasterList records
        $existingRecord = MasterList::where('instrument_serial_number', $serialNumber)->exists();
            if(!$existingRecord){
                MasterList::create([
                    'users_id' => $outsideDial->users_id,
                    'equipment_description' => $outsideDial->tool_name,
                    'range' => $outsideDial->measuring_range,
                    'equip_control_no' => $outsideDial->report_no,
                    'inspection_method' => "QAP-WI-05",
                    'acceptance_kriteria' => "+/- 0.02",
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

        return redirect('/digitalcaliper')->with('sukses','Berhasil Approved!');
    }
 public function reject($id)
    {
        $data=DigitalCaliper::find($id);
        $data->disposition = 'reject';
        $data->save();
        return redirect('/digitalcaliper')->with('sukses','Berhasil Approved!');
    }

    public function apiDigitalCalipers(){
        $data = DigitalCaliper::all();

         return Datatables::of($data)
            ->addColumn('action', function($data){
            if(auth()->user()->role=="admin"){
                    return 
                    '<a href="/digitalcaliper/'.$data->id.'/approved" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-ok"></i> Approved</a> ' .
                   '<a href="/digitalcaliper/'.$data->id.'/reject" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i> Reject</a> ' .
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
