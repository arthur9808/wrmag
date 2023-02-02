<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = [
        'method', 'status', 'amount', 'description', 'product', 'interval', 'start_date', 'end_date'
    ];

    public static function create($data)
    {
        $payment = new Payment();
        $payment->profile_id = $data['profile_id'];
        $payment->membership_id = $data['membership_id'];
        $payment->method = $data['method'];
        $payment->status = $data['status'];
        $payment->amount = $data['amount'];
        $payment->description = $data['description'];
        $payment->product = $data['product'];
        $payment->interval = $data['interval'];
        $payment->start_date = $data['start_date'];
        $payment->end_date = $data['end_date'];

        $payment->save();

        return $payment;
    }

    //Relationship with Profile 
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    //Relationship with Membership
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }
}
