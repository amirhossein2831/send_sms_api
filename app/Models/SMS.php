<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class SMS extends Model
{
    use HasFactory;

    public $table = 'sms';
    public $fillable = [
        'number',
        'text',
    ];
    public static function createSMS($value)
    {
       return self::create($value);
    }

}
