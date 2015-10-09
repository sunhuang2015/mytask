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
  
    Route::resource('taskstep','TaskstepController');
    Route::resource('tasks','TaskController');
    Route::resource('tasklogs','TasklogController');
    Route::get('tasklogs/timelime/{id}','TasklogController@timeline');

    Route::get('download/task/{id}','DownloadController@task');
    Route::get('download/tasklog/{id}','DownloadController@tasklog');

    Route::get('upload/employee/','UploadController@employee');
    Route::post('upload/employee/','UploadController@employeeUpload');
    Route::get('upload/phone/','UploadController@phone');

    Route::resource('employees','EmployeeController');
    Route::resource('phones','PhoneController');

    route::get('/delete/employee/{id}','DeleteController@employee');
    route::get('/delete/phone/{id}','DeleteController@phone');
    route::get('/delete/department/{id}','DeleteController@department');
    route::post('/mobilefees/{months?}','MobilefeeController@index');
    route::resource('mobilefees','MobilefeeController');
    route::resource('departments','DepartmentController');
    route::resource('cdmas','CdmaController');
    route::resource('devices','DeviceController');
    route::resource('taskforms','TaskFormController');
    route::get('/reporting/task/excel/{id}',"ReportController@taskexcel");
    Route::get('report/{months}',function($months){


        Excel::create('MultekMobile', function($excel) use($months) {

            $companies=Company::all();

            foreach($companies as $company){

                $excel->sheet('new Sheet', function($sheet) use($company,$months){
                    $sheet->setAllBorders('thin');

                    // Set border for cells
                    $sheet->setBorder('A1', 'thin');

                    $mobilefees=\App\MobileFees::where('company_id',$company->id)->where('months',$months)->with('company','employee')->get();
                    $sheet->loadView('report.index')->with('mobilefees',$mobilefees)->with('company_name',$company->name);

                });
            }



        })->download('xls');
    });
});


