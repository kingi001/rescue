<?php
use App\Http\Controllers\SocialWorkerController;
use App\Http\Controllers\RescueController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\DirectorController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    // Routes for admin users only
    Route::get('social-workers', [SocialWorkerController::class, 'index'])->name('social_worker.index'); // List all social workers
    Route::get('social-workers/create', [SocialWorkerController::class, 'create'])->name('social_worker.create'); // Show form to create a new social worker
    Route::post('social-worker/store', [SocialWorkerController::class, 'store'])->name('social_worker.store'); // Store a new social worker
    Route::get('social-workers/{id}/edit', [SocialWorkerController::class, 'edit'])->name('social_worker.edit'); // Show form to edit a social worker
    Route::put('social-workers/{id}', [SocialWorkerController::class, 'update'])->name('social_worker.update'); // Update a social worker
    Route::delete('social-workers/{id}', [SocialWorkerController::class, 'destroy'])->name('social_worker.destroy'); // Delete a social worker
});
// Route::prefix('admin')->middleware(['auth'])->group(function () {

   
// });
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('rescue_case', [RescueController::class, 'index'])->name('admin.rescue_case.index');
        Route::get('rescue_case/create', [RescueController::class, 'create'])->name('admin.rescue_case.create');
        Route::post('rescue_case', [RescueController::class, 'store'])->name('admin.rescue_case.store');
        Route::get('rescue_case/{rescue_case}', [RescueController::class, 'show'])->name('admin.rescue_case.show');
        Route::get('rescue_case/{rescue_case}/edit', [RescueController::class, 'edit'])->name('admin.rescue_case.edit');
        Route::put('rescue_case/{rescue_case}', [RescueController::class, 'update'])->name('admin.rescue_case.update');
        Route::delete('rescue_case/{rescue_case}', [RescueController::class, 'destroy'])->name('admin.rescue_case.destroy');
    });
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('children', [ChildController::class, 'index'])->name('admin.children.index');
        Route::get('children/create', [ChildController::class, 'create'])->name('admin.children.create');
        Route::post('children', [ChildController::class, 'store'])->name('admin.children.store');
        Route::get('children/{child}', [ChildController::class, 'show'])->name('admin.children.show');
        Route::get('children/{child}/edit', [ChildController::class, 'edit'])->name('admin.children.edit');
        Route::put('children/{child}', [ChildController::class, 'update'])->name('admin.children.update');
        Route::delete('children/{child}', [ChildController::class, 'destroy'])->name('admin.children.destroy');
    });
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('directors', [DirectorController::class, 'index'])->name('admin.directors.index');
        Route::get('directors/create', [DirectorController::class, 'create'])->name('admin.directors.create');
        Route::post('directors', [DirectorController::class, 'store'])->name('admin.directors.store');
        Route::get('directors/{director}/edit', [DirectorController::class, 'edit'])->name('admin.directors.edit');
        Route::put('directors/{director}', [DirectorController::class, 'update'])->name('admin.directors.update');
        Route::delete('directors/{director}', [DirectorController::class, 'destroy'])->name('admin.directors.destroy');
    });
  