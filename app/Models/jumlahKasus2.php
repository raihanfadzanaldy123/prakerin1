<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jumlahKasus2 extends Model
{
    use HasFactory;

    protected $table = "jumlahKasuses";

    public function negara()
    {
        return $this->belongsTo(negara::class);
    }
}
