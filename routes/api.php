<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Academic Year
    Route::apiResource('academic-years', 'AcademicYearApiController');

    // Tools Degree Type
    Route::apiResource('tools-degree-types', 'ToolsDegreeTypeApiController');

    // Tools Department
    Route::apiResource('tools-departments', 'ToolsDepartmentApiController');

    // Tools Section Id
    Route::apiResource('tools-section-ids', 'ToolsSectionIdApiController');

    // Course Enroll Master
    Route::apiResource('course-enroll-masters', 'CourseEnrollMasterApiController');

    // Createvehicle
    Route::apiResource('createvehicles', 'CreatevehicleApiController');

    // Create Driver
    Route::apiResource('create-drivers', 'CreateDriverApiController');

    // Vehicle Assign
    Route::apiResource('vehicle-assigns', 'VehicleAssignApiController');

    // Transport Stop
    Route::apiResource('transport-stops', 'TransportStopApiController');

    // Assign Student
    Route::apiResource('assign-students', 'AssignStudentApiController');
});
