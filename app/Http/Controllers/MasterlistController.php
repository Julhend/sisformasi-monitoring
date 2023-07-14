<?php

namespace App\Http\Controllers;



use App\MasterList;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

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
}
