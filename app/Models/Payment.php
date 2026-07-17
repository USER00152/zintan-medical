<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id', 'amount', 'method', 'status', 'transaction_ref', 'paid_at',
    ];

    protected function casts(): array
    {
        return ['paid_at' => 'datetime'];
    }

    public function appointment()
    {
        return $this->belongsTo(AppointmentModel::class, 'appointment_id');
    }
}