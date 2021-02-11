{{-- <li class="nav-item has-treeview {{ isActive(['principle*','group*','ac*','ledger/groups*','voucher*']) }}">
    <a href="#" class="nav-link {{isActive(['principle*','group*','ac*','ledger/groups*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Accounts<i class="fas fa-angle-left right"></i> </p>
    </a> --}}

    {{-- <ul class="nav nav-treeview" style="background-color: #292929">
       
        <li class="nav-item has-treeview {{ isActive(['accounts/ledger','accounts/ledger*','ledger/groups','ledger/groups*']) }}">
            <a href="#" class="nav-link {{ isActive('accounts/ledger*','ledger/groups') }}">
                <i class="fas fa-tools"></i>
                <p>Ledger<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">

                <li class="nav-item">
                    <a href="{{ url('accounts/ledger') }}" class="nav-link {{ isActive('accounts/ledger') }}">
                        <p style="margin-left:30px"><i class="fas fa-arrow-alt-circle-right"></i> Create Ledger Or Group</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul> --}}
    {{-- Ladgers End --}}

    {{-- <ul class="nav nav-treeview" style="background-color: #292929">
        {{-- Accounts Journal --}}
        {{-- <li class="nav-item has-treeview {{ isActive(['accounts/principle*','accounts/group*','accounts/journal*']) }}">
            <a href="#" class="nav-link {{ isActive('accounts/journal*') }}">
                <i class="fas fa-tools"></i>
                <p>Journal <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">
                <li class="nav-item">
                    <a href="{{ url('accounts/journal/create') }}" class="nav-link {{ isActive('accounts/journal/create') }}">
                        <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Create Journal</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('accounts/journal/lists') }}" class="nav-link {{ isActive('accounts/journal/lists') }}">
                        <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Journal List</p>
                    </a>
                </li>
            </ul>
        </li> --}}
    {{-- </ul>  --}}

    {{--Start Balance sheet --}}
    {{-- <ul class="nav nav-treeview" style="background-color: #292929">
       
        <li class="nav-item has-treeview {{ isActive(['accounts/balance-sheet*']) }}">
            <a href="#" class="nav-link {{ isActive('accounts/balance-sheet*') }}">
                <i class="fas fa-tools"></i>
                <p> Balance Sheet <i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav-treeview nav">
                <li class="nav-item">
                    <a href="{{ url('accounts/balance-sheet/lists') }}" class="nav-link {{ isActive('accounts/balance-sheet/lists') }}">
                        <p style="margin-left:30px">Balance sheet (index)</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul> --}}
    {{--End Balance sheet --}}

    {{--Start Cash Voucher --}}
    {{-- <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item has-treeview {{ isActive(['voucher*']) }}">
            <a href="#" class="nav-link {{ isActive('voucher*') }}">
                <i class="fas fa-envelope-open-text"></i>
                <p> Cash/Bank Voucher <i class="fas fa-angle-left right"></i></p>
            </a>

            <ul class="nav-treeview nav">
                <li class="nav-item">
                    <a href="{{ url('voucher/cash-receipt/create') }}" class="nav-link {{ isActive('voucher/cash-receipt/create') }}">
                        <p style="margin-left:5px"><i class="far fa-money-bill-alt"></i> Cash Receipt</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('voucher/cash-payment/create') }}" class="nav-link {{ isActive('voucher/cash-payment/create') }}">
                        <p style="margin-left:5px"><i class="fas fa-donate"></i> Cash Payment</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('voucher/bank-receipt/create') }}" class="nav-link {{ isActive('voucher/bank-receipt/create') }}">
                        <p style="margin-left:5px"><i class="far fa-money-bill-alt"></i> Bank Receipt</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('voucher/bank-payment/create') }}" class="nav-link {{ isActive('voucher/bank-payment/create') }}">
                        <p style="margin-left:5px"><i class="fas fa-donate"></i> Bank Payment</p>
                    </a>
                </li>
               
            </ul>

        </li>
    </ul> --}}
    {{--End Cash Voucher --}}

