<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductPhoto extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'photo',
		'product_id',
	];

	public function product(): BelongsTo
	{
		return $this->belongsTo(Product::class);
	}
}
