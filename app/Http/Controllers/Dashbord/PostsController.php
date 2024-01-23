<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Http\Trait\UploadImage;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;


class PostsController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashbord.posts.index');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        if (count($categories)>0){
        return view('dashbord.posts.add' , compact('categories'));
        }
        abort(404);
        
    }
    public function gePostssDatatable(){
        $data = Post::select('*')->with('category');
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return $btn = '<a href="' . Route('dashbord.posts.edit', $row->id) . '" class="adit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a><a
                id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" data-toggle="modal"
                data-target="#deletemodal"><i class="fa fa-trash"></i></a>';
            })

            ->addColumn('category_name', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })

            ->addColumn('title', function ($row) {
                return $row->translate(app()->getLocale())->title;
            })
            ->addColumn('status', function ($row) {
                return $row->status == null ? __('words.not activated') : __('words.' . $row->status);
            })
            ->rawColumns(['action', 'title', 'category_name'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $post = Post::create($request->except('image','_token'));
            if($request->has('image')){
                $post->update(['image'=>$this->upload($request->image)]);
            }
      
         return redirect()->route('dashbord.posts.index');
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
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view ('dashbord.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->except('image','_token'));
        if($request->has('image')){
            $post->update(['image'=>$this->upload($request->image)]);
        }
  
     return redirect()->route('dashbord.posts.edit', $post);
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
            Post::where('id', $request->id)->delete();

        }
        return redirect()->route('dashbord.posts.index');
    }
}
