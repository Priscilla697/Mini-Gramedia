<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['checkout_id', 'book_id', 'price'])]
class CheckoutBook extends Model
{
    //
}
