<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            // Create a new entry
            JobApplication::create([
                'full_name' => $request->full_name,
                'gender' => $request->gender,
                'email' => $request->email,
                'date_of_birth' => $this->dateParse($request),
                'link' => $request->link
            ]);

            // Return success response
            $succesResponse = response()->json([
                'code' => 200,
                'message' => 'OK'
            ]);
            $this->logRequest($request, $succesResponse);
            return $succesResponse;
        }
        catch (\Throwable $error)
        {
            $message = $error->getMessage();

            // Return error message
            $badResponse = response()->json([
                'code' => 400,
                'error' => $message
            ]);
            $this->logRequest($request, $badResponse);
            return $badResponse;
        }
    }

    private function logRequest(Request $request, $response) {
        //Log the Request
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
