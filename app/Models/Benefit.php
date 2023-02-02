<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'is_shared',
    ];

    public static function create($data)
    {
        $benefit = new Benefit();
        $benefit->name = $data['name'];
        $benefit->description = $data['description'];
        $benefit->is_shared = $data['is_shared'] ?? false;
        $benefit->save();

        return $benefit;
    }

    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'membership_benefit', 'benefit_id', 'membership_id');
    }
}
