<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Coupon\CouponController;
use App\Http\Controllers\Budgets\BudgetController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Members\MembersController;
use App\Http\Controllers\Reports\ReportsController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Analytic\AnalyticController;
use App\Http\Controllers\Expenses\ApprovalController;
use App\Http\Controllers\Expenses\ExpensesController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Payment\PostPaymentController;
use App\Http\Controllers\Reports\ViewReportsController;
use App\Http\Controllers\Account\ListReferralController;
use App\Http\Controllers\Members\MemberExpenseController;
use App\Http\Controllers\Payment\CancelPaymentController;
use App\Http\Controllers\Payment\DetailPaymentController;
use App\Http\Controllers\Auth\ConfirmationEmailController;
use App\Http\Controllers\Budgets\NewBudgetController;
use App\Http\Controllers\Budgets\TopUpApprovalController;
use App\Http\Controllers\Group\GroupController;
use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Role\PermissionController;
use App\Http\Controllers\Subscription\PaySubscriptionController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/sign-in', [LoginController::class, 'index'])->name('login');
Route::post('/login_action', [LoginController::class, 'login_action'])->name('login_action');
Route::post('/logout_action', [LoginController::class, 'logout_action'])->name('logout_action')->middleware('auth');

// Register
Route::get('/sign-up', [RegisterController::class, 'index']);
Route::post('/register_action', [RegisterController::class, 'register_action'])->name('register_action');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

// Reset Password
Route::get('/password-reset/{token}', [PasswordResetController::class, 'index']);
Route::post('/password-reset-action}', [PasswordResetController::class, 'password_reset_action'])->name('password_reset_action');

// Confirmation Email
Route::get('/confirmation-email/{token}', [ConfirmationEmailController::class, 'index']);
Route::get('/confirmation-email', [ConfirmationEmailController::class, 'index2']);

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

// Referral
Route::get('/referral-friends', [ListReferralController::class, 'index'])->middleware('auth');


//Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Expense
Route::get('/expense', [ExpensesController::class, 'index'])->middleware('auth');
Route::get('/approval', [ApprovalController::class, 'index'])->name('approval')->middleware('auth');

// Manage Teams
Route::get('/employee', [MembersController::class, 'index'])->middleware('auth');
Route::put('/employees', [MembersController::class, 'updateEmployee'])->middleware('auth')->name('employees.update');

Route::get('/group', [GroupController::class, 'index'])->middleware('auth');
Route::put('/groups', [GroupController::class, 'updateGroup'])->middleware('auth')->name('groups.update');

Route::get('/partner', [PartnerController::class, 'index'])->middleware('auth');
Route::put('/partners', [PartnerController::class, 'updatePartner'])->middleware('auth')->name('partners.update');

Route::get('/expense/{user_id}', [MemberExpenseController::class, 'index'])->middleware('auth');

// Budget
Route::get('/budget', [BudgetController::class, 'index'])->middleware('auth');

Route::get('/new-budget', [NewBudgetController::class, 'index'])->middleware('auth');
Route::post('/spend/add', [NewBudgetController::class, 'add_spend'])->name('add_spend')->middleware('auth');

Route::get('/spend/request', [TopUpApprovalController::class, 'index'])->middleware('auth');

// Approve
Route::post('/approves', [TopUpApprovalController::class, 'upprove'])->middleware('auth')->name('approves.action');

Route::get('/pre-approval', function () {
    return view(
        'pre-approval',
        [
            'title' => 'Pre Approval',
            'section' => 'pre-approval'
        ]
    );
});

// permission
// Route::get('/setting', [SettingsController::class, 'index'])->name('setting')->middleware('auth');
Route::get('/permission', [PermissionController::class, 'index'])->name('permission')->middleware('auth');
Route::put('/permissions', [PermissionController::class, 'changePermission'])->name('permissions.change')->middleware('auth');
Route::put('/permissions/role-name', [PermissionController::class, 'changeRoleName'])->name('permissions.role-name.change')->middleware('auth');

// Tenant
Route::get('/tenant', function () {
    return view(
        'tenant',
        [
            'title' => 'Manage Tenant',
            'section' => 'tenant'
        ]
    );
});

// Activity
Route::get('/activity', function () {
    return view('activity.activity', [
        'title' => 'Activity', 'section' => 'activity'
    ]);
})->middleware('auth');

// Report
Route::get('/report', [ReportsController::class, 'index'])->middleware('auth');
Route::get('/view-report/{id}', [ViewReportsController::class, 'index'])->middleware('auth');

// Analytic
Route::get('/analytic', [AnalyticController::class, 'index'])->middleware('auth');
Route::get('/analytic/{user_id}', [AnalyticController::class, 'webview']);

// Card
Route::get('/card', function () {
    return view('card', [
        'title' => 'card', 'section' => 'card'
    ]);
})->middleware('auth');

// Voucher
Route::get('voucher', [CouponController::class, 'index'])->middleware('auth');

// Subsription
Route::post('payment/cancel', [CancelPaymentController::class, 'cancel_payment'])->name('cancel_payment')->middleware('auth');
Route::get('payment/detail/{payment_code}', [DetailPaymentController::class, 'index'])->middleware('auth');
Route::get('payment/subscription', [PaySubscriptionController::class, 'index'])->middleware('auth');
Route::post('payment/post', [PostPaymentController::class, 'post_payment'])->name('post_payment')->middleware('auth');
Route::get('payment/pay/{code}', function () {
    return view('payment/payment', [
        'title' => 'Pay'
    ]);
});

// Policies
Route::get('policies/privacy-policy', function () {
    return view('policies/privacy-policy', [
        'title' => 'Privacy Policy'
    ]);
});
Route::get('policies/term-condition', function () {
    return view('policies/term-condition', [
        'title' => 'Term & Condition'
    ]);
});
Route::get('policies/freq-question', function () {
    return view('policies/frequently-question', [
        'title' => 'Frequently ask Question'
    ]);
});
