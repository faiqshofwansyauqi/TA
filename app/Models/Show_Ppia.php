<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ibu;

class Show_Ppia extends Model
{
    protected $table = 'show_ppia';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'id_ibu',
        'tanggal_screening_hbsag',
        'tanggal_screening_hiv',
        'tanggal_screening_sifilis',
        'kode_specimen_hbsag',
        'kode_specimen_hiv',
        'kode_specimen_sifilis',
        'hasil_screening_hbsag',
        'hasil_screening_hiv',
        'hasil_screening_sifilis',
        'tgl_masuk_pdp',
        'tgl_mulai_arv',
        'ditangani_sifilis',
        'obat_adequat',
        'dirujuk',
        'status_hiv',
        'periksa_sifilis',
        'faskes_rujukan',

    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu');
    }
}
