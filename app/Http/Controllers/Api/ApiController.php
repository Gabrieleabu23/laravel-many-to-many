<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;
class ApiController extends Controller
{
    public function getTest() {

        return response()->json([
            'status' => 'success',
            'message' => 'Questo e\' un testo di prova'
        ]);
    }
    public function getTech() {
        $technologies = Technology :: paginate(3);

        return response()->json([
            'status' => 'success',
            'technologies' => $technologies
        ]);

    }
    public function createTechnologies(Request $request){

        $data = $request -> all();

        $technologies = new Technology;
        $technologies -> name = $data['name'];

        $technologies -> save();

        return response()->json([
            'status' => 'success',
            'technologies' => $technologies,
        ]);

    }
}
