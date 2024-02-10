<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use SajedZarinpour\Spotplayer\Facades\SpotPlayer;

use App\Models\Course;
use App\Models\Licence;
use App\Models\CourseLicence;

class SpotPlayerController extends Controller
{
    public function play(Request $request)
    {
        $license = Licence::find(1);
        $course = Course::find(1);
        // dd(spotplayer()->getJSONFileList($license->licenceUrl));
        $data = [
            'licence' => $license,
            'course' => $course,
            'courseDetails' => SpotPlayer::getJSONFileList($license->licenceUrl),
        ];

        return response()->view('player', $data);
    }
}
