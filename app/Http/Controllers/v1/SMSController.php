<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SMSRequest;
use App\Http\Resources\v1\SMSResource;
use App\Http\Services\v1\SMSService;
use App\Models\SMS;
use Throwable;


class SMSController extends Controller
{

    public function __construct(
        private SMSService $smsService
    ){}

    public function index()
    {
        return SMSResource::collection(SMS::all());
    }

    public function show(SMS $sms)
    {
        return SMSResource::make($sms);
    }

    public function sendSMS(SMSRequest $request)
    {
        $text = $request->exists('text') ? $request->input('text') : null;

        $status = $this->smsService->sendSMSRequest($request->number, $text);

        return $status === 'ok' ?
            response()->json(SMS::createSMS($request->all()), 201) :
            response()->json(['error' => 'there is an error from the serve'], 402);
    }

    public function destroy(SMS $sms)
    {
        try {
            $response = response()->json($sms->deleteOrFail());
        } catch (Throwable $e) {
            $response = response()->json(['error' => $e], 402);
        }
        return $response;
    }
}
