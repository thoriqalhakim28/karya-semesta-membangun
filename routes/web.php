<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Admin\Blogs\CreateBlog;
use App\Livewire\Admin\Blogs\EditBlog;
use App\Livewire\Admin\Blogs\IndexBlog;
use App\Livewire\Admin\Blogs\ShowBlog;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Investments\IndexInvestment;
use App\Livewire\Admin\Investments\ShowInvestment;
use App\Livewire\Admin\Programs\CreateProgram;
use App\Livewire\Admin\Programs\EditProgram;
use App\Livewire\Admin\Programs\IndexProgram;
use App\Livewire\Admin\Programs\ShowProgram;
use App\Livewire\Admin\Transactions\CreateTransaction;
use App\Livewire\Admin\Transactions\EditTransaction;
use App\Livewire\Admin\Transactions\IndexTransaction;
use App\Livewire\Admin\Users\CreateUser;
use App\Livewire\Admin\Users\IndexUser;
use App\Livewire\Admin\Users\ShowUser;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\BlogIndex;
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
                Route::get('/{id}', ShowUser::class)->name('admin.user.show');
            });

            Route::prefix('programs')->group(function () {
                Route::get('/', IndexProgram::class)->name('admin.program.index');
                Route::get('/create', CreateProgram::class)->name('admin.program.create');
                Route::get('/{id}', ShowProgram::class)->name('admin.program.show');
                Route::get('/{id}/edit', EditProgram::class)->name('admin.program.edit');
            });

            Route::prefix('investments')->group(function () {
                Route::get('/', IndexInvestment::class)->name('admin.investment.index');
                Route::get('/{id}', ShowInvestment::class)->name('admin.investment.show');
            });

            Route::prefix('transactions')->group(function () {
                Route::get('/', IndexTransaction::class)->name('admin.transaction.index');
                Route::get('/create', CreateTransaction::class)->name('admin.transaction.create');
                Route::get('/{id}/edit', EditTransaction::class)->name('admin.transaction.edit');
            });

            Route::prefix('blogs')->group(function () {
                Route::get('/', IndexBlog::class)->name('admin.blog.index');
                Route::get('/create', CreateBlog::class)->name('admin.blog.create');
                Route::get('/{slug}', ShowBlog::class)->name('admin.blog.show');
                Route::get('/{slug}/edit', EditBlog::class)->name('admin.blog.edit');
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

Route::prefix('blogs')->group(function () {
    Route::get('/', BlogIndex::class)->name('blog.index');
});
