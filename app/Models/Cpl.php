<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cpl extends Model
{
    use HasFactory;
    public function kode_prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }

    public function matkuls(): BelongsToMany 
    {
        return $this->belongsToMany(Matkul::class, 'cplmks', 'cpl_id', 'matkul_id')->withPivot('bobot');;
    }
}
