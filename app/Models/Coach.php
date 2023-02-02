<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'f_name',
        'l_name',
        'email',
        'phone',
        'title',
        'city',
        'state',
        'country',
        'website',
        'banner_title',
        'birthday',
        'image',
        'coach_logo',
        'bio',
        'facebook',
        'twitter',
        'instagram',
        'tiktok',
        'upcoming_camps_name',
        'upcoming_camps_date',
        'upcoming_camps_end_date',
        'upcoming_camps_location',
        'upcoming_camps_link',
        'college_nfl_qbs_trained_name',
        'college_nfl_qbs_trained_college',
        'featued_images',
        'sort_order',
    ];

    public static function create($data) {
        
        $coach = new Coach();
        $coach->f_name = $data['f_name'];
        $coach->l_name = $data['l_name'];
        $coach->email = $data['email'] ?? null;
        $coach->phone = $data['phone'] ?? null;
        $coach->title = $data['title'] ?? null;
        $coach->city = $data['city'] ?? null;
        $coach->state = $data['state'] ?? null;
        $coach->country = $data['country'] ?? null;
        $coach->website = $data['website'] ?? null;
        $coach->banner_title = $data['banner_title'] ?? null;
        $coach->birthday = $data['birthday'];
        $coach->image = $data['image'] ?? null;
        $coach->coach_logo = $data['coach_logo'] ?? null;
        $coach->bio = $data['bio'] ?? null;
        $coach->facebook = $data['facebook'] ?? null;
        $coach->twitter = $data['twitter'] ?? null;
        $coach->instagram = $data['instagram'] ?? null;
        $coach->tiktok = $data['tiktok'] ?? null;
        $coach->upcoming_camps_name = $data['upcoming_camps_name'] ?? null;
        $coach->upcoming_camps_date = $data['upcoming_camps_date'] ?? null;
        $coach->upcoming_camps_end_date = $data['upcoming_camps_end_date'] ?? null;
        $coach->upcoming_camps_location = $data['upcoming_camps_location'] ?? null;
        $coach->upcoming_camps_link = $data['upcoming_camps_link'] ?? null;
        $coach->college_nfl_qbs_trained_name = $data['college_nfl_qbs_trained_name'] ?? null;
        $coach->college_nfl_qbs_trained_college = $data['college_nfl_qbs_trained_college'] ?? null;
        $coach->featued_images = $data['featued_images'] ?? null;
        $coach->sort_order = $data['sort_order'] ?? null;

        $coach->save();

        return $coach;
    }
}
