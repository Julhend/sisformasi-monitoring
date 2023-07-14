<?php

namespace App\Http\Controllers;


use App\User;
use App\Exports\ExportUsers;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('users.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik'      => 'required|unique:users',
            'name'    => 'required',
            'email'     => 'required|unique:users',
            'no_hp'   => 'required',
            'password' => 'nullable|min:4'
        ]);


        $data = $request->all();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        User::create($data);

        return response()->json([
            'success'    => true,
            'message'    => 'Karyawan Created'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required|string|min:2',
            'nik'      => 'required|string|min:2',
            'email'     => 'required|string|email',
            'no_hp'   => 'required|string|min:2',
            'password' => 'nullable|min:4'
        ]);

        $user = User::findOrFail($id);

        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'success'    => true,
            'message'    => 'User Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Karyawan Delete'
        ]);
    }

    public function apiUsers()
    { 
        if (Auth::user()->role == 'admin'){

            $users = User::all();
             return Datatables::of($users)
            ->addColumn('action', function($users){
                return 
                    '<a onclick="editForm('. $users->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $users->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);
        } else {
            $users = User::all()->where('role','karyawan');
             return Datatables::of($users)
            ->addColumn('action', function($users){
                return 
                   '<a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ';
            })
            ->rawColumns(['action'])->make(true);
        }
       
    }

    public function exportUsersAll()
    {
        $user = User::all();
        $pdf = PDF::loadView('users.UsersAllPDF',compact('user'));
        return $pdf->download('user.pdf');
    }

    public function exportExcel()
    {
        return (new ExportUsers)->download('users.xlsx');
    }
}
