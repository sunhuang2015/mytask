<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Employee;
use App\MobileFees;
use App\Invoice;
class BatchMobileFees extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:mobilefees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Started...";

      $employees=Employee::where('category_id',2)->get();

        $rules=[
            'employee_id'=>'required|unique_with:mobile_fees,months'
        ];
        foreach($employees as $employee){
                $data['employee_id']=$employee->id;
                $data['company_id']=$employee->company_id;
                $data['months']= '2015-07-01';
                //$data['months']= Carbon::now()->firstOfMonth();

                $data['fee']=0;

                $data['employee_number']=$employee->number;

                $validator=\Validator::make($data,$rules);

                if($validator->fails()){

                }else{
                    MobileFees::create($data);
                  //Invoice::create($data);
                }


        }

    }
}
