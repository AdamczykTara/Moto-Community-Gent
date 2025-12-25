<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\View\View;


class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function faqItems(): HasMany
    {
        return $this->hasMany(FaqItem::class);
    }
}
