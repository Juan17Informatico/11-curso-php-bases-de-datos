<?php

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use App\Enums\PaymentMethodEnum;
use App\Enums\WithdrawalTypeEnum;

// use App\Enums\IncomeTypeEnum;
// use App\Enums\PaymentMethodEnum;

require("vendor/autoload.php"); 

// $incomes_controller = new IncomesController(); 
// $incomes_controller->store([
//     "payment_method" => 2,
//     "type" => 1,
//     //"type" => IncomeTypeEnum::Salary->value,
//     "date" => date("Y-m-d H:i:s"),
//     "amount" => 10000,
//     "description" => "Pago de mi salario por mi arduo trabajo"
// ]);

// $withdrawal_controller = new WithdrawalsController();
// $withdrawal_controller->store([
//     // "payment_method" => PaymentMethodEnum::CreditCard->value,
//     "payment_method" => 1,
//     "type" => 2,
//     "date" => date("Y-m-d H:i:s"),
//     "amount" => 50,
//     "description" => "Compré juguetes para mis queridos y amados michis."
// ]);

// $withdrawal_controller = new WithdrawalsController();
// $withdrawal_controller->index();

$withdrawal_controller = new WithdrawalsController();
$withdrawal_controller->show(1);

// $incomes_controller = new IncomesController();
// $incomes_controller->index();