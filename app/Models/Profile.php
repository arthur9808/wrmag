<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'f_name', 'l_name', 'qb_email', 'username', 'parent_name', 'parent_email', 'slug', 'password', 'password_token', 'phone', 'city', 'state', 'country', 'position', 'terms', 'i_am','stripe_customer_id', 'membership_id', 'recruiting_class_of', 'college_recruiting_status', 'qb_coachs_name', 'qb_coachs_mobile', 'qb_coachs_email', 'biography', 'instagram', 'tiktok', 'twitter', 'facebook', 'active_membership', 'height', 'weight', 'current_gpa', 'arm_length', 'hand_size', 'wing_span', 'feet_size', 'profile_photo', 'profile_cover_header', 'views', 'show_profile', 'confirm_email', 'university_id', 'sort_order', 'top_one_hundred', 'payment_expired'
    ];

    public static function create($data) 
    {
        $profile = new Profile();
        $profile->f_name = $data['f_name'];
        $profile->l_name = $data['l_name'];
        $profile->qb_email = $data['qb_email'];
        $profile->username = $data['username'];
        $profile->parent_name = $data['parent_name'] ?? null;
        $profile->parent_email = $data['parent_email'] ?? null;
        $profile->slug = $data['slug'] ?? null;
        $profile->password = $data['password'];
        $profile->password_token = $data['password_token'] ?? null;
        $profile->phone = $data['phone'] ?? null;
        $profile->city = $data['city'] ?? null;
        $profile->state = $data['state'] ?? null;
        $profile->country = $data['country'] ?? null;
        $profile->position = $data['position'] ?? null;
        $profile->terms = $data['terms'];
        $profile->i_am = $data['i_am'] ?? null;
        $profile->stripe_customer_id = $data['stripe_customer_id'] ?? null;
        $profile->membership_id = $data['membership_id'] ?? null;
        $profile->recruiting_class_of = $data['recruiting_class_of'] ?? null;
        $profile->college_recruiting_status = $data['college_recruiting_status'] ?? null;
        $profile->qb_coachs_name = $data['qb_coachs_name'] ?? null;
        $profile->qb_coachs_mobile = $data['qb_coachs_mobile'] ?? null;
        $profile->qb_coachs_email = $data['qb_coachs_email'] ?? null;
        $profile->biography = $data['biography'] ?? null;
        $profile->instagram = $data['instagram'] ?? null;
        $profile->tiktok = $data['tiktok'] ?? null;
        $profile->twitter = $data['twitter'] ?? null;
        $profile->facebook = $data['facebook'] ?? null;
        $profile->active_membership = $data['active_membership'] ?? null;
        $profile->height = $data['height'] ?? null;
        $profile->weight = $data['weight'] ?? null;
        $profile->current_gpa = $data['current_gpa'] ?? null;
        $profile->arm_length = $data['arm_length'] ?? null;
        $profile->hand_size = $data['hand_size'] ?? null;
        $profile->wing_span = $data['wing_span'] ?? null;
        $profile->feet_size = $data['feet_size'] ?? null;
        $profile->profile_photo = $data['profile_photo'] ?? null;
        $profile->profile_cover_header = $data['profile_cover_header'] ?? null;
        $profile->views = $data['views'] ?? 0;
        $profile->show_profile = $data['show_profile'] ?? 0;
        $profile->confirm_email = $data['confirm_email'] ?? 0;
        $profile->university_id  = $data['university_id'] ?? null;
        $profile->sort_order = $data['sort_order'] ?? null;
        $profile->top_one_hundred = $data['top_one_hundred'] ?? 0;
        $profile->payment_expired = $data['payment_expired'] ?? null;

        $profile->save();

        return $profile;
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
