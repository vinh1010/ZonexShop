<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        $list_tag = $tag->list_tag();
        return view('backend.pages.tag.listTag',compact('list_tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.tag.addTag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tag $add_tag)
    {
        $add_tag->add_tag($request);
        return redirect()->route('tag.index')->withSuccess('Create Tag Success');
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
    public function edit($id, Tag $find_tag)
    {
        $find_tag = $find_tag->find_tag($id);
        return view('backend.pages.tag.editTag',compact('find_tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Tag $update_tag)
    {
        $update_tag->update_tag($id,$request);
        return redirect()->route('tag.index')->withSuccess('Update Tag Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Tag $delete_tag)
    {
        $delete_tag->delete_tag($id);
        return redirect()->route('tag.index')->withSuccess('Delete Tag Success');
    }
}
