<?php

namespace App\Listeners;

use App\Events\ArrearEvent;
use App\Models\Lesson;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ArrearListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    /**
     * Handle the event.
     *
     * @param  \App\Events\ArrearEvent  $event
     * @return void
     */
    public function handle(ArrearEvent $event)
    {
        $arrear = $event->getArrear();
        $request = $event->getRequest();
        $arrear->id_lesson = Lesson::where('name', $request->lesson)->first()->id;
        $arrear->closed = 0;
        $arrear->id_student = $request->id_student;
        $arrear->id_teacher = auth('sanctum')->user()->teacher->id;
        $arrear->semester = $request->semester;
        $arrear->save();
    }
}
