<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'ref',
        'letter_num',
        'relation',
        'pname',
        'ward',
        'cot',
        'diagnosis',
        'address',
        'job',
        'umid',
        'user_id',
        'gender'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
