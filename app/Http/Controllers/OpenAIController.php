<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneratorOpenAIService;

class OpenAIController extends Controller
{
    private $openAiService;

    public function __construct(GeneratorOpenAIService $openAiService)
    {
        $this->openAiService = $openAiService;
    }

    public function chatOpenAi(Request $request)
    {
        $question = $request->question;

        if ($question == null) {
            return back();
        }

        $response = $this->openAiService->generateResponseOpenAi($question);

        return response()->json(['response' => $response]);
    }
}
