<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DynamicPDFController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockSupplyController;
use App\Http\Controllers\StockMedicineController;
use App\Http\Controllers\SupplyTransactionsController;
use App\Http\Controllers\MedicineTransactionsController;
use App\Http\Controllers\AppointmentTransactionController;


use App\Models\User;
use App\Notifications\ExpiredMedicineNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Appointment;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::group(['middleware' => 'auth'], function() {
 //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    
    //User::find(1)->notify(new AppointmentNotification);
    //$users = User::all();
    //Notification::send($users, new ExpiredMedicineNotification);

    Route::get('/markAsRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAsRead');

    Route::resource('user', 'UserController');

    Route::resource('permission', 'PermissionController'); //- nasa controller na yung middleware neto

  //Profile routes
    Route::get('/profile', 'UserController@profile')->name('user.profile');

  //show profile details
    Route::post('/profile', 'UserController@postProfile')->name('user.postProfile');

  //getting Password
    Route::get('/password/change', 'UserController@getPassword')->name('userGetPassword');

  //showing password
    Route::post('/password/change', 'UserController@postPassword')->name('userPostPassword');

    //changing images of user
    Route::get('/change-profile-picture/{id}',[UserController::class, 'viewImageProfile']);
    Route::post('/uploaded-image', [UserController::class, 'uploadCropImage'])->name('pic.update');

  //routs
  //for patients routes
    Route::get('/add-patient',[PatientController::class, 'addPatient']);
    Route::post('/add-patient',[PatientController::class, 'storePatient'])->name('patient.store');
    Route::get('/all-patient',[PatientController::class, 'patients']);
    Route::get('/edit-patient/{id}',[PatientController::class,'editPatient']);
    Route::post('/update-patient',[PatientController::class,'updatePatient'])->name('patient.update');
    Route::get('/delete-patient/{id}',[PatientController::class,'deletePatient']);
    Route::get('/patient-details/{id}',[PatientController::class,'patientDetails']);
    Route::get('/restore-patient/{id}',[PatientController::class,'restorePatient']);
    Route::get('/list-trash-patient',[PatientController::class,'trashPatients']);
    Route::get('/import-patient-form',[PatientController::class,'importFormPatients']);
    Route::post('/import',[PatientController::class,'importPatients'])->name('patient.import');


//for medicines routes
    Route::get('/add-medicine',[MedicineController::class, 'addMedicine']);
    Route::post('/add-medicine',[MedicineController::class, 'storeMedicine'])->name('medicine.store');
    Route::get('/all-medicine',[MedicineController::class, 'medicines']);
    Route::get('/edit-medicine/{id}',[MedicineController::class,'editMedicine']);
    Route::post('/update-medicine',[MedicineController::class,'updateMedicine'])->name('medicine.update');
    Route::get('/delete-medicine/{id}',[MedicineController::class,'deleteMedicine']);
    Route::get('/restore-medicine/{id}',[MedicineController::class,'restoreMedicine']);
    Route::get('/list-trash-medicine',[MedicineController::class, 'trashMedicines']);

    //stock medicine
    Route::get('/medicine-stock',[StockMedicineController::class, 'stocksMedicine']);
    Route::get('/medicine-stock-history/{id}',[StockMedicineController::class, 'showMedicineHistory']);
    Route::get('/edit-medicine-stock/{id}',[StockMedicineController::class,'editMedicineStock']);
    Route::put('/update-medicine-stock',[StockMedicineController::class,'updateMedicineStock']);

    //medicine transactions
    Route::post('/medicine-transactions/{stock_medicine}/storeStock', [MedicineTransactionsController::class,'storeStock'])->name('MedicineTransactions.storeStock');
    Route::get('/medicine-transactions', [MedicineTransactionsController::class,'indexMedicineTransaction']);

//for supply routes
    Route::get('/add-supply',[SupplyController::class,'addSupply']);
    Route::post('/add-supply',[SupplyController::class,'storeSupply'])->name('supply.store');
    Route::get('/all-supply',[SupplyController::class,'supplies']);
    Route::get('/edit-supplies/{id}',[SupplyController::class,'editSupply']);
    Route::post('/update-supply',[SupplyController::class,'updateSupply'])->name('supply.update');
    Route::get('/delete-supplies/{id}',[SupplyController::class,'deleteSupply']);
    Route::get('/restore-supply/{id}',[SupplyController::class,'restoreSupply']);
    Route::get('/list-trash-supply',[SupplyController::class, 'trashSupply']);

    //stock supply
    Route::get('/supply-stock',[StockSupplyController::class, 'stocksSupply']);
    Route::get('/supply-stock-history/{id}',[StockSupplyController::class, 'showSupplyHistory']);
    Route::get('/edit-supply-stock/{id}',[StockSupplyController::class,'editSupplyStock']);
    Route::put('/update-supply-stock',[StockSupplyController::class,'updateSupplyStock']);

    //supply transaction
    Route::post('/supply-transactions/{stock_supply}/storeStock', [SupplyTransactionsController::class,'storeStock'])->name('SupplyTransactions.storeStock');
    Route::get('/supply-transactions', [SupplyTransactionsController::class,'indexSupplyTransaction']);

//for services routes
    Route::get('/add-service',[ServiceController::class, 'addService']);
    Route::post('/add-service',[ServiceController::class, 'storeService'])->name('service.store');
    Route::get('/all-service',[ServiceController::class, 'services']);
    Route::get('/edit-dental-service/{id}',[ServiceController::class,'editDentalService']);
    Route::post('/update-dental-service',[ServiceController::class,'updateDentalService'])->name('dental_service.update');
    Route::get('/trash-dental-service/{id}',[ServiceController::class,'trashDentalService']);
    Route::get('/restore-dental-service/{id}',[ServiceController::class,'restoreService']);
    Route::get('/list-trash-service',[ServiceController::class, 'trashServices']);

    //////////////////////////////// axios request
    Route::get('/getAllPermission', 'PermissionController@getAllPermissions');
    Route::post("/postRole", "RoleController@store");
    Route::get('deletepermission/{id}',[PermissionController::class,'delete'])->name('permission.delete');

    Route::get("/getAllUsers", "UserController@getAll");
    Route::get("/getAllRoles", "RoleController@getAll");
    Route::get("/getAllPermissions", "PermissionController@getAll");

    /////////////axios create user
    Route::post('/account/create', 'UserController@store');
    Route::put('/account/update/{id}', 'UserController@update');
    Route::delete('/delete/user/{id}', 'UserController@delete');
    Route::get('/search/user', 'UserController@search');

  //pdf reports
    Route::get('/patient-report', [DynamicPDFController::class,'patientReport']);
    Route::get('/patient-report/pdf',[DynamicPDFController::class,'patientpdf']);

    Route::get('/medicine-report', [DynamicPDFController::class,'medicineReport']);
    Route::get('/medicine-report/pdf1',[DynamicPDFController::class,'medicinepdf']);

    Route::get('/supply-report', [DynamicPDFController::class,'supplyReport']);
    Route::get('/supply-report/pdf2',[DynamicPDFController::class,'supplypdf']);

    Route::get('/appointment-report', [DynamicPDFController::class,'appointmentReport']);
    Route::get('/appointment-report/pdf3',[DynamicPDFController::class,'appointmentpdf']);



    //dashboards
    Route::get('appointments',[AppointmentController::class,'appointments']);
    Route::get('add-appointment',[AppointmentController::class, 'addAppointment']);
    Route::post('add-appointment',[AppointmentController::class, 'storeAppointment'])->name('appointment.store');
    Route::get('edit-appointment/{id}',[AppointmentController::class,'editAppointment'])->name('appointment.edit');
    Route::post('update-appointment',[AppointmentController::class,'updateAppointment'])->name('appointment.update');
    Route::get('delete-appointment/{id}',[AppointmentController::class,'deleteAppointment']);
    Route::get('restore-appointment/{id}',[AppointmentController::class,'restoreAppointment']);
    Route::get('list-trash-appointment',[AppointmentController::class,'trashAppointment']);
    Route::post('filter-appointment',[AppointmentController::class, 'searchAppointment'])->name('appointment.search');
    Route::get('/todays-appointments',[AppointmentController::class,'todaysAppointment']);
    Route::get('/tomorrows-appointments',[AppointmentController::class,'tomorrowsAppointment']);
    Route::get('appointment-details/{id}',[AppointmentController::class,'appointmentDetails']);
    Route::get('/appointment-transactions',[AppointmentTransactionController::class,'indexAppointmentTransaction']);
    //calendar routes
    Route::get('full-calendar', [CalendarController::class, 'calendar'])->name('calendar');
    Route::get('calendar', [CalendarController::class, 'calendarIndex']);
    //Route::post('calender-events', [DashboardController::class, 'calendarEvents']);
});


