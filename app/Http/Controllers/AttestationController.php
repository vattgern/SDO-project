<?php

namespace App\Http\Controllers;

use App\Events\ArrearEvent;
use App\Http\Requests\AttestationJournalRequest;
use App\Http\Requests\AttestationRequest;
use App\Models\Arrear;
use App\Models\Attestation;
use App\Models\Lesson;
use Illuminate\Http\Request;

class AttestationController extends Controller
{
    public function attestation(AttestationRequest $request){
        if($request->rate == 2){
            event(new ArrearEvent(new Arrear(), $request));
        }
        $id_lesson = Lesson::where('name', $request->lesson)->first()->id;
        $attestation = Attestation::create([
            'semester' => $request->semester,
            'rate' => $request->rate,
            'id_lesson' => $id_lesson,
            'id_student' => $request->id_student,
            'id_teacher' => auth('sanctum')->user()->teacher->id
        ]);
        return response()->json(['message' => 'Оценка поставлена', 'data' => $attestation],200);
    }

    public function attestationJournal(AttestationJournalRequest $request){
        $id_lesson = Lesson::where($request->lesson, 'name')->first()->id;
        $rate = $request->rate;
        foreach ($request->students as $student){
            Attestation::create([
                'semester' => $student['semester'],
                'rate' => $rate,
                'id_lesson' => $id_lesson,
                'id_student' => $student['id_student'],
                'id_teacher' => auth('sanctum')->user()->teacher->id
            ]);
        }
        $responseDate = now();
        return response()->json(['message' => 'Журнал заполнен за '. $responseDate], 200);
    }

    public function attestations(){
        $student_id = auth('sanctum')->user()->student->id;
        $attestations = Attestation::where('student_id', $student_id)->get();
        return response()->json($attestations);
    }


}
