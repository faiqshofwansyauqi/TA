<?php

namespace App\Models;
use App\Models\Ibu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KB extends Model
{
    protected $table = 'kb';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_ibu',
        'anak_laki',
        'anak_perempuan',
        'kb_terakhir',
        'bulan_anak_kecil',
        'tahun_anak_kecil',
        'status_peserta',
        'haid_terahkhir',
        'status_hamil',
        'gravida',
        'partus',
        'abortus',
        'menyusui',
        'rwyt_pengakit',
        'keadaan_umum',
        'berat_badan',
        'tkn_darah',
        'psng_iud',
        'posisi_rahim',
        'pmrksn_tambahan',
        'alat_knstps',
        'alat_knstps_dipilih',
        'tgl_dilayani',
        'tgl_kembali',
        'tgl_dicabut',     
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'id_ibu', 'id_ibu');
    }
    public function kunjungan_ulang()
    {
        return $this->hasMany(KB::class, 'id');
    }
}
