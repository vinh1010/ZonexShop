<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Attribute $list_attribute, Request $request)
    {
        $list_attribute = $list_attribute->list_Attr($request);
        return view('backend.pages.attribute.listAttribute',compact('list_attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.attribute.addAttribute');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Attribute $add_attribute)
    {
        $add_attribute = $add_attribute->add_attribute($request);
        return redirect()->route('attribute.index')->withSuccess('Create attribute success');
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
    public function edit($id, Attribute $find_attribute)
    {
        $find_attribute = $find_attribute->find_attribute($id);
        return view('backend.pages.attribute.editAttribute',compact('find_attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Attribute $update_attribute)
    {
        $update_attribute = $update_attribute->update_attribute($id,$request);
        return redirect()->route('attribute.index')->withSuccess('Update attribute success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Attribute $delete_attribute)
    {
        $check_product = $delete_attribute->check_attr($id)->count();
        if($check_product > 0){
            return redirect()->route('attribute.index')->withError('Attribute contains products please delete products first');
        }
        $delete_attribute = $delete_attribute->delete_attribute($id);
        return redirect()->route('attribute.index')->withSuccess('Delete attribute success');
    }
}
