<?php

namespace App\Http\Controllers;

use App\Employee;
use App\MobileFees;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobilefeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($months="")
    {
        //
        $mobilefees=MobileFees::with(['employee','company'])->get();
        //$employees=Employee::with('company')->get();
        return view('mobilefee.index')->with('mobilefees',$mobilefees);
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
        $data=$request->except(['_token','_method']);
        $mobilefee=MobileFees::find($id);
        $credit=$mobilefee->employee->level->credit;
        if($data['fee']<=$credit){
            $mobilefee->update($data);
            return back();
        }else{
            return back()->with('message','超出 '.$credit.'  额度 ');
        }



       /* $data=$request->except(['_token','_method']);
        $employee=Employee::find($id);
        $employee->update($data);
        return redirect()->to('employees');*/

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
