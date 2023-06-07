<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType = 'binary';
    public $incrementing = false;

    // // public $table = "achievements";

    protected $fillable = [
        'npsn',
        'nama_siswa',
        'nama_lomba',
        'penyelenggara',
        'prestasi',
        'waktu',
        'tingkat',
        'jenis_lomba'
    ];

    protected $casts = [
        // 'id' => 'integer',
        'waktu' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::random(16);
        });
    }

    public function getKeyType()
    {
        return 'char';
    }

    public function user()
    {
        return $this->belongsTo(User::class,'npsn','npsn');
    }
}
