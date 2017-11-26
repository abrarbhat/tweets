<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts=Posts::orderBy('id','DESC')->paginate(5);
        return view('posts.index',compact('posts'));//->with('i',($request->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $this->validate($request,['title'=>'required','description'=>'required','user_id'=>'required']);
    //Posts::create($request->all());
    $post = new Posts();
    $post->title = $request->title;
    $post->description= $request->description;
    $post-> user_id   = $request->user_id;
    $post->save();

    return redirect()->route('posts.index')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $posts =Posts::findOrFail($id);
     return view('posts.show',compact('posts'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $posts =Posts::findOrFail($id);
    return view('posts.edit',compact('posts'));
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
        //
        $this->validate($request,['title'=>'required','description'=>'required']);
        Posts::findOrFail($id)->update($request->all());
        return redirect()->route('posts.index')->with('success','Post Created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     Posts::findOrFail($id)->delete();
     return redirect()->route('posts.index')->with('success','Post Deleted Successfully');

    }


    public function search(Request $request)
    {

       $uname= $request->searchtag;

        $user = User::where('name',$uname)->get();//->where('username',$uname);


        return view('posts.search',compact('user'));//,compact('user'));//->with('success','Post created Successfully');;

    }

    public function follow(Request $request)
    {
        $user= $request->all();
        return view('posts.search',compact('user'));


    }

}
