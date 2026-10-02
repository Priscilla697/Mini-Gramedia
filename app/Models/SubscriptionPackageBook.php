<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['subscription_package_id', 'book_id'])]
class SubscriptionPackageBook extends Model
{
    //
}
