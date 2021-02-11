<li class="nav-item has-treeview {{ isActive(['attendance*']) }}">
    <a href="#" class="nav-link {{ isActive('attendance*') }}">
        <i class="fas fa-clipboard-list"></i>
        <p>Attendance<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ url('attendance/manual-entry') }}" class="nav-link {{ isActive('attendance/manual-entry') }}">
                <i class="far fa-circle"></i>
                <p> Manual Entry</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('attendance/post-attendance') }}" class="nav-link {{ isActive('attendance/post-attendance') }}">
                <i class="far fa-circle"></i>
                <p> Manual In time</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('attendance/manual-out-time') }}" class="nav-link {{ isActive('attendance/manual-out-time') }}">
                <i class="far fa-circle"></i>
                <p> Manual Out time</p>
            </a>
        </li>

    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['employee*','leave*','setting/*','hrm/reports/']) }}">
    <a href="#" class="nav-link {{ isActive(['employee*','setting/*','hrm/reports/']) }}">
        <i class="fas fa-users"></i>
        <p>Human Resource <i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ action('Hrm\EmployeeController@index') }}" class="nav-link {{ isActive('employees') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> All Employees</p>
            </a>
        </li>

  {{--start inactive employee by ahmed--}}
        <li class="nav-item">
            <a href="{{ action('Hrm\EmployeeController@searchInactiveEmployee') }}" class="nav-link {{ isActive('employees/inactive') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> Inactive Employees</p>
            </a>
        </li>
   {{--end inactive employee by ahmed--}}

        <li class="nav-item">
            <a href="{{ action('Hrm\EmployeeController@create') }}" class="nav-link {{ isActive('employee/create') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> Add Employee</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('hrmdisciplinary') }}" class="nav-link {{ isActive('hrm/hrm-disciplinary') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> Disciplinary Management</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('leave/manage/') }}" class="nav-link {{ isActive('leave/manage') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Leave</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\EmployeeController@card') }}" class="nav-link {{ isActive('employee/card') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> Employee ID Card</p>
            </a>
        </li>

        {{--start attendance report of hrm--}}
        {{--<li class="nav-item has-treeview {{ isActive(['hrm/attendance*']) }}">--}}
            {{--<a href="#" class="nav-link {{ isActive('hrm/attendance*') }}">--}}
                {{--<i class="far fa-address-book"></i>--}}
                {{--<p> Attendance Reports<i class="fas fa-angle-left right"></i> </p>--}}
            {{--</a>--}}
            {{--<ul class="nav nav-treeview">--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ url('hrm/attendance/daily_reports') }}" class="nav-link {{ isActive('hrm/attendance/daily_reports') }}">--}}
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        {{--<p>Daily Details Report</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="{{ url('hrm/attendance/monthly_individual_2hr') }}" class="nav-link {{ isActive('hrm/attendance/monthly_individual_2hr') }}">--}}
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        {{--<p>Monthly Individual 2hrs</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="{{ url('hrm/attendance/monthly_individual_4hr') }}" class="nav-link {{ isActive('hrm/attendance/monthly_individual_4hr') }}">--}}
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        {{--<p>Monthly Individual 4hrs</p>--}}
                    {{--</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item">--}}
                    {{--<a href="{{ url('hrm/attendance/daily_out_time') }}" class="nav-link {{ isActive('hrm/attendance/daily_out_time') }}">--}}
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        {{--<p>Daily Out Time Null</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--end attendance report of hrm--}}

        {{--start wages and salary report of hrm--}}
        {{--<li class="nav-item has-treeview {{ isActive(['hrm/reports/*']) }}">--}}
            {{--<a href="#" class="nav-link {{ isActive('hrm/reports/*') }}">--}}
                {{--<i class="far fa-address-book"></i>--}}
                {{--<p> Salary wages Reports<i class="fas fa-angle-left right"></i> </p>--}}
            {{--</a>--}}
            {{--<ul class="nav nav-treeview">--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ url('hrm/reports/salary_wages_by_month') }}" class="nav-link {{ isActive('hrm/reports/salary_wages_by_month') }}">--}}
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        {{--<p>Monthly Report</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--end wages and salary report of hrm --}}
    </ul>
</li>
<li class="nav-item has-treeview {{ isActive(['timesheet*','accessories*']) }}">
    <a href="#" class="nav-link {{ isActive('timesheet*') }}">
        <i class="fas fa-list-ol"></i>
        <p>Daily Timesheet<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="padding-left: 10px;">
        <li class="nav-item">
            <a href="{{ url('#') }}" class="nav-link {{ isActive('#') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('timesheet/present-employees') }}" class="nav-link {{ isActive('timesheet/present-employees') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Present Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('timesheet/absent-employees') }}" class="nav-link {{ isActive('timesheet/absent-employees') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Absent Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('timesheet/late-employees') }}" class="nav-link {{ isActive('timesheet/late-employees') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Late Employees</p>
            </a>
        </li>

    </ul>
</li>

<li class="nav-item has-treeview {{ isActive(['hrm/report*']) }}">
    <a href="#" class="nav-link {{ isActive('hrm/report*') }}">
        <i class="fas fa-chart-pie"></i>
        <p>Report <i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('hrm/report/daily_reports') }}" class="nav-link {{ isActive('hrm/report/daily_reports') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Line Wise</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/report/section-wise-attendance') }}" class="nav-link {{ isActive('hrm/report/section-wise-attendance') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section  Wise</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('hrm/report/section-wise-ot') }}" class="nav-link {{ isActive('hrm/report/section-wise-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section  Wise (OT)</p>
            </a>
        </li>
        {{--inactive employee report by ahmed--}}
        <li class="nav-item">
            <a href="{{ url('hrm/report/inactive-employee') }}" class="nav-link {{ isActive('hrm/report/inactive-employee') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Inactive Employee</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('hrm/report/department-wise-attendance') }}" class="nav-link {{ isActive('hrm/report/department-wise-attendance') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Department  Wise</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/report/monthly_individual_2hr') }}" class="nav-link {{ isActive('hrm/report/monthly_individual_2hr') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Individual Attendance</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('hrm/report/absence_report') }}" class="nav-link {{ isActive('hrm/report/absence_report') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Absence Report</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/report/monthly_individual_4hr') }}" class="nav-link {{ isActive('hrm/report/monthly_individual_4hr') }}">
                <i class="fa fa-sliders-h nav-icon"></i>
                <p>Monthly Individual 4hrs</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/report/daily_out_time') }}" class="nav-link {{ isActive('hrm/report/daily_out_time') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daily Out Time Null</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/report/daily_out_time_null_stuff') }}" class="nav-link {{ isActive('hrm/report/daily_out_time_null_stuff') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daily Out Time Null (Stuff)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/reports/daily_manpower_report') }}" class="nav-link {{ isActive('hrm/reports/daily_manpower_report') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daily Manpower Report</p>
            </a>
        </li>


    </ul>
</li>


<li class="nav-item has-treeview {{ isActive(['payroll*']) }}">
    <a href="#" class="nav-link {{ isActive('payroll*') }}">
        <i class="fas fa-funnel-dollar"></i>
        <p>Payroll <i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        <li class="nav-item">
            <a href="{{ url('payroll/manage_grade') }}" class="nav-link {{ isActive('payroll/manage_grade') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Grade</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/manage_salary') }}" class="nav-link {{ isActive('payroll/manage_salary') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Salary (OT)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('payroll/manage_salary_non_ot') }}" class="nav-link {{ isActive('payroll/manage_salary_non_ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Salary (NON OT)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('payroll/advance_loan') }}" class="nav-link {{ isActive('payroll/advance_loan') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Advanced/Loan</p>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/disciplinary-facts') }}" class="nav-link {{ isActive('payroll/disciplinary-facts') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Disciplinary Facts</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a href="{{ url('payroll/reports/salary_wages_by_month') }}" class="nav-link {{ isActive('payroll/reports/salary_wages_by_month') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Report</p>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/reports/advance_or_loan_report') }}" class="nav-link {{ isActive('payroll/reports/advance_or_loan_report') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Advance/Loan Report</p>--}}
            {{--</a>--}}
        {{--</li>--}}

        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/section-wise-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/section-wise-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Report (OT)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/section-wise-non-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/section-wise-non-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Report (Non OT)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/all-section-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/all-section-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Report (All section OT)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/all-section-non-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/all-section-non-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Report(All section Non OT)</p>
            </a>
        </li>

        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/reports/advance_return') }}" class="nav-link {{ isActive('payroll/reports/advance_return') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Advance Return Report(Monthly) </p>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
</li>



<li class="nav-item has-treeview {{ isActive(['device*']) }}">
    <a href="#" class="nav-link {{ isActive('device*') }}">
        <i class="fas fa-file-upload"></i>
        <p>Device Data<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ action('Hrm\DeviceController@upload') }}" class="nav-link {{ isActive('device/upload') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Upload Attendance</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\DeviceController@raw') }}" class="nav-link {{ isActive('device/raw') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Raw Data</p>
            </a>
        </li>
    </ul>
</li>

{{--start hrm setting --}}
<li class="nav-item has-treeview {{ isActive(['hrm/setting/*']) }}">
    <a href="#" class="nav-link {{ isActive('hrm/setting/*') }}">
        <i class="fas fa-tools"></i>
        <p> Settings<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shift Group</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('hrm/setting/leave_category') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Leave category</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/unit') }}">
            <a href="{{ url('hrm/setting/unit') }}" class="nav-link {{ isActive('hrm/setting/unit') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Unit</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/floor_assign') }}">
            <a href="{{ url('hrm/setting/floor_assign') }}" class="nav-link {{ isActive('hrm/setting/floor_assign') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Floor Assign</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/line') }}">
            <a href="{{ url('hrm/setting/line') }}" class="nav-link {{ isActive('hrm/setting/line') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Line Assign</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/grade') }}">
            <a href="{{ url('hrm/setting/grade') }}" class="nav-link {{ isActive('hrm/setting/grade') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Grade</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/status') }}">
            <a href="{{ url('hrm/setting/status') }}" class="nav-link {{ isActive('hrm/setting/status') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Status</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/nationality') }}">
            <a href="{{ url('hrm/setting/nationality') }}" class="nav-link {{ isActive('hrm/setting/nationality') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Nationality</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/department') }}">
            <a href="{{ url('hrm/setting/department') }}" class="nav-link {{ isActive('hrm/setting/department') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Department</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/designation') }}">
            <a href="{{ url('hrm/setting/designation') }}" class="nav-link {{ isActive('hrm/setting/designation') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> Designation </p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/company') }}">
            <a href="{{ url('hrm/setting/company') }}" class="nav-link {{ isActive('hrm/setting/company') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Company</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/employee_type') }}">
            <a href="{{ url('hrm/setting/employee_type') }}" class="nav-link {{ isActive('hrm/setting/employee_type') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Employee type</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/appraisal_cat') }}">
            <a href="{{ url('hrm/setting/appraisal_cat') }}" class="nav-link {{ isActive('hrm/setting/appraisal_cat') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Appraisal category</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/transport_location') }}">
            <a href="{{ url('hrm/setting/transport_location') }}" class="nav-link {{ isActive('hrm/setting/transport_location') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transport Location</p>
            </a>
        </li>

                <li class="nav-item {{ isActive('hrm/setting/country') }}">
            <a href="{{ url('hrm/setting/country') }}" class="nav-link {{ isActive('hrm/setting/country') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Country</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/district') }}">
            <a href="{{ url('hrm/setting/district') }}" class="nav-link {{ isActive('hrm/setting/district') }}">
                <i class="far fa-circle nav-icon"></i>
                {{--<p>District</p>-- actual name}}--}}
                <p>Division</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/city') }}">
            <a href="{{ url('hrm/setting/city') }}" class="nav-link {{ isActive('hrm/setting/city') }}">
                <i class="far fa-circle nav-icon"></i>
                {{--<p>City</p>--actual name}}--}}
                <p>District</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/calendar_code_setting') }}">
            <a href="{{ url('hrm/setting/calendar_code_setting') }}" class="nav-link {{ isActive('hrm/setting/calendar_code_setting') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Calendar Code</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/section') }}">
            <a href="{{ url('hrm/setting/section') }}" class="nav-link {{ isActive('hrm/setting/section') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/weekly_off') }}">
            <a href="{{ url('hrm/setting/weekly_off') }}" class="nav-link {{ isActive('hrm/setting/weekly_off') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Weekly off</p>
            </a>
        </li>

        <li class="nav-item {{ isActive('hrm/setting/shift') }}">
            <a href="{{ url('hrm/setting/shift') }}" class="nav-link {{ isActive('hrm/setting/shift') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Shift setting</p>
            </a>
        </li>
        {{--end hrm setting --}}
    </ul>
</li>


{{--end hrm--}}

<!-- menus from prism
{{-- New HRM here Main--}}
<li class="nav-header">Imported</li>
<li class="nav-item has-treeview {{ isActive(['attendance*']) }}">
    <a href="#" class="nav-link {{ isActive('attendance*') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>HRM<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('attendance/upload-device-data') }}">
                <i class="fas fa-save"></i>
                <p>Organogram</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('attendance/upload-device-data') }}">
                <i class="fas fa-save"></i>
                <p>Manpower Status</p>
            </a>
        </li>

        {{--employee starts SUB--}}
        <li class="nav-item has-treeview {{ isActive(['hrm/setting/*']) }}">
            <a href="#" class="nav-link {{ isActive('hrm/setting/*') }}">
                <i class="fas fa-tools"></i>
                <p> Employee<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{--Add employee starts SUB--}}
            <ul class="nav nav-treeview">
                <li class="nav-item has-treeview {{ isActive(['hrm/setting/*']) }}">
                    <a href="#" class="nav-link {{ isActive('hrm/setting/*') }}">
                        <i class="fas fa-tools"></i>
                        <p> Add Employee<i class="fas fa-angle-left right"></i> </p>
                    </a>

                    {{--another starts SUB--}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('hrm/setting/leave_category') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>Single</p>
                            </a>
                        </li>

                        <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>From Wizard</p>
                            </a>
                        </li>

                        <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>Multiple</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--Add employee end SUB--}}
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>List of Employees</p>
                    </a>
                </li>

                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>List of Employees (Flat List)</p>
                    </a>
                </li>

            </ul>
        </li>
        {{-- employee end SUB --}}
    </ul>
