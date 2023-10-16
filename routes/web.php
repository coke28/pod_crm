<?php

use App\Events\MyEvent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CrmLogController;
use App\Http\Controllers\UserLevelController;
use Illuminate\Support\Facades\Event;

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

Route::get('/', 'PageController@indexPage')->name('get.index');
Route::get('/login', 'PageController@loginPage')->name('get.login');
Route::post('/login', 'Auth\AuthenticatedSessionController@store')->name('post.login');

Route::get('/guest', 'PageController@guestPage')->name('guest.index');

Route::middleware('auth')->group(function () {

  // Define your routes here
  Route::group(['prefix' => 'user'], function () {
    //User Routes
    Route::get('/', [PageController::class, 'manageUser'])->name('user.index');
    Route::post('table', [UserController::class, 'userTB'])->name('user.table');
    Route::post('add', [UserController::class, 'userAdd'])->name('user.add');
    Route::get('get/{user}', [UserController::class, 'userGet'])->name('user.get');
    Route::post('edit/{user}', [UserController::class, 'userEdit'])->name('user.edit');
    // Route::post('delete/{user}', [UserController::class, 'userDelete'])->name('admin.user.delete');
  });
  Route::group(['prefix' => 'userLevel'], function () {
    //User Level Routes
    Route::get('/', [PageController::class, 'manageUserLevel'])->name('userLevel.index');
    Route::post('table', [UserLevelController::class, 'userLevelTB'])->name('userLevel.table');
    Route::post('add', [UserLevelController::class, 'userLevelAdd'])->name('userLevel.add');
    Route::get('get/{userLevel}', [UserLevelController::class, 'userLevelGet'])->name('userLevel.get');
    Route::post('edit/{userLevel}', [UserLevelController::class, 'userLevelEdit'])->name('userLevel.edit');
    Route::post('delete/{userLevel}', [UserLevelController::class, 'userLevelDelete'])->name('userLevel.delete');
  });
  Route::group(['prefix' => 'form'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'manageForm'])->name('form.index');
    Route::post('table', [FormController::class, 'formTB'])->name('form.table');
    Route::post('add', [FormController::class, 'formAdd'])->name('form.add');
    Route::get('get/{form}', [FormController::class, 'formGet'])->name('form.get');
    Route::post('edit/{form}', [FormController::class, 'formEdit'])->name('form.edit');
    Route::post('activeCount', [FormController::class, 'formGetActiveCount'])->name('form.get.activeCount');
    // Route::post('delete/{form}', [FormController::class, 'formDelete'])->name('form.delete');
  });

  Route::group(['prefix' => 'crmLog'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'manageCrmLog'])->name('crmLog.index');
    Route::post('table', [CrmLogController::class, 'crmLogTB'])->name('crmLog.table');
    Route::post('delete/{crmLog}', [CrmLogController::class, 'crmLogDelete'])->name('crmLog.delete');
  });
  Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
  Route::get('/dashboard', 'PageController@dashboardPage')->name('user.dash');
});

