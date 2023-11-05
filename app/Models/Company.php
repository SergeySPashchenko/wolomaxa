<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasUlids, SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description',
        'phone',
        'sendblue_api',
        'api_token',
        'owner_id',
    ];

    protected $casts = [
        'id' => 'string',
        'owner_id' => 'string',
    ];
}
