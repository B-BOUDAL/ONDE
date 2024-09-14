<?php

namespace App\Models;

// use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;


        protected $fillable = [
            'name',
            'address',
            'email',
            'phone',
            'message',
        ];
        public function contacts() {
            return $this->hasMany(Contact::class);
        }
    }
