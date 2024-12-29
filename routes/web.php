<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\Blogs\IndexBlog;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Investments\IndexInvestment;
use App\Livewire\Admin\Programs\IndexProgram;
use App\Livewire\Admin\Transactions\IndexTransaction;
use App\Livewire\Admin\Users\CreateUser;
use App\Livewire\Admin\Users\IndexUser;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\User\Dashboard as UserDashboard;
use App\Livewire\User\Investments\IndexInvestment as UserIndexInvestment;
use App\Livewire\User\Profile\AccountSetting;
use App\Livewire\User\Profile\IndexProfile;
use App\Livewire\User\Programs\IndexProgram as UserIndexProgram;
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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

            Route::prefix('users')->group(function () {
                Route::get('/', IndexUser::class)->name('admin.user.index');
                Route::get('/create', CreateUser::class)->name('admin.user.create');
            });

            Route::prefix('programs')->group(function () {
                Route::get('/', IndexProgram::class)->name('admin.program.index');
            });

            Route::prefix('investments')->group(function () {
                Route::get('/', IndexInvestment::class)->name('admin.investment.index');
            });

            Route::prefix('transactions')->group(function () {
                Route::get('/', IndexTransaction::class)->name('admin.transaction.index');
            });

            Route::prefix('blogs')->group(function () {
                Route::get('/', IndexBlog::class)->name('admin.blog.index');
            });
        });
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard', UserDashboard::class)->name('user.dashboard');

        Route::prefix('programs')->group(function () {
            Route::get('/', UserIndexProgram::class)->name('user.program.index');
        });

        Route::prefix('investments')->group(function () {
            Route::get('/', UserIndexInvestment::class)->name('user.investment.index');
        });

        Route::get('/profile', IndexProfile::class)->name('user.profile');
        Route::get('/account-settings', AccountSetting::class)->name('user.account-settings');
    });
});
