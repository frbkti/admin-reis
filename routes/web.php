<?php
use App\Http\Controllers\HotelServiceController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\HotelCustomerController;
use App\Http\Controllers\HotelInformasiController;
use App\Http\Controllers\HotelFacilityController;
use App\Http\Controllers\HotelLocationController;
use App\Http\Controllers\HotelOrderController;
use App\Http\Controllers\HotelPolicyController;
use App\Http\Controllers\HotelReviewController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\VillaresortFacilityController;
use App\Http\Controllers\VillaresortInformasiController;
use App\Http\Controllers\VillaResortRoomController;
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

Route::get('/', function () {
    return view('welcome');
});

// route hotel

Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'register']);
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');



// Rute untuk halaman utama admin hotel
// Route untuk admin hotel
Route::middleware(['auth', 'admin.type:hotel'])->group(function () {
    // Halaman utama admin hotel
    Route::get('/admin/hotels', function () {
        return view('admin.hotels.home');
    })->name('admin.hotels.home');

    // Informasi hotel
    Route::prefix('admin/hotels/informasi')->name('admin.hotels.informasi.')->group(function () {
        Route::resource('/', HotelInformasiController::class)->parameters(['' => 'hotel_informasi']);
    });

    // Kamar hotel
    Route::prefix('admin/hotels/room')->name('admin.hotels.rooms.')->group(function () {
        Route::resource('', HotelRoomController::class)->parameters(['' => 'room']);
    });

    // Fasilitas hotel
    Route::prefix('admin/hotels/facilities')->name('admin.hotels.faciliti.')->group(function () {
        Route::resource('', HotelFacilityController::class)->parameters(['' => 'facility']);
    });

    // Kebijakan hotel
    Route::prefix('admin/hotels/policy')->name('admin.hotels.policy.')->group(function () {
        Route::resource('', HotelPolicyController::class)->parameters(['' => 'policy']);
    });

    // Review hotel
    Route::prefix('admin/hotels/review')->name('admin.hotels.review.')->group(function () {
        Route::resource('', HotelReviewController::class)->parameters(['' => 'review']);
    });

    // Pemesanan hotel
    Route::prefix('admin/hotels/order')->name('admin.hotels.order.')->group(function () {
        Route::resource('', HotelOrderController::class)->parameters(['' => 'order']);
    });

    // Customer hotel
    Route::prefix('admin/hotels/customer')->name('admin.hotels.customer.')->group(function () {
        Route::resource('', HotelCustomerController::class)->parameters(['' => 'customer']);
    });

    // Lokasi hotel
    Route::prefix('admin/hotels/location')->name('admin.hotels.location.')->group(function () {
        Route::resource('', HotelLocationController::class)->parameters(['' => 'location']);
    });
});



// route villa resort

// Route untuk admin villa resort
Route::middleware(['auth', 'admin.type:villa_resort'])->group(function () {
    // Halaman utama admin villa resort
    Route::get('/admin/villaresort', function () {
        return view('admin.villaresort.home');
    })->name('admin.villaresort.home');

    // Informasi villa resort
    Route::prefix('admin/villaresort/informasi')->name('admin.villaresort.informasi.')->group(function () {
        Route::resource('', VillaresortInformasiController::class)->parameters(['' => 'informasi']);
    });

    // Kamar villa resort
    Route::prefix('admin/villaresort/rooms')->name('admin.villaresort.rooms.')->group(function () {
        Route::resource('', VillaResortRoomController::class)->parameters(['' => 'room']);
    });

    Route::prefix('admin/villaresort/faciliti')->name('admin.villaresort.faciliti.')->group(function () {
        Route::resource('',VillaresortFacilityController::class)->parameters(['' => 'facility']);
    });

});




Route::get('/hotel/service', [HotelServiceController::class, 'index'])->name('hotel.service');

Route::get('/hotel/service/{id}', [HotelServiceController::class, 'show'])->name('hotel.service.show');


//end route hotel

// route villa resort


