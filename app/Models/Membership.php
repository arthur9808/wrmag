<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'stripe_name',
        'product_id',
        'description',
        'price',
        'previous_price',
        'interval_membership',
        'popular',
    ];

    public static function create($data)
    {
        $membership = new Membership();
        $membership->name = $data['name'];
        // Validate stripe name
        if(strpos($data['name'], ' ') !== false || strpos($data['name'], '-') !== false || strpos($data['name'], '_') !== false) {
            $stripe_name = str_replace(' ', '', $data['name']);
            $stripe_name = str_replace('-', '', $stripe_name);
            $stripe_name = str_replace('_', '', $stripe_name);
        } else {
            $stripe_name = $data['name'];
        }
        $membership->stripe_name = $stripe_name;
        $membership->product_id = $data['product_id'];
        $membership->description = $data['description'];
        $membership->title = $data['description'];
        $membership->price = $data['price'];
        $membership->previous_price = $data['previous_price'];
        $membership->interval_membership = $data['interval_membership'];
        $membership->popular = $data['popular'];
        $membership->save();

        return $membership;
    }

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'membership_benefit', 'membership_id', 'benefit_id');
    }
}
