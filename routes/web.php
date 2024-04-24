<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrmLogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserLevelController;

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

Route::middleware('setLocale')->group(function () {
  Route::get('/guest', 'PageController@guestPage')->name('guest.index');
  Route::get('/project/{project}', 'PageController@projectPage')->name('guest.project');
});
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

  Route::group(['prefix' => 'project'], function () {
    //User Level Routes
    Route::get('/', [PageController::class, 'manageProject'])->name('project.index');
    Route::post('table', [ProjectController::class, 'projectTB'])->name('project.table');
    Route::post('add', [ProjectController::class, 'projectAdd'])->name('project.add');
    Route::get('get/{project}', [ProjectController::class, 'projectGet'])->name('project.get');
    Route::post('edit/{project}', [ProjectController::class, 'projectEdit'])->name('project.edit');
    Route::post('delete/{project}', [ProjectController::class, 'projectDelete'])->name('project.delete');
    Route::post('activeCount', [ProjectController::class, 'projectGetActiveCount'])->name('project.get.activeCount');
  });

  Route::group(['prefix' => 'image'], function () {
    //User Level Routes
    Route::get('/', [PageController::class, 'manageImage'])->name('image.index');
    Route::post('table', [ImageController::class, 'imageTB'])->name('image.table');
    Route::post('add', [ImageController::class, 'imageAdd'])->name('image.add');
    Route::get('get/{image}', [ImageController::class, 'imageGet'])->name('image.get');
    Route::post('edit/{image}', [ImageController::class, 'imageEdit'])->name('image.edit');
    Route::post('delete/{image}', [ImageController::class, 'imageDelete'])->name('image.delete');
    Route::post('activeCount', [ImageController::class, 'imageGetActiveCount'])->name('image.get.activeCount');
  });


  Route::group(['prefix' => 'category'], function () {
    //User Level Routes
    Route::get('/', [PageController::class, 'manageCategory'])->name('category.index');
    Route::post('table', [CategoryController::class, 'categoryTB'])->name('category.table');
    Route::post('add', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::get('get/{category}', [CategoryController::class, 'categoryGet'])->name('category.get');
    Route::post('edit/{category}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('delete/{category}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    Route::post('activeCount', [CategoryController::class, 'categoryGetActiveCount'])->name('category.get.activeCount');
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

