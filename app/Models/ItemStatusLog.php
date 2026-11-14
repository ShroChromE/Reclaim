<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ItemStatusLog extends Model
{
    use HasFactory;
    protected $fillable = ['item_id', 'status', 'changed_by', 'note'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}