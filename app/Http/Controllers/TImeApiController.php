<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\TimeService;

class TImeApiController extends Controller
{
    private TimeService $timeService;

    public function __construct(TimeService $timeService)
    {
        $this->timeService = $timeService;
    }

    public function getTime(): JsonResponse
    {
        return response()->json([
            'current_time' => $this->timeService->getCurrentTime()
        ]);
    }
}
