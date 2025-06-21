<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageableContent extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'description'];
    
    public static function getContent($key, $default = null)
    {
        $content = static::where('key', $key)->first();
        return $content ? $content->value : $default;
    }
}
