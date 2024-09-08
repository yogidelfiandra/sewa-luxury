<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
		'slug',
		'icon',
	];

	public function brandCategories(): HasMany
	{
		return $this->hasMany(BrandCategory::class, 'category_id');
	}

	public function products(): HasMany
	{
		return $this->hasMany(Product::class);
	}
}
