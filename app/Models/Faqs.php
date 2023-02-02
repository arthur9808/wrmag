<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'question',
        'answer',
    ];

    public static function create($data) 
    {
        $faqs = new Faqs();
        $faqs->question = $data['question'];
        $faqs->answer = $data['answer'];
        $faqs->save();

        return $faqs;
    }
}
