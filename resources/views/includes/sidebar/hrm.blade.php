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
        <li class="nav-item">
            <a href="{{ url('attendance/bulk-out-time') }}" class="nav-link {{ isActive('attendance/bulk-out-time') }}">
                <i class="far fa-circle"></i>
                <p> Bulk Out time</p>
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

        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('hrm/report/monthly_individual_4hr') }}" class="nav-link {{ isActive('hrm/report/monthly_individual_4hr') }}">--}}
                {{--<i class="fa fa-sliders-h nav-icon"></i>--}}
                {{--<p>Monthly Individual 4hrs</p>--}}
            {{--</a>--}}
        {{--</li>--}}

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
        <li class="nav-item">
            <a href="{{ url('hrm/reports/monthly_leave') }}" class="nav-link {{ isActive('hrm/reports/monthly_leave') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Monthly Leave </p>
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

        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/manage_grade') }}" class="nav-link {{ isActive('payroll/manage_grade') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Manage Grade</p>--}}
            {{--</a>--}}
        {{--</li>--}}

        <li class="nav-item">
            <a href="{{ url('payroll/ot_deduction') }}" class="nav-link {{ isActive('payroll/ot_deduction') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>OT Deduction</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/ot_deduction_report') }}" class="nav-link {{ isActive('payroll/ot_deduction_report') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>OT Deduction Report</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/manage_deduction') }}" class="nav-link {{ isActive('payroll/manage_deduction') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Others Deduction</p>
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
        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/reports/salary_wages_by_month') }}" class="nav-link {{ isActive('payroll/reports/salary_wages_by_month') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Salary Report</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/reports/advance_or_loan_report') }}" class="nav-link {{ isActive('payroll/reports/advance_or_loan_report') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Advance/Loan Report</p>--}}
            {{--</a>--}}
        {{--</li>--}}

        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/ot') }}" class="nav-link {{ isActive('payroll/salary/reports/ot') }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Salary Report(OT)</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/line-wise-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/line-wise-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Line Wise Report </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/line-wise-top-sheet-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/line-wise-top-sheet-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Line Wise Top Sheet OT </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/section-wise-top-sheet-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/section-wise-top-sheet-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section Wise Top Sheet OT </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/non-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/non-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Report(Non OT)</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/salary/reports/section-wise-top-sheet-non-ot') }}" class="nav-link {{isActive
            ('payroll/salary/reports/section-wise-top-sheet-non-ot') }}">
                <i class="far fa-circle nav-icon"></i>
                <p> Top Sheet Non OT </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('payroll/salary/advance') }}" class="nav-link {{ isActive('payroll/salary/advance') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Advance Salary</p>
            </a>
        </li>

        {{--<li class="nav-item">--}}
            {{--<a href="{{ url('payroll/salary/reports/all-section-non-ot') }}" class="nav-link {{ isActive('payroll/salary/reports/all-section-non-ot') }}">--}}
                {{--<i class="far fa-circle nav-icon"></i>--}}
                {{--<p>Salary Report(All section Non OT)</p>--}}
            {{--</a>--}}
        {{--</li>--}}

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

        <li class="nav-item {{ isActive('hrm/setting/holiday-setup') }}">
            <a href="{{ url('hrm/setting/holiday-setup') }}" class="nav-link {{ isActive('hrm/setting/holiday-setup') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Holiday Setup</p>
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

<li class="nav-item has-treeview {{ isActive(['utility*']) }}">
    <a href="#" class="nav-link {{ isActive('utility*') }}">
        <i class="far fa-id-badge"></i>
        <p>Utility<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@nullCard') }}" class="nav-link {{ isActive('utility/null-card') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Null Card</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@nullBname') }}" class="nav-link {{ isActive('utility/null-bname') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Null Bengali Name</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@invalidCard') }}" class="nav-link {{ isActive('utility/invalid-card') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Invalid Card</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@joiningDate') }}" class="nav-link {{ isActive('utility/joining-date') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Joining Date</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@invalidShift') }}" class="nav-link {{ isActive('utility/invalid-shift') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Invalid Shift</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@nullGross') }}" class="nav-link {{ isActive('utility/null-gross') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Gross Null</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@nullTransport') }}" class="nav-link {{ isActive('utility/null-transport') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transport Null</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@nullDesignation') }}" class="nav-link {{ isActive('utility/null-designation') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Null Designation</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@SectionWiseGrossReport') }}" class="nav-link {{ isActive('utility/section-wise-gross') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section Wise Gross</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@LineWiseGrossReport') }}" class="nav-link {{ isActive('utility/line-wise-gross') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Line Wise Gross</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@SectionWiseTransportReport') }}" class="nav-link {{ isActive('utility/section-wise-transport') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Section Wise Transport</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('Hrm\HrmInformationController@LineWiseTransportReport') }}" class="nav-link {{ isActive('utility/line-wise-transport') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Line Wise Transport</p>
            </a>
        </li>

    </ul>
</li>

{{--end hrm--}}