</li>
{{-- New HRM end Main --}}


{{-- HR Operation start Main --}}
<li class="nav-item has-treeview {{ isActive(['attendance*']) }}">
    <a href="#" class="nav-link {{ isActive('attendance*') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>HR Operations<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        {{-- Manage Employee Starts SUB --}}

        <li class="nav-item has-treeview {{ isActive(['hrm/setting/*']) }}">
            <a href="#" class="nav-link {{ isActive('hrm/setting/*') }}">
                <i class="fas fa-tools"></i>
                <p> Manage Employee<i class="fas fa-angle-left right"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                {{-- under Manage Employee Starts SUB --}}

                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Batch Salary Increment(Variable)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Batch Salary Increment(Fixed)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Batch Payscale Change</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Batch Employee Shift Rotation</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Activate/Deactivate</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Delete</p>
                    </a>
                </li>
                {{-- under Manage Employee end SUB --}}
            </ul>

        </li>
        {{-- Manage Employee end SUB --}}

        {{-- HR Operation starts other SUB--}}
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Batch Edit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Specialized Employees</p>
            </a>
        </li>
        {{-- HR Operation end other SUB--}}

    </ul>
</li>
{{-- HR Operation end  MAIN--}}

{{-- Leave & Attendance start Main --}}
<li class="nav-item has-treeview {{ isActive(['#']) }}">
    <a href="#" class="nav-link {{ isActive('#') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Leave & Attendance<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">

        {{-- Attendance Entry Starts SUB --}}

        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> Attendance Entry<i class="fas fa-angle-left right"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                {{-- under Attendance Entry Starts SUB --}}         <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Upload File (Device Data)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Upload File (Manual Data)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Read Data from Device</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Manual Entry</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Delete Attendance</p>
                    </a>
                </li>

                {{-- under Attendance Entry end SUB --}}
            </ul>

        </li>
        {{-- Attendance Entry end SUB --}}


        {{-- Device Data Starts SUB --}}

        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> Device Data<i class="fas fa-angle-left right"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                {{-- under Device Data Starts SUB --}}

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Unposted Data</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Late Employees</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Absent Employees</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Now Present Employees</p>
                    </a>
                </li>

                {{-- under Device Data Entry end SUB --}}</ul>
        </li>{{-- Device Data end SUB --}}

        {{-- Leave & Attendance starts other SUB--}}
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Daily Timesheet (Present)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Daily Timesheet (Absent)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Daily Timesheet (Late)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Daily Timesheet</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Attendance Status</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Shift Interchange</p>
            </a>
        </li>
        {{-- Leave & Attendance end otherSUB --}}
        {{-- Shift Roster Starts SUB --}}

        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> Shift Roster<i class="fas fa-angle-left right"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                {{-- under Shift Roster Starts SUB --}}

                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Add Shift Roster</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Generate Shift Roster</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>View Shift Roster</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Add Swap Application</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>List Swap Application</p>
                    </a>
                </li>

                {{-- under Shift Roster end SUB --}}
            </ul>

        </li>
        {{-- Shift Roster end SUB --}}


        {{-- Leave Starts Main under Leave & Attendance --}}

        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> Leave<i class="fas fa-angle-left right"></i> </p>
            </a>

            <ul class="nav nav-treeview">

                {{-- under Shift Roster Starts SUB --}}

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>New Leave Application</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>My Leave Application</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Leave Application List</p>
                    </a>
                </li>


                {{-- Leave Application List MAIN under Leave --}}

                <li class="nav-item has-treeview {{ isActive(['#']) }}">
                    <a href="#" class="nav-link {{ isActive('#') }}">
                        <i class="fas fa-tools"></i>
                        <p> Leave Application List<i class="fas fa-angle-left right"></i> </p>
                    </a>

                    <ul class="nav nav-treeview">

                        {{-- under Leave Application List Starts SUB --}}

                        <li class="nav-item {{ isActive('#') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item {{ isActive('#') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>For Recommendation</p>
                            </a>
                        </li>
                        <li class="nav-item {{ isActive('#') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>For Approval</p>
                            </a>
                        </li>

                        {{-- under Leave Application List end SUB --}}
                    </ul>

                </li>
                {{-- Leave end SUB under Leave & Attendance--}}


                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>New Leave Encashment</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Encashment Application List</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Leave Status</p>
                    </a>
                </li>

                {{-- under Leave Entry end SUB --}}
            </ul>

        </li>
        {{-- Leave end SUB under Leave & Attendance--}}

    </ul>
