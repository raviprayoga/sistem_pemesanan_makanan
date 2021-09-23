<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pesanan extends Model
{
    protected $table = 'pesanans';
    protected $fillable = ['no_meja', 'makanan_id', 'minuman_id', 'created_by_id'];

    public function food()
    {
        return $this->belongsTo('App\food', 'makanan_id', 'id');
    }
    public function drink()
    {
        return $this->belongsTo('App\drinks', 'minuman_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
}
