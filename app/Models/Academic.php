<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'graduation_class_year',
        'school_name',
        'city',
        'state',
        'current_gpa',
        'sat_score',
        'atc_score',
        'year',
        'name_of_the_honor_or_award',
        'football_career_honors_year',
        'football_career_honors',
        'wonderlic_practice_test',
        'hight_school_stats_year',
        'hight_school_stats_games_played',
        'hight_school_stats_completions',
        'hight_school_stats_passing_attempts',
        'hight_school_stats_passing_yards',
        'hight_school_stats_passing_tds',
        'hight_school_stats_rushing_yards',
        'hight_school_stats_rushing_tds',
        'profile_id'
    ];

    public static function create($data)
    {
        $academic = new Academic();
        $academic->graduation_class_year = $data['graduation_class_year'] ?? null;
        $academic->school_name = $data['school_name'] ?? null;
        $academic->city = $data['city'] ?? null;
        $academic->state = $data['state'] ?? null;
        $academic->current_gpa = $data['current_gpa'] ?? null;
        $academic->sat_score = $data['sat_score'] ?? null;
        $academic->atc_score = $data['atc_score'] ?? null;
        $academic->year = $data['year'] ?? null;
        $academic->name_of_the_honor_or_award = $data['name_of_the_honor_or_award'] ?? null;
        $academic->football_career_honors_year = $data['football_career_honors_year'] ?? null;
        $academic->football_career_honors = $data['football_career_honors'] ?? null;
        $academic->wonderlic_practice_test = $data['wonderlic_practice_test'] ?? null;
        $academic->hight_school_stats_year = $data['hight_school_stats_year'] ?? null;
        $academic->hight_school_stats_games_played = $data['hight_school_stats_games_played'] ?? null;
        $academic->hight_school_stats_completions = $data['hight_school_stats_completions'] ?? null;
        $academic->hight_school_stats_passing_attempts = $data['hight_school_stats_passing_attempts'] ?? null;
        $academic->hight_school_stats_passing_yards = $data['hight_school_stats_passing_yards'] ?? null;
        $academic->hight_school_stats_passing_tds = $data['hight_school_stats_passing_tds'] ?? null;
        $academic->hight_school_stats_rushing_yards = $data['hight_school_stats_rushing_yards'] ?? null;
        $academic->hight_school_stats_rushing_tds = $data['hight_school_stats_rushing_tds'] ?? null;
        $academic->profile_id = $data['profile_id'];

        $academic->save();
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
