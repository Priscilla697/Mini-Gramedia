<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'price', 'duration_in_months', 'description', 'color'])]
class SubscriptionPackage extends Model
{
    //
}
