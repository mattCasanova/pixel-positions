<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $jobs = $tag->jobs;
        // eader load employer for jobs
        $jobs->load('employer', 'tags');
        return view('results', ['jobs' => $jobs]);
    }
}
