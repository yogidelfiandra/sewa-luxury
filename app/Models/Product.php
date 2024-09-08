<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
		'slug',
		'thumbnail',
		'about',
		'category_id',
		'brand_id',
		'price',
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function brand(): BelongsTo
	{
		return $this->belongsTo(Brand::class);
	}

	public function photos(): HasMany
	{
		return $this->hasMany(ProductPhoto::class);
	}
}
