<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    /**
     * relationship one to one queque, patient
     */
    public function queque()
    {
        return $this->hasMany(Queue::class, 'patien_id');
    }
}
