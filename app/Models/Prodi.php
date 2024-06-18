<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_prodi', 'nama_prodi', 'kaprodi'];

    public function kaprodi(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kaprodi_id');
    }
    public function cpl(): HasOne
    {
        return $this->hasOne(Cpl::class);
    }
    public function matkul(): HasOne
    {
        return $this->hasOne(Matkul::class);
    }
}
