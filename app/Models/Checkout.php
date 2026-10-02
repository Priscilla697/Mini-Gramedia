<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'total_amount', 'payment_status', 'proof_of_payment'])]
class Checkout extends Model
{
    //
}
