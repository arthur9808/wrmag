<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'featured_photos_upload',
        'media_highlights_youtube_video_Link',
        'pro_day_feature_video_youtube_video_link',
        'throwing_mechanic_feature_video_youtube_video_link',
        'profile_id',
    ];

    public static function create($data) 
    {
        $media = new Media();
        $media->featured_photos_upload = $data['featured_photos_upload'] ?? '[null]';
        $media->media_highlights_youtube_video_Link = $data['media_highlights_youtube_video_Link'] ?? '[null]';
        $media->pro_day_feature_video_youtube_video_link = $data['pro_day_feature_video_youtube_video_link'] ?? null;
        $media->throwing_mechanic_feature_video_youtube_video_link = $data['throwing_mechanic_feature_video_youtube_video_link'] ?? null;
        $media->profile_id = $data['profile_id'];
        $media->save();

        return $media;
        
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