{{-- </li> --}}
{{--display menu starts here --}}
<li class="nav-item has-treeview {{ isActive(['accounts/journal/*']) }}">
    <a href="#" class="nav-link {{ isActive(['accounts/journal/*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Journal<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        @if(canAbleToSee('journal.add'))
        <li class="nav-item">
            <a href="{{ url('accounts/journal/create') }}" class="nav-link {{ isActive('accounts/journal/create') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Create Journal</p>
            </a>
        </li>
        
        @endif
        @if(canAbleToSee('journal.lists'))
        <li class="nav-item">
            <a href="{{ url('accounts/journal/lists') }}" class="nav-link {{ isActive('accounts/journal/lists') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Journal List</p>
            </a>
        </li>
        
        @endif
    </ul>
</li>
<li class="nav-item has-treeview {{ isActive(['voucher*']) }}">
    <a href="#" class="nav-link {{ isActive(['voucher*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Cash/Bank Voucher<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        
        @if(canAbleToSee('cash-receipt.create'))
        <li class="nav-item">
            <a href="{{ url('voucher/cash-receipt/create') }}" class="nav-link {{ isActive('voucher/cash-receipt/create') }}">
                <p style="margin-left:5px"><i class="far fa-money-bill-alt"></i> Cash Receipt</p>
            </a>
        </li>

        @endif
        @if(canAbleToSee('cash-payment.create'))
        <li class="nav-item">
            <a href="{{ url('voucher/cash-payment/create') }}" class="nav-link {{ isActive('voucher/cash-payment/create') }}">
                <p style="margin-left:5px"><i class="fas fa-donate"></i> Cash Payment</p>
            </a>
        </li>

        @endif
        @if(canAbleToSee('bank-receipt.create'))
        <li class="nav-item">
            <a href="{{ url('voucher/bank-receipt/create') }}" class="nav-link {{ isActive('voucher/bank-receipt/create') }}">
                <p style="margin-left:5px"><i class="far fa-money-bill-alt"></i> Bank Receipt</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('bank-payment.create'))
        <li class="nav-item">
            <a href="{{ url('voucher/bank-payment/create') }}" class="nav-link {{ isActive('voucher/bank-payment/create') }}">
                <p style="margin-left:5px"><i class="fas fa-donate"></i> Bank Payment</p>
            </a>
        </li>
        @endif
    </ul>
</li>
{{--display menu ends here--}}
<li class="nav-item has-treeview {{ isActive(['display/*']) }}">
    <a href="#" class="nav-link {{ isActive(['display/*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Display<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        @if(canAbleToSee('display.daybook'))
        <li class="nav-item">
            <a href="{{ url('display/daybook') }}" class="nav-link {{ isActive('display/daybook') }}">
                <p style="margin-left:5px"><i class="far fa-arrow-alt-circle-right"></i> Day Book</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('display.cash_book'))
        <li class="nav-item">
            <a href="{{ route('display.cash_book') }}" class="nav-link {{ isActive('display/cash_book') }}">
                <p style="margin-left:5px"><i class="far fa-arrow-alt-circle-right"></i> Cash Book</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('cash-receipt.lists'))
        <li class="nav-item">
            <a href="{{ url('display/cash-receipt/lists') }}" class="nav-link {{ isActive('display/cash-receipt/lists') }}">
                <p style="margin-left:5px"><i class="fas fa-list"></i> Cash Receipt Lists</p>
            </a>
        </li>

        @endif
        @if(canAbleToSee('cash-payment.lists'))
        <li class="nav-item">
            <a href="{{ url('display/cash-payment/lists') }}" class="nav-link {{ isActive('display/cash-payment/lists') }}">
                <p style="margin-left:5px"><i class="fas fa-list"></i> Cash Payment Lists</p>
            </a>
        </li>

        @endif
        @if(canAbleToSee('bank-receipt.lists'))
        <li class="nav-item">
            <a href="{{ url('display/bank-receipt/lists') }}" class="nav-link {{ isActive('display/bank-receipt/lists') }}">
                <p style="margin-left:5px"><i class="fas fa-list"></i> Bank Receipt Lists</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('bank-payment.lists'))
        <li class="nav-item">
            <a href="{{ url('display/bank-payment/lists') }}" class="nav-link {{ isActive('display/bank-payment/lists') }}">
                <p style="margin-left:5px"><i class="fas fa-list"></i> Bank Payment Lists</p>
            </a>
        </li>
        
        @endif
        @if(canAbleToSee('display.receipt_payment'))
        <li class="nav-item">
            {{-- <a href="{{ url('display/receipt_payment') }}" class="nav-link {{ isActive('display/receipt_payment') }}">
                <p style="margin-left:5px"><i class="far fa-arrow-alt-circle-right"></i>Receipt-Payment</p>
            </a> --}}
        </li>
        @endif
    </ul>
