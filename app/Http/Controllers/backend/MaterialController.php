<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Material $material, Request $request)
    {
        $list_material = $material->list_mate($request);
        return view('backend.pages.material.listMaterial',compact('list_material'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.material.addMaterial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Material $material)
    {
        $material->add_material($request);
        return redirect()->route('material.index')->withSuccess('Create Material success');
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
    public function edit($id, Material $find_material)
    {
        $find_material = $find_material->find_material($id);
        return view('backend.pages.material.editMaterial',compact('find_material'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Material $update_material)
    {
        $update_material->update_material($id,$request);
        return redirect()->route('material.index')->withSuccess('Update Material success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Material $delete_material)
    {
        $check_product = $delete_material->check_material($id)->count();
        if($check_product > 0){
            return redirect()->route('material.index')->withError('Material contains products please delete products first');
        }
        $delete_material->delete_material($id);
        return redirect()->route('material.index')->withSuccess('Delete Material success');
    }
}
