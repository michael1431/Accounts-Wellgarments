<?php

namespace App\Console\Commands;

use App\Attendance;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronJob:cronjob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run weekly holiday synchronization';

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
        $weeklyOffs = \App\Hrm\WeeklyOff::all();
        $today = \Carbon\Carbon::today();
        //$today = Carbon::createFromDate(2019,05,30);

        foreach ($weeklyOffs as $weeklyOff){
            switch ($weeklyOff->name){
                case 'Friday':
                    $weeklyHoliday = Carbon::parse($today)->isFriday();
                    break;
                case 'Saturday':
                    $weeklyHoliday = Carbon::parse($today)->isSaturday();
                    break;
                case 'Sunday':
                    $weeklyHoliday = Carbon::parse($today)->isSunday();
                    break;
                case 'Monday':
                    $weeklyHoliday = Carbon::parse($today)->isMonday();
                    break;
                case 'Tuesday':
                    $weeklyHoliday = Carbon::parse($today)->isTuesday();
                    break;
                case 'Wednesday':
                    $weeklyHoliday = Carbon::parse($today)->isWednesday();
                    break;
                case 'Thursday':
                    $weeklyHoliday = Carbon::parse($today)->isThursday();
                    break;
                default:
                    $weeklyHoliday = Carbon::parse($today)->isFriday();
            }

            if($weeklyHoliday){
                $employees = \App\Hrm\Employee::query()->where('status',1)->get();
                foreach($employees as $employee){

                    $attn = Attendance::query()->where('employee_id',$employee->id)->where('date',$today->format('y-m-d'))->first();

                    if($attn != null){
                        //$inTime = $inTime ? $inTime->format('H:i:s') : $attn->in_time;
                        //$outTime = $outTime ? $outTime->format('H:i:s') : $attn->out_time;
                        //$status = $inTime == null && $outTime == null ? 'A' : 'P';
                        //dd($outTime->format('H:i:s'));

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
                            'status' => 'W',
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
                            'status' => 'W',
                            'late' => null,
                            'date' => $today,
                        ];
                        Attendance::query()->create($data);
                    }
                }
            }
        }
        dd('weekly off day synchronization done');
    }
}
