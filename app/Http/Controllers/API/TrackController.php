<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\JsonResponse;

class TrackController extends Controller
{
    /**
     * Fetch all tracks with their relationships for React.
     */
    public function index(): JsonResponse
    {
        // "with()" eager-loads the artist and album to prevent heavy database loads
        $tracks = Track::with(['artist', 'album'])->latest()->get();

        // Return the data as a secure JSON response with an HTTP 200 Success status
        return response()->json([
            'status' => 'success',
            'data' => $tracks
        ], 200);
    }
}