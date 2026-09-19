<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\AdminAcademyController;
use App\Http\Controllers\AdminDiscountController;
use App\Http\Controllers\AdminFAQController;
use App\Http\Controllers\AdminPackageController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\Auth\MyRegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CsrController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Moadian\CustomerController;
use App\Http\Controllers\Moadian\InvoiceController;
use App\Http\Controllers\Moadian\ProductController;
use App\Http\Controllers\Moadian\TaxpayerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\SubLandingController;
use App\Http\Controllers\UserTicketController;
use App\Moadian\Moadian;
use App\Models\Moadian\Taxpayer;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController2;
use Ipe\Sdk\Facades\SmsIr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/setup/init', [SetupController::class, 'init']);


Route::group(['middleware' => ['web', 'https', 'visitlog', 'convert_numbers', 'firewall.all']], function () {

    //landing and subs
    Route::get('/', [LandingController::class, 'index'])->name('index');
    Route::post('/ContactUs', [LandingController::class, 'storeContactForm'])->name('index.contactus');
    Route::get('/blog', [SubLandingController::class, 'index'])->name('blog.index');
    Route::get('/academy', [AcademyController::class, 'index'])->name('academy.index');
    Route::get('/academy/item/{id}/{title}', [AcademyController::class, 'item'])->name('academy.item');
    Route::get('/blogCategory', [SubLandingController::class, 'ctegoricalindex'])->name('blog.ctegoricalindex');
    Route::get('/blog/{slug}', [SubLandingController::class, 'show'])->name('blog.show');
    Route::get('/AboutUs', [SubLandingController::class, 'indexAboutUs'])->name('aboutUs');
    Route::get('/FAQ', [SubLandingController::class, 'indexFAQ'])->name('FAQ');
    Route::get('/rules', [SubLandingController::class, 'indexRules'])->name('rules');
    Route::get('/csr/index', [CsrController::class, 'index'])->name('csr.index');
    Route::post('/csr/generate', [CsrController::class, 'generate'])->name('csr.generate');

    Auth::routes();
    Route::get('/register/mobile', [MyRegisterController::class, 'registerMobile'])->name('register.mobile');
    Route::post('/register/send-code', [MyRegisterController::class, 'sendCode'])->name('register.send-code');
    Route::post('/register/verify-mobile', [MyRegisterController::class, 'verifyMobile'])->name('register.verify-mobile');
    Route::get('/reset-password/form', [ResetPasswordController::class, 'showResetForm'])->name('reset-password.form');
    Route::post('/reset-password/send-code', [ResetPasswordController::class, 'sendCode'])->name('reset-password.send-code');
    Route::post('/reset-password/reset', [ResetPasswordController::class, 'reset'])->name('reset-password.reset');



    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    //site
    Route::get('/not-access', [App\Http\Controllers\SiteController::class, 'notAccess'])->name('site.notAccess');



    Route::get('/role/index', [\App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
    Route::get('/role/edit/{id}', [\App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    Route::get('/role/delete/{id}', [\App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete');
    Route::post('/role/update', [\App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
    Route::get('/role/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
    Route::post('/role/insert', [\App\Http\Controllers\RoleController::class, 'insert'])->name('role.insert');

    Route::get('/user/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::post('/user/update/other', [App\Http\Controllers\UserController::class, 'updateOther'])->name('user.update.other');
    Route::post('/user/reset-password/other', [App\Http\Controllers\UserController::class, 'resetPasswordOther'])->name('user.reset.password.other');
    Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/user/insert', [App\Http\Controllers\UserController::class, 'insert'])->name('user.insert');
    Route::get('/user/login-with-id/{id}', [App\Http\Controllers\UserController::class, 'loginWithId'])->name('user.login-with-id');
    Route::get('/user/detail/{id}', [App\Http\Controllers\UserController::class, 'detail'])->name('user.detail');


    Route::get('/infinite-package/info/{id}', [App\Http\Controllers\PackageController::class, 'infiniteInfo'])->name('infinite-package.info');
    Route::get('/public-package/info/{id}', [App\Http\Controllers\PackageController::class, 'publicInfo'])->name('public-package.info');

    Route::post('/custom-package/infinite/register', [App\Http\Controllers\UserController::class, 'registerInfinite'])->name('custom-package.infinite.register');
    Route::post('/custom-package/public/register', [App\Http\Controllers\UserController::class, 'registerPublic'])->name('custom-package.public.register');



    Route::get('/setting/sms', [SettingController::class, 'smsSetting'])->name('setting.sms');
    Route::post('/setting/sms/update', [SettingController::class, 'smsSettingUpdate'])->name('setting.sms.update');

    //special permissions
    Route::get('/special-permission/index', [\App\Http\Controllers\SpecialPermissionController::class, 'index'])->name('special-permission.index');
    Route::post('/special-permission/insert', [\App\Http\Controllers\SpecialPermissionController::class, 'insert'])->name('special-permission.insert');
    Route::post('/special-permission/update', [\App\Http\Controllers\SpecialPermissionController::class, 'update'])->name('special-permission.update');


    //taxpayer
    Route::get('/taxpayer/index',[TaxpayerController::class,'index'])->name('taxpayer.index');
    Route::get('/taxpayer/create',[TaxpayerController::class,'create'])->name('taxpayer.create');
    Route::post('/taxpayer/insert',[TaxpayerController::class,'insert'])->name('taxpayer.insert');
    Route::get('/taxpayer/edit/{id}',[TaxpayerController::class,'edit'])->name('taxpayer.edit');
    Route::post('/taxpayer/update',[TaxpayerController::class,'update'])->name('taxpayer.update');
    Route::get('/taxpayer/delete/{id}',[TaxpayerController::class,'delete'])->name('taxpayer.delete');
    Route::get('/taxpayer/restore/{id}',[TaxpayerController::class,'restore'])->name('taxpayer.restore');

    //customers
    Route::get('/customer/index',[CustomerController::class,'index'])->name('customer.index');
    Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
    Route::post('/customer/insert',[CustomerController::class,'insert'])->name('customer.insert');
    Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('/customer/update',[CustomerController::class,'update'])->name('customer.update');
    Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');

    //invoices
    Route::get('/invoice/create',[InvoiceController::class,'create'])->name('invoice.create');
    Route::get('/invoice-gold/create',[InvoiceController::class,'createGold'])->name('invoice-gold.create');
    Route::post('/invoice/insert',[InvoiceController::class,'insert'])->name('invoice.insert');
    Route::get('/invoice/edit/{id}',[InvoiceController::class,'edit'])->name('invoice.edit');
    Route::get('/invoice/admin-edit/{id}',[InvoiceController::class,'adminEdit'])->name('invoice.admin-edit');
    Route::get('/invoice/print/{id}',[InvoiceController::class,'print'])->name('invoice.print');
    Route::post('/invoice/update',[InvoiceController::class,'update'])->name('invoice.update');
    Route::get('/invoice/send/{id}',[InvoiceController::class,'send'])->name('invoice.send');
    Route::get('/invoice/delete/{id}',[InvoiceController::class,'delete'])->name('invoice.delete');
    Route::get('/invoice/expire/{id}',[InvoiceController::class,'expire'])->name('invoice.expire');
    Route::get('/invoice/index',[InvoiceController::class,'index'])->name('invoice.index');
    Route::get('/invoice/index-draft',[InvoiceController::class,'index'])->name('invoice.index-draft');
    Route::get('/invoice/copy/{id}',[InvoiceController::class,'copy'])->name('invoice.copy');
    Route::get('/invoice/verify/{id}',[InvoiceController::class,'verify'])->name('invoice.verify');
    Route::get('/invoice/can-insert/ajax/{taxpayer_id}',[InvoiceController::class,'canInsertInvoiceAjax'])->name('invoice.can-insert.ajax');


    Route::get('/payment/index', [PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/pricing', [PaymentController::class, 'pricing'])->name('payment.pricing');
    Route::post('/payment/infinite-package', [PaymentController::class, 'infinitePackage'])->name('payment.infinite-package');
    Route::post('/payment/public-package', [PaymentController::class, 'publicPackage'])->name('payment.public-package');
    Route::post('/payment/saman/verify', [PaymentController::class, 'samanVerify'])->name('payment.saman.verify');
    Route::post('/payment/sayan/verify', [PaymentController::class, 'sayanVerify'])->name('payment.sayan.verify');




    Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/insert', [ProductController::class, 'insert'])->name('product.insert');
    Route::get('/product/add-to-list/{id}', [ProductController::class, 'addToList'])->name('product.add-to-list');

    Route::get('/user/info/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.info.edit');
    Route::post('/user/info/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.info.update');
    Route::post('/user/info/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('user.info.update-password');
    Route::get('/user/referral/index', [App\Http\Controllers\UserController::class, 'referralIndex'])->name('user.referral.index');

    //faq
    Route::get('/FAQ/index/{id}', [AdminFAQController::class,'index'])->name('FAQ.index');
    Route::get('/FAQ/create', [AdminFAQController::class,'create'])->name('FAQ.create');
    Route::post('/FAQ/store', [AdminFAQController::class,'store'])->name('FAQ.store');
    Route::get('/FAQ/edit/{id}', [AdminFAQController::class,'edit'])->name('FAQ.edit');
    Route::post('/FAQ/Update', [AdminFAQController::class,'update'])->name('FAQ.update');
    Route::get('/FAQ/delete/{id}',[AdminFAQController::class,'delete'])->name('FAQ.delete');
    //hfaq
    Route::get('/HFAQ', [AdminFAQController::class,'indexH'])->name('HFAQ.indexH');
    Route::get('/HFAQ/create', [AdminFAQController::class,'createH'])->name('HFAQ.createH');
    Route::post('/HFAQ/store', [AdminFAQController::class,'storeH'])->name('HFAQ.storeH');
    Route::get('/HFAQ/edit/{id}', [AdminFAQController::class,'editH'])->name('HFAQ.editH');
    Route::post('/HFAQ/Update', [AdminFAQController::class,'updateH'])->name('HFAQ.updateH');
    //post
    Route::get('/posts', [AdminPostController::class,'index'])->name('posts.index');
    Route::get('/posts/create', [AdminPostController::class,'create'])->name('posts.create');
    Route::post('/posts/store', [AdminPostController::class,'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [AdminPostController::class,'edit'])->name('posts.edit');
    Route::post('/posts/Update', [AdminPostController::class,'update'])->name('posts.update');
    Route::get('/posts/delete/{id}',[AdminPostController::class,'delete'])->name('posts.delete');
    //contactus
    Route::get('/AdminContactUs', [DashboardController::class,'indexContactUs'])->name('AdminContactUs.index');
    Route::get('/AdminContactUs/show/{id}', [DashboardController::class,'showContactUs'])->name('AdminContactUs.show');

    Route::get('/file-manager/index', [FileManagerController::class, 'fileManager'])->name('file-manager.index');
    Route::post('/file-manager/insert', [FileManagerController::class, 'fileInsert'])->name('file-manager.insert');
    Route::get('/file-manager/remove/{id}', [FileManagerController::class, 'fileRemove'])->name('file-manager.delete');

    //discounts
    Route::get('/discount/create', [AdminDiscountController::class, 'create'])->name('discount.create');
    Route::get('/discount/index', [AdminDiscountController::class, 'index'])->name('discount.index');
    Route::post('/discount/insert', [AdminDiscountController::class, 'insert'])->name('discount.insert');
    Route::get('/discount/edit/{id}', [AdminDiscountController::class, 'edit'])->name('discount.edit');
    Route::post('/discount/update', [AdminDiscountController::class, 'update'])->name('discount.update');
    Route::get('/discount/delete/{id}', [AdminDiscountController::class, 'delete'])->name('discount.delete');
    Route::post('/discount/verify', [AdminDiscountController::class, 'verify'])->name('discount.verify');

    //packages
    Route::get('/infinite-package/index', [AdminPackageController::class, 'infiniteIndex'])->name('infinite-package.index');
    Route::get('/public-package/index', [AdminPackageController::class, 'publicIndex'])->name('public-package.index');
    Route::post('/package/insert', [AdminPackageController::class, 'insert'])->name('package.insert');
    Route::get('/package/delete/{type}/{id}', [AdminPackageController::class, 'delete'])->name('package.delete');

    //academy
    Route::get('/admin/academy/index', [AdminAcademyController::class, 'index'])->name('admin.academy.index');
    Route::post('/admin/academy/insert', [AdminAcademyController::class, 'insert'])->name('admin.academy.insert');
    Route::post('/admin/academy/delete', [AdminAcademyController::class, 'delete'])->name('admin.academy.delete');
    Route::post('/admin/academy/update', [AdminAcademyController::class, 'update'])->name('admin.academy.update');

    Route::group(['prefix'=>'user','middleware'=>['web', 'auth','PreventBackHistory']], function (){
        Route::get('tickets/ongoing', [UserTicketController::class,'TicketsOngoingIndex'])->name('UserTickets.TicketsOngoingIndex');
        Route::get('tickets/closed', [UserTicketController::class,'TickeClosedIndex'])->name('UserTickets.TickeClosedIndex');
        Route::get('closeticket/{ticket_id}', [UserTicketController::class,'closeTicket'])->name('UserTickets.closeTicket');
        Route::get('newticket/create', [UserTicketController::class,'createTicket'])->name('UserTickets.createTicket');
        Route::post('newticket/store', [UserTicketController::class,'storeTicket'])->name('UserTickets.storeTicket');
        Route::get('tickets/ongoing/{ticket_id}', [UserTicketController::class,'ShowOngoing'])->name('UserTickets.ShowOngoing');
        Route::get('tickets/closed/{ticket_id}', [UserTicketController::class,'ShowClosed'])->name('UserTickets.ShowClosed');
        Route::post('comment/post', [UserTicketController::class,'PostComment'])->name('UserTickets.PostComment');
    });
});
