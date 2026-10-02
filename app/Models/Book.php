<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['book_category_id','cover', 'title', 'price', 'description', 'language', 'publisher', 'writer', 'release_date', 'page_of_book'])]
class Book extends Model
{
    public function bookCategory(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }

    public function checkoutBooks(): HasMany
    {
        return $this->hasMany(CheckoutBook::class);
    }

    public function subscriptionPackageBooks(): HasMany
    {
        return $this->hasMany(SubscriptionPackageBook::class);
    }

}
