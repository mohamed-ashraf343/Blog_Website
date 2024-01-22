<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Yajra\DataTables\Contracts\DataTable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashbord.users.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.users.add');
    }

    public function getUsersDatatable(){
        $data = User::select('*');
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return $btn = '<a href="' . Route('dashbord.users.edit', $row->id) . '" class="adit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a><a
                id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            })
            // ->addColumn('user', function($row){
            //     return $row->user->shown_name;
            // })
            ->addColumn('status', function ($row) {
                return $row->status == null ? __('words.not activated') : $row->status;
            })
            // ->addColumn('url', function($row){
            //     return '<a href="' . Route('news.post', [$row->id, $row->slug]) . '" target="_blanck"> الذهاب للمقالة</a>';
            // })
            // ->addColumn('date', function($row){
            //     return $row->created_at->toDateString();
            // })

            ->rawColumns(['action', 'status'])
            ->make(true);





    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = [
            'name' => 'required|string',
            'status' => 'nullable|in:null,admin,writer',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
        $validatedData = $request->validate($data);
        User::create([
            'name' => $request->name,
            'status' => $request->status,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('dashbord.users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $this->authorize('update', $user);


        return view('dashbord.users.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $user->update($request->all());
        return redirect()->route('dashbord.users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete(Request $request){

            if(is_numeric($request->id)) {
                User::where('id', $request->id)->delete();
            }
            return redirect()->route('dashbord.users.index');
    }
}
