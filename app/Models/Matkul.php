<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Matkul extends Model
{
    use HasFactory;
    protected $fillable = ['kode_mk', 'kode_prodi', 'deskripsi'];
    public function kode_prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
    public function cpls(): BelongsToMany
    {
        return $this->belongsToMany(Cpl::class, 'cplmks', 'matkul_id', 'cpl_id')->withPivot('bobot');;
    }
}
