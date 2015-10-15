<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Company;
use App\MobileFees;


class ExcelExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mis($months){
        Excel::create('MIS&IT报销_'.$months, function($excel) use($months) {

            $companies=Company::where('name','CROP')->get();

            foreach($companies as $company){

                $excel->sheet('new Sheet', function($sheet) use($company,$months){
                    $sheet->setAllBorders('thin');

                    // Set border for cells
                    $sheet->setBorder('A1', 'thin');
                    // Font family
                    $sheet->setFontFamily('Comic Sans MS');

                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  11,
                            'bold'      =>  false
                        )
                    ));
                    $employees_id=Employee::select('id')->where('department_name','MIS')->orWhere('department_name','IT')->get();
                    $sum=\App\MobileFees::where('company_id',6)->wherein('employee_id',$employees_id)->where('months',$months)->with('company','employee')->sum('fee');
                    $mobilefees=\App\MobileFees::where('company_id',6)->wherein('employee_id',$employees_id)->where('months',$months)->with('company','employee')->get();
                    $sheet->loadView('report.mis')
                        ->with('mobilefees',$mobilefees)

                        ->with('sum',$sum)
                        ->with('company_name',$company->name);

                });
            }



        })->download('xls');
    }
    public function months($months){
        Excel::create('通讯报销汇总_'.$months, function($excel) use($months) {

            $companies=Company::all();

            foreach($companies as $company){

                $excel->sheet('new Sheet', function($sheet) use($company,$months){
                    $sheet->setAllBorders('thin');

                    // Set border for cells
                    $sheet->setBorder('A1', 'thin');
                    // Font family
                    $sheet->setFontFamily('Comic Sans MS');

// Set font with ->setStyle()`
                    $sheet->setStyle(array(
                        'font' => array(
                            'name'      =>  'Calibri',
                            'size'      =>  11,
                            'bold'      =>  false
                        )
                    ));

                    $sum=\App\MobileFees::where('company_id',$company->id)->where('months',$months)->with('company','employee')->sum('fee');
                    $mobilefees=\App\MobileFees::where('company_id',$company->id)->where('months',$months)->with('company','employee')->get();
                    $sheet->loadView('report.index')
                        ->with('mobilefees',$mobilefees)

                        ->with('sum',$sum)
                        ->with('company_name',$company->name);

                });
            }



        })->download('xls');
    }
    public function index()
    {
        //
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
