<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\LanguageEnum;
use App\Enums\RelationEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'relation',
        'language',
        'color'
    ];

    protected $casts = [
        'gender' => GenderEnum::class,
        'language' => LanguageEnum::class,
        'relation' => RelationEnum::class
    ];
}
