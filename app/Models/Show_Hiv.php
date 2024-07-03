<?php

namespace App\Models;
use App\Models\Ibu;
use Illuminate\Database\Eloquent\Model;

class Show_Hiv extends Model
{
    protected $table = 'ibu_hiv';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'nama_ibu',
        'tgl_pemberian_arv',
        'hasil_pemberian_arv',
        'tgl_bds',
        'hasil_bds',
        'tgl_konfirmasi_bds',
        'hasil_konfirmasi_bds',
        'tgl_pemeriksaan_balita',
        'hasil_pemeriksaan_balita',
        'tgl_perawatan_pdp',
        'hasil_perawatan_pdp',
        'tgl_pengobatan_arv',
        'hasil_pengobatan_arv',
    ];
    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'NIK', 'nama_ibu');
    }
}
