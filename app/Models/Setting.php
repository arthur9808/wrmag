<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'place',
        'value',
    ];

    public static function create($data)
    {
        $setting = new Setting();
        $setting->name = $data['name'];
        $setting->place = $data['place'];
        $setting->value = $data['value'];
        $setting->save();
    }
}