</li>
{{-- Leave & Attendance end  MAIN--}}

{{-- Disciplinary management Starts MAIN --}}

<li class="nav-item has-treeview {{ isActive(['#']) }}">
    <a href="#" class="nav-link {{ isActive('#') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Disciplinary managmnt<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">

        {{-- under Disciplinary management Starts SUB --}}

        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                <p>Add Show Cause</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                <p>Show Cause List</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                <p>Add Warning Letter</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                <p>Warning Letter List</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                <p>Reason</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                <p>Action</p>
            </a>
        </li>

        {{-- under Disciplinary management end SUB --}}
    </ul>

</li>
{{-- Disciplinary management end MAIN --}}

{{-- Payroll starts here Main--}}

<li class="nav-item has-treeview {{ isActive(['#']) }}">
    <a href="#" class="nav-link {{ isActive('#') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Payroll<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="padding-left: 10px;">
        <li class="nav-item">
            <a href="{{ url('attendance/upload-device-data') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Active Payroll Schedules</p>
            </a>
        </li>

        {{-- Earnings starts SUB under Payroll--}}

        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> Earnings<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{--another starts SUB under Earnings--}}

            <ul class="nav nav-treeview" style="padding-left: 10px;">

                {{-- under Manage Employee Starts SUB --}}

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Bonus Calculation</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Other Earning (Unscheduled)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>List of Earnings</p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ isActive(['#']) }}">
                    <a href="#" class="nav-link {{ isActive('#') }}">
                        <i class="fas fa-tools"></i>
                        <p> Refund<i class="fas fa-angle-left right"></i> </p>
                    </a>

                    {{-- another starts SUB under Refund--}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>Refund Summary</p>
                            </a>

                        </li>

                        <li class="nav-item {{ isActive('#') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>Calculate Refund Interest</p>
                            </a>
                        </li>
                        <li class="nav-item {{ isActive('#') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>Add Refund Opening Balance</p>
                            </a>
                        </li>
                    </ul>
                    {{--another end SUB under Refund--}}
                </li>
                <li class="nav-item has-treeview {{ isActive(['#']) }}">
                    <a href="#" class="nav-link {{ isActive('#') }}">
                        <i class="fas fa-tools"></i>
                        <p> Reimbursement<i class="fas fa-angle-left right"></i> </p>
                    </a>

                    {{-- another starts SUB under Reimbursement--}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>Add Reimbursement</p>
                            </a>

                        </li>                <li class="nav-item {{ isActive('#') }}">
                            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                                <p>List of Reimbursement</p>
                            </a>
                        </li>
                        {{-- another end SUB under Reimbursement--}}
                    </ul>

                    {{--another end SUB under Earnings--}}
                </li>

                {{-- another end SUB under Earnings--}}
            </ul>
            {{--another end SUB under Earnings--}}
        </li>

        {{-- Earnings End SUB under Payroll--}}


        {{--Payment starts  SUBunder Payroll--}}
        <li class="nav-itemhas-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> Payment<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{--another starts SUB under Earnings--}}

            <ul class="nav nav-treeview">

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Salary Payment</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Extra OT Payment</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Unscheduled Payment (Single Employee)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Unscheduled Payment (Multiple Employees)</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Bonus Payment</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Refund Payment</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('hrm/setting/shift_group') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>List of Payments</p>
                    </a>
                </li>


            </ul>
            {{--another end SUB under Payments--}}
        </li>

    </ul>
</li>
{{-- Payroll end Main --}}

{{-- Loan &amp; Advance Starts MAIN --}}

<li class="nav-item has-treeview {{ isActive(['#']) }}">
    <a href="#" class="nav-link {{ isActive('#') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Loan &amp; Advance<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">

        {{-- under Loan &amp; Advance Starts SUB --}}

        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>List of Loans &amp; Advances</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Receive Loan Payment</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>List of Loan Payments</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>New Salary Advnce Appli</p>
            </a>
        </li>

        {{--another end SUB under Loan &amp; Advance--}}
        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> List of Salary Advances<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{-- another starts SUB under List of Salary Advances--}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>All</p>
                    </a>

                </li>

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>For Verification</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>For Approval</p>
                    </a>
                </li>
            </ul>
            {{--another end SUB under List of Salary Advances--}}

        </li>
        {{--another end SUB under Loan &amp; Advance--}}

        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>New Salary Loan Application</p>
            </a>
        </li>

        {{--another end SUB under Loan &amp; Advance--}}
        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p> List of Salary Loans<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{-- another starts SUB under List of Salary Advances--}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>All</p>
                    </a>

                </li>

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>For Verification</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>For Approval</p>
                    </a>
                </li>
            </ul>
            {{--another end SUB under List of Salary Advances--}}

        </li>
        {{--another end SUB under Loan &amp; Advance--}}

        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>New PF Loan Application</p>
            </a>
        </li>
        {{-- HR Operation end other SUB--}}

        {{--another end SUB under Loan &amp; Advance--}}
        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p>List of PF Loans<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{-- another starts SUB under List of Salary Advances--}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>All</p>
                    </a>

                </li>

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>For Verification</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>For Approval</p>
                    </a>
                </li>
            </ul>
            {{--another end SUB under List of Salary Advances--}}

        </li>

        {{-- under Loan &amp; Advance management end SUB --}}
    </ul>

</li>
{{-- Loan &amp; Advance management end MAIN --}}


{{-- PF Starts MAIN --}}

<li class="nav-item has-treeview {{ isActive(['#']) }}">
    <a href="#" class="nav-link {{ isActive('#') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>PF<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">

        {{-- under Appraisal Starts SUB --}}


        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Active PF Schedules</p>
            </a>
        </li>

        {{--another end SUB under Loan &amp; Advance--}}
        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('hrm/setting/*') }}">
                <i class="fas fa-tools"></i>
                <p> PF Refund Rules<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{-- another starts SUB under List of Salary Advances--}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Add Refund Rule</p>
                    </a>

                </li>

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>List of Refund Rules</p>
                    </a>
                </li>
            </ul>
            {{--another end SUB under List of Salary Advances--}}

        </li>
        {{--another end SUB under Loan &amp; Advance--}}

        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-save"></i>
                <p>Distribute PF Income</p>
            </a>
        </li>
        {{-- under PF end SUB --}}
    </ul>

