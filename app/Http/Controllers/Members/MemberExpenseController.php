<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Budgets\BudgetController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Expenses\ExpensesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Spends\SpendsController;

class MemberExpenseController extends Controller
{
    public static function index($user_id)
    {
        return view(
            'expenses.view-expense-member',
            [
                'title'=>'member',
                'section'=>'member',
                'data'=>[
                    'expenses' => ExpensesController::list($user_id),
                    'member' => ProfileController::get_profile($user_id),
                    'balance' => BudgetController::get_limit($user_id)
                ]
            ]
        );
    }
}