</li>

{{--Reports menu starts here--}}
<li class="nav-item has-treeview {{ isActive(['reports/*']) }}">
    <a href="#" class="nav-link {{ isActive(['reports/*']) }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>Reports<i class="fas fa-angle-left right"></i> </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        @if(canAbleToSee('report.trial_balance'))
        <li class="nav-item">
            <a href="{{ url('reports/trial_balance') }}" class="nav-link {{ isActive('reports/trial_balance') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Trial Balance</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('report.balance_sheet'))
        <li class="nav-item">
            <a href="{{ url('reports/profit_loss') }}" class="nav-link {{ isActive('reports/profit_loss') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Profit Loss</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('report.balance_sheet'))
        <li class="nav-item">
            <a href="{{ url('reports/balance_sheet') }}" class="nav-link {{ isActive('reports/balance_sheet') }}">
                <p style="margin-left:30px"><i class="fas fa-scroll"></i> Balance Sheet</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('report.ledger'))
        <li class="nav-item">
            <a href="{{ url('reports/ledger') }}" class="nav-link {{ isActive('reports/ledger') }}">
                <p style="margin-left:30px"> <i class="fas fa-book"></i> Ledger Book</p>
            </a>
        </li>
        @endif
    </ul>
</li>
{{--Reports menu ends here--}}
<li class="nav-item has-treeview {{ isActive(['role/*','user/*','accounts/ledger*','settings/company*','settings/chart-of-account','settings/*']) }}">
    <a href="#" class="nav-link {{isActive(['role/*','user/*','accounts/ledger*','settings/company*','settings/chart-of-account','settings/*']) }}">
        <i class="nav-icon fas fa-tools"></i>
        <p>Account Settings<i class="fas fa-angle-left right"></i> </p>
    </a>

    <ul class="nav nav-treeview" style="background-color: #292929">
        @if(canAbleToSee('user.index'))
        <li class="nav-item">
            <a href="{{ url('user/index') }}" class="nav-link {{ isActive('user/index') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> User List</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('role.index'))
        <li class="nav-item">
            <a href="{{ url('role/index') }}" class="nav-link {{ isActive('role/index') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Role List</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('company.add'))
        {{-- <li class="nav-item">
            <a href="{{ url('settings/company/add') }}" class="nav-link {{ isActive('settings/company/add') }}">
                <p style="margin-left:30px"><i class="fas fa-wrench"></i> Company Setup</p>
            </a>
        </li> --}}
        @endif
        @if(canAbleToSee('ledger.add'))
        <li class="nav-item">
            <a href="{{ url('accounts/ledger') }}" class="nav-link {{ isActive('accounts/ledger') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Create Ledger Or Group</p>
            </a>
        </li>
        @endif
        {{-- @if(canAbleToSee('bank_ledger.add'))
        <li class="nav-item">
            <a href="{{ url('accounts/bank_ledger') }}" class="nav-link {{ isActive('accounts/bank_ledger') }}">
                <p style="margin-left:30px"><i class="far fa-arrow-alt-circle-right"></i> Create BankLedger/Group</p>
            </a>
        </li>
        @endif --}}
        @if(canAbleToSee('settings.chart_of_account'))
        <li class="nav-item">
            <a href="{{ url('settings/chart-of-account') }}" class="nav-link {{ isActive('settings/chart-of-account') }}">
                <p style="margin-left:30px"><i class="fas fa-tasks"></i> Chart Of Account</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('settings.list_of_groups'))
        <li class="nav-item">
            <a href="{{ url('settings/list-of-groups') }}" class="nav-link {{ isActive('settings/list-of-groups') }}">
                <p style="margin-left:30px"><i class="fas fa-tasks"></i> List Of Groups</p>
            </a>
        </li>
        @endif
        @if(canAbleToSee('settings.primary_settings_add'))
        <li class="nav-item">
            <a href="{{ url('settings/primary_settings') }}" class="nav-link {{ isActive('settings/primary_settings') }}">
                <p style="margin-left:30px"><i class="fas fa-sliders-h"></i> Primary Settings</p>
            </a>
        </li>
        @endif
    </ul>
</li>

{{--------------}}
    <style>
        .nav-sidebar .nav-link p {
            display: inline-block;
            margin: 0;
            font-size: 14px;
        }
    </style>

