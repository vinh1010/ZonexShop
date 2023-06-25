<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\BannerAddRequest;
use App\Http\Requests\Banner\BannerUpdateRequest;
use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Banner $list_banner)
    {
        $list_banner = $list_banner->list_banner();
        return view('backend.pages.banner.listBanner',compact('list_banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $get_category = $category->list_category();
        return view('backend.pages.banner.addBanner',compact('get_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerAddRequest $request, Banner $add_banner)
    {
        $add_banner = $add_banner->add_banner($request);
        return redirect()->route('banner.index')->withSuccess('Create Banner success');
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
    public function edit($id,Category $category, Banner $find_banner)
    {
        $get_category = $category->list_category();
        $find_banner = $find_banner->find_banner($id);
        return view('backend.pages.banner.editBanner',compact('get_category','find_banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerUpdateRequest $request, $id, Banner $update_banner)
    {
        $update_banner = $update_banner->update_banner($id,$request);
        return redirect()->route('banner.index')->withSuccess('Update Banner success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Banner $delete_banner)
    {
        $delete_banner = $delete_banner->delete_banner($id);
        return redirect()->route('banner.index')->withSuccess('Delete Banner success');
    }
}
