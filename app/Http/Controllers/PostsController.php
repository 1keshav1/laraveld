<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        //
        return "Posts Controller's Index Page.".$id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post_view($id=null)
    {
        //
        //return view('pages/post_view')->with('pid',$id);
        return view('pages/post_view', compact('id'));
    }
    /**
     * Display the specified resource Contact page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contact_us($id=null)
    {
        //
        $persions = [];
        //return view('pages/post_view')->with('pid',$id);
        //$persions = array('Aman','Ashish Golu', 'Om Prakash', 'Nilesh', 'Ismirti', 'Shivam', 'Abhay', 'Manisha HR', 'Vikram');
        $persions = ['Aman','Ashish Golu', 'Om Prakash', 'Nilesh', 'Ismirti', 'Shivam', 'Abhay', 'Manisha HR', 'Vikram'];
        return view('pages/contact', compact('id','persions'));
    }
}
