<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'gender', 'nis', 'class_id'];

    public function class(): BelongsTo
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function extrakurikulers(): BelongsToMany
    {
        return $this->belongsToMany(Extrakurikuler::class, 'student_extrakurikuler', 'student_id', 'extrakurikuler_id');
    }
}
