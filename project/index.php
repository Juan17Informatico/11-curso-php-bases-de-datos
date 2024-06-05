<?php

use App\Controllers\IncomesController;
// use App\Enums\IncomeTypeEnum;
// use App\Enums\PaymentMethodEnum;

require("vendor/autoload.php"); 

$incomes_controller = new IncomesController(); 
// $incomes_controller->store([
//     "payment_method" => PaymentMethodEnum::BankAccount->value,
//     "type" => IncomeTypeEnum::Salary->value,
//     "date" => date("Y-m-d H:i:s"),
//     "amount" => 10000,
//     "description" => "Pago de mi salario por mi arduo trabajo"
// ]);
$incomes_controller->store([
    "payment_method" => 2,
    "type" => 1,
    "date" => date("Y-m-d H:i:s"),
    "amount" => 10000,
    "description" => "Pago de mi salario por mi arduo trabajo"
]);