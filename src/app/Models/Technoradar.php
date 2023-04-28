<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technoradar extends Model
{
    use HasFactory;

    protected $table = 'technoradar';

    protected $fillable = [
        'name', 'description', 'category', 'user_type'
    ];
    public function categoryName()
    {
        $categories = [
            1 => 'Tools',
            2 => 'Techniques',
            3 => 'Platforms',
            4 => 'Languages and frameworks'
        ];

        return $categories[$this->category];
    }

    public function userTypeName()
    {
        $user_types = [
            1 => 'ADOPT',
            2 => 'TRIAL',
            3 => 'ASSESS',
            4 => 'HOLD'
        ];
        return $user_types[$this->user_type];
    }
}
