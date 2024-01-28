<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\User;
use Yajra\DataTables\Contracts\DataTable;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
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
        if (auth()->user()->can('viewAny', $this->user)) {
            $data = User::select('*');
            }else{
                $data = User::where('id' , auth()->user()->id);
            }
            return   Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '';
                    if (auth()->user()->can('update', $row)) {
                        $btn .= '<a href="' . Route('dashbord.users.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>';
                    }
                    if (auth()->user()->can('delete', $row)) {
                        $btn .= '

                            <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
                    }
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
                })
                ->rawColumns(['action', 'status'])
                ->make(true);





    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->authorize('update', $this->user);

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
        $this->authorize('update', $user);
        return view('dashbord.users.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $this->authorize('update', $user);
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

    public function delete(Request $request)
    {
        $this->authorize('delete', $this->user);
        if (is_numeric($request->id)) {
            User::where('id', $request->id)->delete();
        }

        return redirect()->route('dashbord.users.index');
    }
}
