<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $links = Link::all();
        return view('links.index')->with('links',$links);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request,[
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);
        //add link 
        $link = new Link;
        $link->title = $request->input('title');
        $link->url = $request->input('url');
        $link->description = $request->input('description');
        $link->save();

        return redirect('/links')->with('success', 'Link added successfully');
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
        $link = Link::find($id);
        return view('links.show')->with('link', $link);
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
        $link = Link::find($id);

        return view('links.edit')->with('link', $link);
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
        $this->validate($request,[
            'title'=>'required',
            'url'=>'required',
            'description'=>'required',
        ]);
        //update date
        $link = Link::find($id);
        $link->title = $request->input('title');
        $link->url = $request->input('url');
        $link->description = $request->input('description');
        $link->save();

        return redirect('/links')->with('success', 'Link updated successfully');
        
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
        $link = Link::find($id);
        $link->delete();
         return redirect('/links')->with('success', 'Link deleted');
    }
}