Route::group(['middleware' => ['auth', 'role_or_permission:admin|create role|create permission']], function() {

    Route::resource('role', 'RoleController');
});

Auth::routes();



//site settings
//for website front of system
//Route::view('/','website.index');

//home
Route::get('/',[SiteSettingsController::class,'homeWebsite']);
Route::get('/edit-home/{id}',[SiteSettingsController::class,'editHome']);
Route::post('/update-home',[SiteSettingsController::class,'updateHome'])->name('home.update');
 
//about
Route::get('about',[SiteSettingsController::class,'aboutWebsite']);
Route::get('/edit-about/{id}',[SiteSettingsController::class,'editAbout']);
Route::post('/update-about',[SiteSettingsController::class,'updateAbout'])->name('about.update');

//service
Route::get('services',[SiteSettingsController::class,'serviceWebsite']);
Route::get('/edit-service/{id}',[SiteSettingsController::class,'editService']);
Route::post('/update-service',[SiteSettingsController::class,'updateService'])->name('service.update');

//dentist
Route::get('dentists',[SiteSettingsController::class,'dentistWebsite']);
Route::get('/edit-dentist/{id}',[SiteSettingsController::class,'editDentist']);
Route::post('/update-dentist',[SiteSettingsController::class,'updateDentist'])->name('dentist.update');

//announcement
Route::get('announcement',[SiteSettingsController::class,'announcementWebsite']);
Route::get('/edit-announcement/{id}',[SiteSettingsController::class,'editAnnouncement']);
Route::post('/update-announcement',[SiteSettingsController::class,'updateAnnouncement'])->name('announcement.update');
//Route::view('developers','website.developers');


// Site Settings
/*Route::get('website-settings',[SiteSettingsController::class,'mainmenu']);
Route::get('home-settings',[SiteSettingsController::class,'homesettings']);
Route::get('about-settings',[SiteSettingsController::class,'aboutsetting']);
Route::get('service-settings',[SiteSettingsController::class,'servicesetting']);
Route::get('dentists-settings',[SiteSettingsController::class,'dentistssetting']);
//Route::get('announcements-settings',[SiteSettingsController::class,'announcementssetting']);*/

//Appointments


//Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