</li>
{{-- PF end MAIN --}}

{{-- Appraisal Starts MAIN --}}

<li class="nav-item has-treeview {{ isActive(['#']) }}">
    <a href="#" class="nav-link {{ isActive('#') }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Appraisal<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview">

        {{-- under Appraisal Starts SUB --}}


        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                <i class="fas fa-save"></i>
                <p>Upcoming Appraisals</p>
            </a>
        </li>
        <li class="nav-item {{ isActive('#') }}">
            <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                <i class="fas fa-save"></i>
                <p>Create Appraisal</p>
            </a>
        </li>

        {{--another end SUB under Loan &amp; Advance--}}
        <li class="nav-item has-treeview {{ isActive(['#']) }}">
            <a href="#" class="nav-link {{ isActive('#') }}">
                <i class="fas fa-tools"></i>
                <p>Appraisal Index<i class="fas fa-angle-left right"></i> </p>
            </a>

            {{-- another starts SUB under List of Salary Advances--}}
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('hrm/setting/leave_category') }}" class="nav-link {{ isActive('hrm/setting/leave_category') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>All</p>
                    </a>
                </li>

                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Pending for Scoring</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Pending for Verification</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Pending for Approval</p>
                    </a>
                </li>
                <li class="nav-item {{ isActive('#') }}">
                    <a href="{{ url('hrm/setting/shift_group') }}" class="nav-link {{ isActive('hrm/setting/shift_group') }}">
                        {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                        <p>Pending for Evaluation</p>
                    </a>
                </li>
            </ul>
            {{--another end SUB under List of Salary Advances--}}

        </li>

        {{-- under Appraisal end SUB --}}
    </ul>

</li>
{{-- Appraisal end MAIN --}}

-->