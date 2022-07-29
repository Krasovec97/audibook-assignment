<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            // Parse Date for SQL
            $dateOfBirth = strtotime($request->date_of_birth);
            $sqlFormat = date('Y-m-d', $dateOfBirth);
            

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
                'date_of_birth' => $sqlFormat,
                'link' => $request->link
            ]);

            // Return success response
            return response()->json([
                'Code' => 200,
                'Message' => 'OK'
            ]);
        }
        catch (\Throwable $error)
        {
            $message = $error->getMessage();

            // Return error message
            return response()->json([
                'Code' => 400,
                'Error' => $message
            ]);
        }



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
