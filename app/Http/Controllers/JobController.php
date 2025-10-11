<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('employer', 'tags')->latest()->get();
        $featuredJobs = $jobs->filter(fn ($job) => $job->featured);
        $tags = Tag::all();
        return view('jobs.index', [
            'jobs' => $jobs,
            'tags' => $tags,
            'featuredJobs' => $featuredJobs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $attributes = $request->validated();

        $attributes['featured'] = $request->has('featured');
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($request->filled('tags')) {
            $tagNames = array_map('trim', explode(',', $attributes['tags']));
            foreach ($tagNames as $name) {
                $job->attachTag($name);
            }
        }

        return redirect('/')->with('success', 'Job posted successfully!');
    }
}
