<?php

namespace App\Http\Controllers;



use App\MasterList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;

class MasterListController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }

    public function index()
    {

        $masterlist = MasterList::all();
        return view('masterlist.index', compact('masterlist'));
    }

    public function apiMasterLists()
    {
        $data = MasterList::all();

        return Datatables::of($data)
            ->make(true);
    }

    public function exportMasterlistAll()
    {
        $masterlist = MasterList::all();
        $pdf = PDF::loadView('masterlist.MasterlistAllPDF',compact('masterlist'));
        return $pdf->download('masterlist.pdf');
    }

    public function exportMasterlistPeriod(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    
        // Validate the start date
        if (!empty($startDate) && !Carbon::hasFormat($startDate, 'Y-m-d')) {
            // If the start date is not in the valid format, set it to null
            $startDate = null;
        }
    
        // Validate the end date
        if (!empty($endDate) && !Carbon::hasFormat($endDate, 'Y-m-d')) {
            // If the end date is not in the valid format, set it to null
            $endDate = null;
        }
    
        // Fetch data based on the selected period or fetch all data if either date is not valid
        $query = MasterList::query();
        if ($startDate && $endDate) {
            $query->whereBetween('date_cal', [$startDate, $endDate]);
        }
        $query->orderBy('equipment_description');
        $masterlist = $query->get();
    
        $pdf = PDF::loadView('masterlist.MasterlistAllPDF', compact('masterlist', 'startDate', 'endDate'));
        return $pdf->download('masterlist.pdf');
    }
}
