<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\LanguageEnum;
use App\Enums\RelationEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'date_of_birth' => 'date',
        'gender' => GenderEnum::class,
        'language' => LanguageEnum::class,
        'relation' => RelationEnum::class
    ];

    public function supervisors(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'patient_users');
    }

    public function activitiesPatients()
    {
        return $this->hasMany(ActivitiesPatients::class, 'patient_id', 'id');
    }

    public function attachSupervisor($supervisorId)
    {
        PatientUser::query()->create([
            'patient_id' => $this->id,
            'user_id' => $supervisorId
        ]);
    }
}
