<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class UserController extends Controller
{
    public function ProjectIndex()
    {
        $projects = Project::all();
        return response()->json($projects);
    }
}
