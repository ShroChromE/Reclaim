<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Item extends Model
{
    use HasFactory;
    public const TYPES = ['lost', 'found'];

    public const CATEGORIES = [
        'Elektronik', 'Dokumen', 'Dompet', 'Kunci', 'Tas', 'Pakaian', 'Lainnya',
    ];

    public const STATUS_LABELS = [
        'reported' => 'Dilaporkan',
        'matched'  => 'Dicocokkan',
        'claimed'  => 'Diklaim',
        'resolved' => 'Selesai',
    ];

    protected $fillable = [
        'user_id', 'type', 'title', 'description', 'category', 'location', 'date', 'image_path', 'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusLogs(): HasMany
    {
        return $this->hasMany(ItemStatusLog::class)->latest();
    }

    protected function statusLabel(): Attribute
    {
        return Attribute::get(fn () => self::STATUS_LABELS[$this->status] ?? $this->status);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class)->latest();
    }

    public function canBeClaimedBy(?User $user): bool
    {
        if (! $user || $this->type !== 'found') {
            return false;
        }

        if (in_array($this->status, ['claimed', 'resolved'])) {
            return false;
        }

        if ($this->user_id === $user->id) {
            return false;
        }

        return ! $this->claims()
            ->where('user_id', $user->id)
            ->where('status', 'pending')
            ->exists();
    }

    public function isManageableBy(?User $user): bool
    {
        return $user && ($user->isAdmin() || $this->user_id === $user->id);
    }
}