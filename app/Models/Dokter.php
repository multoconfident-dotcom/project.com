<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dokter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_dokter',
        'spesialis',
    ];

    /**
     * Get the patients for this doctor.
     */
    public function pasiens(): HasMany
    {
        return $this->hasMany(Pasien::class);
    }
}
