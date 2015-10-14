<?php

namespace App\Http\Controllers;

use App\Rack;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if($request->has('company_id')){
            $company_id=$request['company_id'];
            session(["layout_company_id"=>$company_id]);
        }else{
            if($request->session()->has('layout_company_id')){
                $company_id=$request->session()->get('layout_company_id');
            }else
            {
                $company_id=1;
            }
        }
        $racks=Rack::with(['company','networkDevice'])->where('company_id',$company_id)->get();
        return view('racklayouts.index')->with('racks',$racks);
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
}
