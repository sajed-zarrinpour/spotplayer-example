<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;

use SajedZarinpour\SpotPlayer\Facades\SpotPlayer;

use App\Models\Course;
use App\Models\Licence;
use App\Models\CourseLicence;

class SpotPlayerController extends Controller
{
    public function licenceIsValid(string $licenceId) : bool
    {
        $licenceData = SpotPlayer::getLicenseData($licenceId);
        if(is_array($licenceData)){
            if(array_key_exists("_id",$licenceData)){
                if($licenceData['_id'] === $licenceId){
                    return true;
                }
            }
        }
        return false;
    }

    public function getCourse(Request $request, $courseId)
    {
        // get the course
        $course = Course::find($courseId);
        
        // get the licence of this user to access the course
        try{
            
            // throw error if course does not exist.
            if(empty($course)){
                throw new \Exception('Course not found.');
            }

            $licence = $course->licences()->where('subscriber_id', auth()->user()->id)->first();
            
            // throw error if the user doesn't had a licence
            if(empty($licence)){
                throw new \Exception('Current user does not have a licence to access this course.');
            }

            // throw error if licence is not valid
            if(!self::licenceIsValid($licence->licenceId)){
                throw new \Exception('This licence is not valid.');
            }
        }
        catch (\Exception $e) {
            return response()
            ->view('errors', ['errorMessage'=>$e->getMessage()], 500)
            ->header('Content-Type', 'text/html');
        }
        
        // send response
        $data = [
            'licence' => $licence,
            'course' => $course,
            'courseDetails' => SpotPlayer::getJSONFileList($licence->licenceUrl),
            // 'courseDetails' => spotplayer()->getJSONFileList($licence->licenceUrl),
        ];

        return response()->view('player', $data);
    }

    public function generateLicence(Request $request, $courseId)
    {
        // getting the course this licence is issued for
        $course = Course::find($courseId);

        // optional: setting up specification for this licence device creteria
        $devices = spotplayer()->setDevice(
            $numberOfAllowedActiveDevices=2, 
            $Windows=0, 
            $MacOS=0, 
            $Ubuntu=0, 
            $Android=0, 
            $IOS=0, 
            $WebApp=2
        );

        // generating the licence for current user
        $lisence = SpotPlayer::licence(
            $name = 'customer', 
            $courses = [ $course->courseId ], 
            $watermarks = 'watermark', // or a proper watermark array 
            $device = $devices, 
            $payload = null
        );

        // saving generated licence in the database
        $licence_id = Licence::create([
            'licenceId'  => $licence['_id'],
            'licenceUrl' => $licence['url'],
            'licenceKey' => $licence['key'],
            'subscriber_id' => auth()->user()->id,
        ]);

        // connecting the licence and course
        CourseLicence::create([
            'licence_id' => $licence_id,
            'course_id'  => $course->id,
        ]);

        // generating response
        return response('licence created and saved in database under id'.$licence_id , 200)
                    ->header('Content-Type', 'text/plain');
    }

    public function updateLicence(Request $request, $courseId, $licenseId)
    {
        try{
            $licences = array_merge_recursive(...auth()->user()->licences->toArray())['licenceId'];
            if(is_array($licences)){
                if(!in_array($licenceId, $licences)){
                    throw new \Exception('Provided licence does not belong to the user.');
                }
            }
            else{
                if($licenceId === $licences){
                    throw new \Exception('Provided licence does not belong to the user.');
                }
            }
        }
        catch (\Exception $e) {
            return response()
            ->view('errors', ['errorMessage'=>$e->getMessage()], 500)
            ->header('Content-Type', 'text/html');
        }
        
        SpotPlayer::updateLicense(
            $licenseId, 
            $name = 'customer', 
            $data = [
                'limit' => [
                    $courseId => '0-'
                ]
            ], 
            $device = [
                'p0' => 1, 
                'p1' => 1, 
                'p2' => 0, 
                'p3' => 0, 
                'p4' => 0, 
                'p5' => 0, 
                'p6' => 0
            ]
        );

    }
}
