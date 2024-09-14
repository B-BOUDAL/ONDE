<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;


        protected $fillable = [
            'nom',
            'email',
            'password',
        ];
        public function registers() {
            return $this->hasMany(Register::class);
        }
    }

