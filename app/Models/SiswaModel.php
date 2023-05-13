<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiswaModel extends Model
{
    use HasFactory;

    protected $table = 'siswa_models';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'nama_siswa',
        'kelas_id',
        'jurusan_id'
    ];

    /**
     * Get the kelas that owns the SiswaModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(kelas::class, 'kelas_id');
    }
     /**
      * Get all of the comments for the SiswaModel
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     /**
      * Get the jurusan that owns the SiswaModel
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function jurusan(): BelongsTo
     {
         return $this->belongsTo(jurusan::class, 'jurusan_id');
     }
}
