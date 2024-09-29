<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'description',
        'is_read'
    ];

    protected static function booted()
    {
        parent::booted();

        static::retrieved(function ($contactUs) {
            if (!$contactUs->is_read) {
                $contactUs->update(['is_read' => true]);
            }
        });
    }

    public function products()
    {
        return $this->hasMany(InquiryProducts::class, 'contact_us_id', 'id');
    }
}
