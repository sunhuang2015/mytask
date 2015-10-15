<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Company;

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->to('employees');
    }
    return view('auth.login');

});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...

Route::post('auth/register', 'Auth\AuthController@postRegister');


  
Route::group(['middleware' => 'auth'], function () {
    Route::get('layouts','LayoutController@index');
    Route::post('layouts','LayoutController@index');
    Route::resource('taskstep','TaskstepController');
    Route::resource('tasks','TaskController');
    Route::resource('tasklogs','TasklogController');
    Route::get('tasklogs/timelime/{id}','TasklogController@timeline');

    Route::get('download/task/{id}','DownloadController@task');
    Route::get('download/tasklog/{id}','DownloadController@tasklog');

    Route::get('upload/employee/','UploadController@employee');
    Route::post('upload/employee/','UploadController@employeeUpload');
    Route::post('upload/cdma','UploadController@cdmaUpload');
    Route::get('upload/phone/','UploadController@phone');
    Route::post('upload/bill','UploadController@billUpload');
    Route::resource('employees','EmployeeController');
    Route::resource('phones','PhoneController');

    route::get('/delete/employee/{id}','DeleteController@employee');
    route::get('/delete/phone/{id}','DeleteController@phone');
    route::get('/delete/department/{id}','DeleteController@department');
    Route::get('/delete/rack/{id}','DeleteController@rack');
    Route::get('/delete/cdma/{id}','DeleteController@cdma');
    route::post('/mobilefees/{months?}','MobilefeeController@index');
    route::post('/bills/{months?}','BillListController@index');
    route::resource('mobilefees','MobilefeeController');
    route::resource('departments','DepartmentController');
    route::resource('cdmas','CdmaController');
    route::resource('devices','DeviceController');
    route::resource('taskforms','TaskFormController');
    route::get('/reporting/task/excel/{id}',"ReportController@taskexcel");
    Route::resource('bills','BillListController');
    Route::get('report/{months}','ExcelExportController@months');
    Route::get('reports/{months}/MIS','ExcelExportController@mis');
/*
    Route::get('report/{months}',function($months) {


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
    });
*/
    Route::resource('racks','RackController');
    Route::resource('networkmodels','NetworkModelController');
    Route::resource('networkdevices','NetworkDeviceController');
});


