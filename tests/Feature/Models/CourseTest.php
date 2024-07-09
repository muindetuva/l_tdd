<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('only returns released courses for released scope', function () {
    // Arrange
    $releasedCourse = Course::factory()->released()->create();
    $unreleasedCourse = Course::factory()->create();

    // Act
    $courses = Course::released()->get();

    // Assert
    expect($courses)
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});
