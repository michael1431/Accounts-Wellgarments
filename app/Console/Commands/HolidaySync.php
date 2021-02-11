<?php

namespace App\Console\Commands;

use App\Attendance;
use App\Hrm\Employee;
use App\Hrm\Holiday;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HolidaySync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:holiday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run holiday synchronisation';

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
        $today = Carbon::today()->format('Y-m-d');
        //$today = Carbon::createFromDate(2019,05,01)->format('Y-m-d');
        $isHoliday = Holiday::query()->where('holiday_date',$today)->exists();

        if($isHoliday){
            $employees = Employee::query()->where('status',1)->get();
            foreach($employees as $employee){

                $attn = Attendance::query()->where('employee_id',$employee->id)->where('date',$today)->first();

                if($attn != null){

                    $data = [
                        'employee_id' => $employee->id,
                        'empno' => $employee->employee_no,
                        'shift_in_time' => $employee->office ? $employee->office->shift_id : null,
                        'in_time' => null,
                        'out_time' => null,
                        'ot' => 0,
                        'extra_ot' => 0,
                        'total_ot' => 0,
                        'section_id' => $employee->office ? $employee->office->section_id : null,
                        'line_id' => $employee->office ? $employee->office->line_id : null,
                        'department_id' => $employee->office ? $employee->office->department_id : null,
                        'unit_id' => $employee->office ? $employee->office->unit_id : null,
                        'designation_id' => $employee->office ? $employee->office->designation_id : null,
                        'employee_type_id' => $employee->office ? $employee->office->employee_type_id : null,
                        'leave_category_id' => $employee->office ? $employee->office->leav_category_id : null,
                        'weekly_off_id' => $employee->office ? $employee->office->weekly_off : null,
                        'absent' => null,
                        'holiday' => null,
                        'present' => null,
                        'status' => 'H',
                        'late' => null,
                        'date' => $today,
                    ];

                    $attn->update($data);

                }else{
                    $data = [
                        'employee_id' => $employee->id,
                        'empno' => $employee->employee_no,
                        'shift_in_time' => $employee->office ? $employee->office->shift_id : null,
                        'in_time' => null,
                        'out_time' => null,
                        'ot' => 0,
                        'extra_ot' => 0,
                        'total_ot' => 0,
                        'section_id' => $employee->office ? $employee->office->section_id : null,
                        'line_id' => $employee->office ? $employee->office->line_id : null,
                        'department_id' => $employee->office ? $employee->office->department_id : null,
                        'unit_id' => $employee->office ? $employee->office->unit_id : null,
                        'designation_id' => $employee->office ? $employee->office->designation_id : null,
                        'employee_type_id' => $employee->office ? $employee->office->employee_type_id : null,
                        'leave_category_id' => $employee->office ? $employee->office->leav_category_id : null,
                        'weekly_off_id' => $employee->office ? $employee->office->weekly_off : null,
                        'absent' => null,
                        'holiday' => null,
                        'present' => null,
                        'status' => 'H',
                        'late' => null,
                        'date' => $today,
                    ];
                    Attendance::query()->create($data);
                }
            }
        }
        // }
        dd('holiday synchronization done');
    }
}
