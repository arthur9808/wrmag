<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'forty_yard_dash',
        'brench_press',
        'strength_squat',
        'vertical_jump',
        'broad_jump',
        'three_cone_drill',
        'twenty_yard_shuttle',
        'college_offers_football_commit',
        'college_offers_football_university',
        'college_offers_offer',
        'college_offers_date',
        'prospect_camps_date',
        'prospect_camps_name',
        'prospect_camps_location',
        'prospect_camps_coach_name',
        'size',
        'accuracy',
        'arm_strength',
        'release',
        'throw_on_run',
        'footwork',
        'poise',
        'pocket_presence',
        'decision_making',
        'touch',
        'score',
        'profile_id'
    ];

    public static function create($data)
    {
        $performance = new Performance();   
        $performance->forty_yard_dash = $data['forty_yard_dash'] ?? null;
        $performance->brench_press = $data['brench_press'] ?? null;
        $performance->strength_squat = $data['strength_squat'] ?? null;
        $performance->vertical_jump = $data['vertical_jump'] ?? null;
        $performance->broad_jump = $data['broad_jump'] ?? null;
        $performance->three_cone_drill = $data['three_cone_drill'] ?? null;
        $performance->twenty_yard_shuttle = $data['twenty_yard_shuttle'] ?? null;
        $performance->college_offers_football_commit = $data['college_offers_football_commit'] ?? null;
        $performance->college_offers_football_university = $data['college_offers_football_university'] ?? null;
        $performance->college_offers_offer = $data['college_offers_offer'] ?? null;
        $performance->college_offers_date = $data['college_offers_date'] ?? null;
        $performance->prospect_camps_date = $data['prospect_camps_date'] ?? null;
        $performance->prospect_camps_name = $data['prospect_camps_name'] ?? null;
        $performance->prospect_camps_location = $data['prospect_camps_location'] ?? null;
        $performance->prospect_camps_coach_name = $data['prospect_camps_coach_name'] ?? null;
        $performance->size = $data['size'] ?? null;
        $performance->accuracy = $data['accuracy'] ?? null;
        $performance->arm_strength = $data['arm_strength'] ?? null;
        $performance->release = $data['release'] ?? null;
        $performance->throw_on_run = $data['throw_on_run'] ?? null;
        $performance->footwork = $data['footwork'] ?? null;
        $performance->poise = $data['poise'] ?? null;
        $performance->pocket_presence = $data['pocket_presence'] ?? null;
        $performance->decision_making = $data['decision_making'] ?? null;
        $performance->touch = $data['touch'] ?? null;
        $performance->score = $data['score'] ?? null;
        $performance->profile_id = $data['profile_id'];
    }


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
