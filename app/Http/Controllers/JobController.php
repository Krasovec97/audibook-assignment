<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class jobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate form
            $request->validate([
                'full_name' => 'required|string',
                'gender' => 'required|string',
                'email' => 'required|string',
                'date_of_birth' => 'required|date',
                'link' => 'required|string'
            ]);

            // Create a new entry or update where 'full_name' or 'email' already exists.
            JobApplication::updateOrCreate([
                'full_name' => strToLower($request->full_name),
                'email' => $request->email,
            ], [
                'gender' => $request->gender,
                'date_of_birth' => $this->dateParse($request),
                'link' => $request->link
            ]);

            // Return success response
            $successResponse = response()->json([
                'code' => 200,
                'message' => 'OK'
            ]);

            // Log request before returning
            $this->logRequest($request, $successResponse);
            return $successResponse;
        }
        catch (\Throwable $error)
        {
            $message = $error->getMessage();

            // Return error message
            $badResponse = response()->json([
                'code' => 400,
                'error' => $message
            ]);

            // Log request before returning
            $this->logRequest($request, $badResponse);
            return $badResponse;
        }
    }

    private function logRequest(Request $request, $response) {
        $generateDate = now()->format('Ymd');

        Log::build([
            'driver' => 'single',
            'path' => base_path('logs/requests_' . $generateDate . '.log'),
            'level' => 'info',
        ])->info('New request:', [
            $response->content(),
            $request->full_name,
            $request->gender,
            $request->email,
            $request->date_of_birth,
            $request->link
        ]);
    }

    private function dateParse (Request $request) {
        // Parse Date for SQL
        $dateOfBirth = strtotime($request->date_of_birth);
        $sqlFormat = date('Y-m-d', $dateOfBirth);

        return $sqlFormat;
    }
}
