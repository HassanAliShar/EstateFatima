<?php

use App\Http\Controllers\Agents\AcustomerController;
use App\Http\Controllers\Agents\AdashboardController;
use App\Http\Controllers\Agents\AexpanseController;
use App\Http\Controllers\Agents\AinstallmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDocumentController;
use App\Http\Controllers\CustomersDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpanseController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\FranchisePaymentController;
use App\Http\Controllers\FranchisePlotController;
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\PlotsController;
use App\Http\Controllers\SubAgentController;
use App\Http\Controllers\Users\UserController;
use App\Models\Franchise;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

Route::post('/create_user',[RegisterController::class , 'create_user'])->name('create-user');
Route::post('/user_login', [LoginController::class, 'user_login'])->name('user.login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{id}',[UserController::class, 'profile'])->name('user.profile');
    Route::post('/update_profile/{id}',[UserController::class,'update_profile'])->name('user.profile_update');

    // Routes for customer
    Route::get('/customer/add',[CustomerController::class, 'add'])->name('add.cusotmer');
    Route::get('/customer/manage', [CustomerController::class, 'index'])->name('manage.customer');
    Route::post('/storecustomer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/show_details/customer/{id}', [CustomerController::class, 'show_customer'])->name('customer.show_details');
    Route::post('/update_customer', [CustomerController::class, 'update_customer'])->name('admin.update_customer');
    Route::get('/nominee_details_show/{id}', [CustomerController::class , 'nominee_details_show'])->name('admin.nominee_details_show');
    Route::post('/update_nominee',[CustomerController::class , 'update_nominee'])->name('admin.updaate_nominee');
    Route::get('customer/info/{id}',[CustomerController::class , 'view_customer_form'])->name('admin.view.customer.form');
    Route::get('customer/destroy/{customer}',[CustomerController::class , 'destroy'])->name('admin.view.customer.delete');
    Route::get('customer/cancelled/',[CustomerController::class , 'cancelledCustomers'])->name('admin.manage.cancelled.customers');

    // Routes for Plots
    Route::get('/plots/add', [PlotsController::class ,'add'])->name('plots.add')->middleware('admin');
    Route::get('/plots', [PlotsController::class, 'index'])->name('plots.manage')->middleware('admin');
    Route::post('/storeplot', [PlotsController::class, 'store'])->name('plot.store')->middleware('admin');
    Route::get('/plots/{block_id}/{cat_id}', [PlotsController::class , 'show_plot_blockid'])->name('plot.block.id');
    Route::get('/get_plot/{id}',[PlotsController::class , 'getplot'])->name('plots.get');
    Route::get('/plot/edit/{id}',[PlotsController::class , 'edit'])->name('plots.edit');
    Route::get('/plot/delete/{id}',[PlotsController::class , 'delete'])->name('plots.delete');
    Route::post('/plot/update',[PlotsController::class , 'update'])->name('plots.update');
    Route::get('/plot/get-franchises-plots',[PlotsController::class , 'get_franchises_plots'])->name('plots.get.franchises.plots');
    Route::get('/plot/get-with-block/{block_id}/{id}',[PlotsController::class , 'get_plot_with_block'])->name('get.plot.with.block');

    Route::post('/plot/franchises/accept/{id}',[PlotsController::class , 'accept_plot'])->name('plots.franchises.accept');
    Route::get('/plot/franchises/reject/{id}',[PlotsController::class , 'reject_plot'])->name('plots.franchises.reject');

    // Routes for Blocks
    Route::get('/blocks',[BlockController::class , 'index'])->name('block.manage')->middleware('admin');
    Route::get('/block/edit/{id}',[BlockController::class, 'edit'])->name('block.edit')->middleware('admin');
    Route::get('/block/add',[BlockController::class , 'create'])->name('block.add')->middleware('admin');
    Route::get('block/delete/{id}',[BlockController::class,'delete'])->name('block.delete')->middleware('admin');
    Route::post('/block/store',[BlockController::class,'store'])->name('block.store')->middleware('admin');
    Route::post('/block/update', [BlockController::class,'update'])->name('block.update')->middleware('admin');

    // Routes for franchise
    Route::get('/franchise/add', [FranchiseController::class,'add'])->name('franchise.add')->middleware('admin');
    Route::get('/franchise',  [FranchiseController::class, 'index'])->name('franchise.manage')->middleware('admin');
    Route::post('/storefranchise', [FranchiseController::class, 'store'])->name('franchise.store')->middleware('admin');
    Route::get('/franchise/active/{id}', [FranchiseController::class, 'franchise_active'])->name('franchise.active')->middleware('admin');
    Route::get('/franchise/edit/{id}',[FranchiseController::class ,'edit'])->name('franchise.edit')->middleware('admin');
    Route::get('/franchise/delete/{id}',[FranchiseController::class, 'delete'])->name('franchise.delete')->middleware('admin');
    Route::post('/franchise/update', [FranchiseController::class, 'update'])->name('franchise.update')->middleware('admin');

    Route::get('/franchise/payments/{id}', [FranchisePaymentController::class, 'franchise_payments'])->name('franchise.payments')->middleware('admin');
    Route::get('/franchise/payments/delete/{id}', [FranchisePaymentController::class, 'delete'])->name('franchise.payments.delete')->middleware('admin');
    Route::get('/franchise/payments/edit/{id}', [FranchisePaymentController::class, 'edit'])->name('franchise.payments.edit')->middleware('admin');
    Route::post('/franchise/payments/update', [FranchisePaymentController::class, 'update'])->name('franchise.payments.update')->middleware('admin');
    Route::get('/franchise/payments/history/{id}/{franchise_id}/{date}', [FranchisePaymentController::class, 'history'])->name('franchise.payments.history')->middleware('admin');

    // Routes for installments
    Route::get('/add/installment', [InstallmentController::class, 'create'])->name('installment.payment')->middleware('admin');
    Route::get('/installment/show/{id}',[InstallmentController::class, 'show'])->name('installment.show')->middleware('admin');
    Route::get('/show/customer_info/{id}', [InstallmentController::class, 'show_customer_info'])->name('installment.customer_info')->middleware('admin');
    Route::get('/customer_installment_add/{customer_id}/{booking_order_id}/{booking_id}', [InstallmentController::class ,'create_customer_installment'])->name('customer.installent.add')->middleware('admin');
    Route::post('/installment/add', [InstallmentController::class , 'store'])->name('installment.add')->middleware('admin');
    Route::get('/installment/all_invoice/{id}',[InstallmentController::class, 'viwe_all_invoices'])->name('installment.all.invoices')->middleware('admin');
    Route::get('/get_unique_invoice/{ins_id}/{id}',[InstallmentController::class, 'get_unique_invoice'])->name('installment.unique.invoice')->middleware('admin');
    Route::get('/installment/delete/{id}/{c_id}', [InstallmentController::class, 'delete_invoice'])->name('installment.delete')->middleware('admin');
    Route::get('/installment/remaining/installment', [InstallmentController::class, 'remaining_installment_users'])->name('installment.remaining')->middleware('admin');
    Route::get('/edit_customer_installment/{id}',[AinstallmentController::class, 'edit_installment'])->name('admin.edit_customer_installment')->middleware('admin');
    Route::post('/update_customer_installment',[AinstallmentController::class, 'update_customer_installment'])->name('admin.update_customer.installment')->middleware('admin');


    Route::get('/customer/document/show/{id}',[CustomerDocumentController::class, 'index'])->name('customer.document.manage');
    Route::get('/customer/document/add/{id}',[CustomerDocumentController::class, 'add'])->name('customer.document.add');
    Route::get('/customer/document/view/{id}',[CustomerDocumentController::class, 'view'])->name('customer.document.view');
    Route::get('/customer/document/edit/{id}',[CustomerDocumentController::class, 'edit'])->name('customer.document.edit');
    Route::get('/customer/document/delete/{id}',[CustomerDocumentController::class, 'delete'])->name('customer.document.delete');
    Route::post('/customer/document/store/{id}',[CustomerDocumentController::class, 'store'])->name('customer.document.store');
    Route::post('/customer/document/update/{id}',[CustomerDocumentController::class, 'update'])->name('customer.document.update');

    // Routes for Expanses
    Route::get('/expanse',[ExpanseController::class,'index'])->name('expase.manage');
    Route::get('/expanse/edit/{id}',[ExpanseController::class,'edit'])->name('expanse.edit');
    Route::get('/expanse/add',[ExpanseController::class,'create'])->name('expanse.add');
    Route::post('/expanse/store', [ExpanseController::class,'store'])->name('expanse.store');
    Route::get('/expanse/delete/{id}',[ExpanseController::class,'delete'])->name('expanse.delete');
    Route::post('/expanse/update',[ExpanseController::class,'update'])->name('expanse.update');


    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('dashboard.index')->middleware('admin');


    // All Routes for Franchises
    Route::get('/agent/dashboard',[AdashboardController::class,'index'])->name('agent.dashboard.index')->middleware('franchise');


    Route::get('/agent/plots/add',[FranchisePlotController::class,'add'])->name('agent.plots.add')->middleware('franchise');
    Route::post('/agent/plots/store',[FranchisePlotController::class,'store'])->name('agent.plots.store')->middleware('franchise');
    Route::post('/agent/plots/update',[FranchisePlotController::class,'update'])->name('agent.plots.update')->middleware('franchise');
    Route::get('/agent/plots/edit/{id}',[FranchisePlotController::class,'edit'])->name('agent.plots.edit')->middleware('franchise');
    Route::get('/agent/plots/',[FranchisePlotController::class,'index'])->name('agent.plots.manage')->middleware('franchise');
    Route::get('/agent/plots/delete/{id}',[FranchisePlotController::class,'delete'])->name('agent.plots.delete')->middleware('franchise');

    // Route for agent Expanses
    Route::get('/agent/expanse',[AexpanseController::class,'index'])->name('agent.expase.manage')->middleware('franchise');
    Route::get('/agent/expanse/edit/{id}',[AexpanseController::class,'edit'])->name('agent.expanse.edit')->middleware('franchise');
    Route::get('/agent/expanse/add',[AexpanseController::class,'create'])->name('agent.expanse.add')->middleware('franchise');
    Route::post('/agent/expanse/store', [AexpanseController::class,'store'])->name('agent.expanse.store')->middleware('franchise');
    Route::get('/agent/expanse/delete/{id}',[AexpanseController::class,'delete'])->name('agent.expanse.delete')->middleware('franchise');
    Route::post('/agent/expanse/update',[AexpanseController::class,'update'])->name('agent.expanse.update')->middleware('franchise');


    // Routes For sub agents start here
    Route::get('/agent/sub-agent/manage', [SubAgentController::class, 'index'])->name('agent.subagent.manage')->middleware('franchise');
    Route::get('/agent/sub-agent/add', [SubAgentController::class, 'add'])->name('agent.subagent.add')->middleware('franchise');
    Route::post('/agent/sub-agent/store', [SubAgentController::class, 'store'])->name('agent.subagent.store')->middleware('franchise');
    Route::get('/agent/sub-agent/edit/{id}', [SubAgentController::class, 'edit'])->name('agent.subagent.edit')->middleware('franchise');
    Route::post('/agent/sub-agent/update', [SubAgentController::class, 'update'])->name('agent.subagent.update')->middleware('franchise');
    Route::get('/agent/sub-agent/delete/{id}', [SubAgentController::class, 'destroy'])->name('agent.subagent.delete')->middleware('franchise');
    Route::get('/agent/sub-agent/commission', [SubAgentController::class, 'sub_agents_commission'])->name('agent.subagent.commission');

    // Routes for agent installments
    Route::get('/agent/add/installment', [AinstallmentController::class, 'create'])->name('agent.installment.payment')->middleware('franchise');
    Route::get('/agent/installment/show/{id}',[AinstallmentController::class, 'show'])->name('agent.installment.show')->middleware('franchise');
    Route::get('/agent/show/customer_info/{id}', [AinstallmentController::class, 'show_customer_info'])->name('agent.installment.customer_info')->middleware('franchise');
    Route::get('/agent/customer_installment_add/{customer_id}/{booking_order_id}/{booking_id}', [AinstallmentController::class ,'create_customer_installment'])->name('agent.customer.installent.add')->middleware('franchise');
    Route::post('/agent/installment/add', [AinstallmentController::class , 'store'])->name('agent.installment.add')->middleware('franchise');
    Route::get('/agent/installment/all_invoice/{id}',[AinstallmentController::class, 'viwe_all_invoices'])->name('agent.installment.all.invoices')->middleware('franchise');
    Route::get('/agent/installment/remaining',[AinstallmentController::class, 'remaining_installment_users'])->name('agent.installment.remaining')->middleware('franchise');
    Route::get('/agent/get_unique_invoice/{ins_id}/{id}',[AinstallmentController::class, 'get_unique_invoice'])->name('agent.installment.unique.invoice')->middleware('franchise');
    Route::get('/agent/installment/delete/{id}/{c_id}', [AinstallmentController::class, 'delete_invoice'])->name('agent.installment.delete')->middleware('franchise');
    Route::get('/agent/edit_customer_installment/{id}',[AinstallmentController::class, 'edit_installment'])->name('agent.edit_customer_installment')->middleware('franchise');
    Route::post('/agent/update_customer_installment',[AinstallmentController::class, 'update_customer_installment'])->name('agent.update_customer.installment')->middleware('franchise');

    // Routes for Agent customer
    Route::get('/agent/customer/add',[AcustomerController::class, 'add'])->name('agent.add.cusotmer')->middleware('franchise');
    Route::get('/agent/customer/manage', [AcustomerController::class, 'index'])->name('agent.manage.customer')->middleware('franchise');
    Route::post('/agent/storecustomer', [AcustomerController::class, 'store'])->name('agent.customer.store')->middleware('franchise');
    Route::get('/agent/show_details/customer/{id}', [AcustomerController::class, 'show_customer'])->name('agent.customer.show_details')->middleware('franchise');
    Route::post('/agent/update_customer', [AcustomerController::class, 'update_customer'])->name('agent.update_customer')->middleware('franchise');
    Route::get('/agent/nominee_details_show/{id}', [AcustomerController::class , 'nominee_details_show'])->name('agent.nominee_details_show')->middleware('franchise');
    Route::post('/agent/update_nominee',[AcustomerController::class , 'update_nominee'])->name('agent.updaate_nominee')->middleware('franchise');
    Route::get('/agent/check',[AcustomerController::class , 'checkUser'])->name('agent.check');
    Route::get('/agent/customer/destroy/{customer}',[AcustomerController::class , 'destroy'])->name('agent.customer.delete');
    Route::get('/agent/customer/cancelled',[AcustomerController::class , 'cancelledCustomers'])->name('agent.customer.cancelled');

    Route::post('/contactUs',[ContactController::class, 'contactus'])->name('contact.us');

    Route::get('/logout', function () {
        if(session()->has('email')){
            session()->flush();
            // session()->save();
            return redirect('/');
        }

    })->name('logout');

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return "Cache is cleared";
    });
});
Route::get('/db-run-backup', function () {
    Artisan::call('backup:run');
    // Additional code if needed
});
Route::get('/user/info',[CustomersDataController::class,'index'])->name('user.info');
Route::post('/search/user/info',[CustomersDataController::class,'search_user_info'])->name('search.user.info');
Route::get('user/file/info/{id}',[CustomersDataController::class,'get_user_file'])->name('get.user.file');
Route::get('user/file/installment/info/{ins_id}/{id}',[CustomersDataController::class,'get_unique_invoice'])->name('get.user.file.installment');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
