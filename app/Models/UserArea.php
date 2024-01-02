<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArea extends Model
{
    use HasFactory;

    protected $table = 'user_area', $fillable = ['user_id', 'nasional', 'prov', 'kota', 'kec'];

    /**
     * Get the user that owns the UserArea
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function alamatOutlets()
    {
        return $this->hasMany(AlamatOutlet::class, 'provinsi', 'prov');
    }
}
