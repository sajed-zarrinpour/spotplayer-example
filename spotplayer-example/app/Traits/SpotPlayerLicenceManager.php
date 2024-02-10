<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Collection;

use SajedZarinpour\Spotplayer\Models\Licence;
use SajedZarinpour\Spotplayer\Models\Course;
trait SpotPlayerLicenceManager{
    /**
     * Get the licences for the user.
     */
    public function licences(): HasMany
    {
        return $this->hasMany(Licence::class, 'subscriber_id', 'id');
    }

    /**
     * Get the published courses of the user.
     */
    public function publishedCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'author_id', 'id');
    }

    /**
     * Get the subscribed courses for the user.
     */
    public function subscribedcourses(): Collection
    {
        // the following line will not work:
        // return $this->hasManyThrough(Course::class, Licence::class, 'subscriber_id', 'author_id');
        // because we need a has many through many relationship, so instead:
        $this->load([
            'licences.courses' => function ($q) use (&$courses){
                $courses = $q->get()->unique();
            }
        ]);
        return $courses;
    }

}
