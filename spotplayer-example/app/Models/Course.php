<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Licence;

class Course extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sp_courses';

    /**
     * The licences that belong to the course.
     */
    public function licences(): BelongsToMany
    {
        return $this->belongsToMany(Licence::class, 'sp_course_licences');
    }
}
