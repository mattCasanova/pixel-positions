<?php

use App\Models\Employer;
use App\Models\Job;

it('belongs to an employer', function () {
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);

    // Act

    // Assert
    expect($job->employer)->toBeInstanceOf(Employer::class);
    expect($job->employer)->is($employer);
});

it('can have tags', function () {
    // Arrange
    $job = Job::factory()->create();

    // Act
    $job->attachTag('FrontEnd');
    $job->attachTag('PHP');

    // Assert
    expect($job->tags)->toHaveCount(2);
    //expect($job->tags->pluck('name')->toArray())->toEqual(['Laravel', 'PHP']);
});
