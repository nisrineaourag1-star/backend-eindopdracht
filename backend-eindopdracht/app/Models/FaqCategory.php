<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug'])]
class FaqCategory extends Model
{
    use HasFactory;

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'faq_category_id');
    }

    public function activeFaqs(): HasMany
    {
        return $this->hasMany(Faq::class, 'faq_category_id')->where('is_active', true)->orderBy('sort_order');
    }
}
