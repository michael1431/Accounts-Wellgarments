<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('reboot', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    file_put_contents(storage_path('logs/laravel.log'),'');
    Artisan::call('key:generate');
    Artisan::call('config:cache');
    return '<center><h1>System Rebooted!</h1></center>';
});

// use Illuminate\Support\Facades\Artisan;

    /** Routes added by smartrahat */
    Route::group(['middleware'=>'CheckPermission'],function(){
    //Change Password by SAKIB
    Route::get('change-password','DashboardController@changePassword')->name('change.password');
    Route::post('update-password','DashboardController@updatePassword')->name('update.password');
    
    Route::get('user/index', 'UserController@index')->name("user.index");
    Route::get('user/create', 'UserController@create')->name("user.create");
    Route::post('user/store', 'UserController@store')->name("user.store");
    Route::get('user/show','UserController@show')->name("user.show");
    Route::get('user/edit/{id}', 'UserController@edit')->name("user.edit");
    Route::patch('user/{id}/update', 'UserController@update')->name("user.update");
    Route::delete('user/delete/{id}', 'UserController@destroy')->name("user.delete");

    Route::get('role/index', 'RoleController@index')->name("role.index");
    Route::get('role/create', 'RoleController@create')->name("role.create");
    Route::post('role/store', 'RoleController@store')->name("role.store");
    Route::get('role/edit/{id}', 'RoleController@edit')->name("role.edit");
    Route::patch('role/{id}/update', 'RoleController@update')->name("role.update");
    Route::delete('role/delete/{id}', 'RoleController@destroy')->name("role.delete");
//    Route::get('company','CompanyController@index');

//    Route::get('/download-backup', 'Hrm\HrmInformationController@download'); // added by smartrahat 2019.07.07



    /* Account Principle Start */
    // Route::get("accounts/principle","Account\AccountPrincipleController@index")->name("ac.principle");
    // Route::post("accounts/principle-store","Account\AccountPrincipleController@store")->name('acprinciple.store');
    // Route::post('accounts/principle-destroy',"Account\AccountPrincipleController@destroy")->name('acprinciple.destroy');
    // Route::get("accounts/principle/edit/{id}","Account\AccountPrincipleController@edit")->name('acprinciple.edit');
    // Route::post("accounts/principle/update/{id}","Account\AccountPrincipleController@update")->name('acprinciple.update');

    /* Account Principle Start */

    /* Account Group Start */

    // Route::get("accounts/group","Account\AccountGroupController@index")->name("acgroup.add");
    // Route::post("accounts/group-store","Account\AccountGroupController@store")->name('acgroup.store');
    // Route::post('accounts/group-destroy',"Account\AccountGroupController@destroy")->name('acgroup.destroy');
    // Route::get("accounts/group/edit/{id}","Account\AccountGroupController@edit")->name('acgroup.edit');
    // Route::post("accounts/group/update/{id}","Account\AccountGroupController@update")->name('acgroup.update');

    /* Account Group End */


    /* Ledger Create Start */
    Route::get("accounts/ledger","Account\AccountLedgerController@index")->name('ledger.add');
    Route::post("accounts/ledger-store","Account\AccountLedgerController@store")->name('ledger.store');
    Route::get("accounts/ledger/{id}","Account\AccountLedgerController@edit")->name('ledger.edit');
    Route::post("accounts/ledger/update/{id}","Account\AccountLedgerController@update")->name('ledger.update');
    Route::post('accounts/ledger-destroy',"Account\AccountLedgerController@destroy")->name('ledger.destroy');

    // Route::get("accounts/bank_ledger","Account\AccountLedgerController@index")->name('bank_ledger.add');
    // Route::post("accounts/bank_ledger-store","Account\AccountLedgerController@store")->name('bank_ledger.store');
    // Route::get("accounts/bank_ledger/{id}","Account\AccountLedgerController@edit")->name('bank_ledger.edit');
    // Route::post("accounts/bank_ledger/update/{id}","Account\AccountLedgerController@update")->name('bank_ledger.update');
    // Route::post('accounts/bank_ledger-destroy',"Account\AccountLedgerController@destroy")->name('bank_ledger.destroy');



    Route::get('reports/ledger','Account\AccountLedgerController@ledger_reports')->name('report.ledger');

    /* Ledger Create End */


    //======================================================================================
    // ** Ledger Group by Ahmed start....
    // //======================================================================================
    // Route::get("ledger/groups","Account\LedgerGroupController@index")->name("ledgerGroup.create");
    // Route::post("ledger/group-store","Account\LedgerGroupController@store")->name('ledgerGroup.store');
    // Route::post('ledger/group-destroy',"Account\LedgerGroupController@destroy")->name('ledgerGroup.destroy');
    // Route::get("ledger/group/edit/{id}","Account\LedgerGroupController@edit")->name('ledgerGroup.edit');
    // Route::post("ledger/group/update/{id}","Account\LedgerGroupController@update")->name('ledgerGroup.update');


    //This is testing purposes by Ahmed
    // Route::get('settings/chart-of-account',function (){
    //     return view('account.settings.chart-of-accounts');
    // });
    Route::get('settings/chart-of-account','Account\DisplayController@chartOfAccount')->name('settings.chart_of_account');
    Route::get('settings/list-of-groups','Account\DisplayController@listOfGroups')->name('settings.list_of_groups');
    Route::get('settings/primary_settings','Account\DisplayController@primarySettings')->name('settings.primary_settings_add');
    Route::post('settings/primary_settings','Account\DisplayController@primarySettingsStore')->name('settings.primary_settings_store');
    Route::post('settings/unit-setup','Account\DisplayController@unitSetup')->name('unit.setup');

    //this is testing purposes by Ahmed
    // Route::get('settings/list-of-groups',function (){
    //     return view('account.settings.list-of-groups');
    // });


    //======================================================================================
    // **.Account by Ahmed start....
    //======================================================================================
    Route::get("accounts/journal/lists","Account\JournalController@index")->name("journal.lists");
    Route::get("accounts/journal/create","Account\JournalController@create")->name("journal.add");
    Route::post("accounts/journal/store","Account\JournalController@store")->name('journal.store');


    Route::delete('accounts/journal-destroy/{id}',"Account\JournalController@destroy")->name('journal.destroy');


    Route::get("accounts/journal/edit/{id}","Account\JournalController@edit")->name('journal.edit');
    Route::get("accounts/journal/show/{id}","Account\JournalController@show")->name('journal.show');
    Route::post("accounts/journal/update/{id}","Account\JournalController@update")->name('journal.update');



    //======================================================================================
    // **CashPaymentVoucherController by Ahmed start....
    //======================================================================================
    Route::get("voucher/cash-receipt/create","Account\CashReceiptVoucherController@create")->name("cash-receipt.create");
    Route::get("display/cash-receipt/lists","Account\CashReceiptVoucherController@lists")->name("cash-receipt.lists");
    Route::get("voucher/bank-receipt/create","Account\CashReceiptVoucherController@createBank")->name("bank-receipt.create");
    Route::get("display/bank-receipt/lists","Account\CashReceiptVoucherController@listsBank")->name("bank-receipt.lists");
    Route::get("display/cash-receipt/report/{id}","Account\CashReceiptVoucherController@generate_voucher_report")->name("cash_receipt_voucher.report");




    //======================================================================================
    // **CashPaymentVoucherController by Ahmed start....
    //======================================================================================
    Route::get("display/cash-payment/lists","Account\CashPaymentVoucherController@lists")->name("cash-payment.lists");
    Route::get("voucher/cash-payment/create","Account\CashPaymentVoucherController@create")->name("cash-payment.create");
    Route::get("display/bank-payment/lists","Account\CashPaymentVoucherController@listsBank")->name("bank-payment.lists");
    Route::get("voucher/bank-payment/create","Account\CashPaymentVoucherController@createBank")->name("bank-payment.create");
    Route::get("display/cash-payment/report/{id}","Account\CashPaymentVoucherController@generate_voucher_report")->name("cash_payment_voucher.report");


    Route::get("generate/pdf","Account\CashPaymentVoucherController@generate_pdf")->name("generate.pdf");


    //======================================================================================
    // ** company setup for accounts by Ahmed start....
    //======================================================================================
    Route::get("settings/company/add","Account\CompanySetupController@index")->name("company.add");
    Route::post("settings/company-store","Account\CompanySetupController@store")->name('company.store');
    Route::get("accounts/company/edit/{id}","Account\CompanySetupController@edit")->name('company.edit');
    Route::post("accounts/company/update/{id}","Account\CompanySetupController@update")->name('company.update');
    Route::post('accounts/company-destroy',"Account\CompanySetupController@destroy")->name('company.destroy');


    //======================================================================================
    // **.Balance Sheet by Ahmed start....
    //======================================================================================

   // Route::get("accounts/balance-sheet/lists","Account\BalanceSheetController@index")->name("balance-sheet.lists");
//    Route::get("accounts/journal/create","Account\JournalController@create")->name("journal.add");
//    Route::post("accounts/journal/store","Account\JournalController@store")->name('journal.store');
//    Route::post('accounts/journal-destroy',"Account\JournalController@destroy")->name('journal.destroy');
//    Route::get("accounts/journal/edit/{id}","Account\JournalController@edit")->name('journal.edit');
//    Route::post("accounts/journal/update/{id}","Account\JournalController@update")->name('journal.update');

// });

/** Display Routes starts here*/
Route::get('display/daybook','Account\DisplayController@daybook')->name('display.daybook');
Route::get('display/receipt_payment','Account\DisplayController@receipt_payment')->name('display.receipt_payment');
// Route::get('reports/profit_loss','Account\DisplayController@profit_loss_statement')->name('report.profit_loss');
Route::get('reports/profit_loss','Account\DisplayController@income_statement')->name('report.profit_loss');
Route::get('reports/balance_sheet','Account\DisplayController@balance_sheet')->name('report.balance_sheet');
Route::get('reports/trial_balance','Account\DisplayController@trial_balance')->name('report.trial_balance');
Route::get('display/cash_book','Account\DisplayController@cash_book')->name('display.cash_book');

//Route::get('reports/ledger','Account\DisplayController@ledger')->name('ledger');

/** Display Routes ends here*/

/** Dashboard Routes */
Route::get('/','DashboardController@index')->name('dashboard');
//Route::get('/{any?}','DashboardController@index')->where('any','.*');
   

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/reboot",function (){
    Artisan::call('config:cache');
     Artisan::call('cache:clear');
    Artisan::call('view:clear');
});

Route::get('optimize',function(){
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return redirect('/');
    });
});

// Route::get('permission',function(){
//     $routeName=[];
//     $allRoutes = Route::getRoutes();
//     foreach($allRoutes as $key=>$route){
//         if($route->getName()){
//              $routeName[$key]['name']=$route->getName();
//              $routeName[$key]['label']=strtoupper(str_replace('.', ' ', $route->getName()));
//              $routeName[$key]['label_group']=strtoupper(str_before($route->getName(),'.'));
//         }   
//     }
//     //dd($routeName);
//    DB::table('permissions')->insert($routeName);
// });

Route::get('migrate',function(){
    Artisan::call('migrate');
    return redirect('/');
});

Route::get('key-gen',function(){
    Artisan::call('key:generate');
    return redirect('/');
});

Route::get('dump-autoload',function(){
    exec('composer dump-autoload');
    echo 'composer dump-autoload complete';
    //return redirect('/');
});


Auth::routes();