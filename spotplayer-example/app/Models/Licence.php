<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Course;

class Licence extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sp_licences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'licenceId',
        'licenceUrl',
        'licenceKey',
        'subscriber_id'
    ];

    /**
     * The courses that belong to the licence.
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'sp_course_licences');
    }
}
