<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class University extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'logo', 'address', 'phone', 'email', 'website'
    ];

    public static function create($data)
    {
        $university = new University();
        $university->name = $data['name'];
        $university->logo = $data['logo'] ?? null;
        $university->address = $data['address'] ?? null;
        $university->phone = $data['phone'] ?? null;
        $university->email = $data['email'] ?? null;
        $university->website = $data['website'] ?? null;
        $university->save();

        return $university;
    }
}
