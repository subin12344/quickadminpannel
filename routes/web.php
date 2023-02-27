<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Academic Year
    Route::delete('academic-years/destroy', 'AcademicYearController@massDestroy')->name('academic-years.massDestroy');
    Route::resource('academic-years', 'AcademicYearController');

    // Tools Degree Type
    Route::delete('tools-degree-types/destroy', 'ToolsDegreeTypeController@massDestroy')->name('tools-degree-types.massDestroy');
    Route::resource('tools-degree-types', 'ToolsDegreeTypeController');

    // Tools Department
    Route::delete('tools-departments/destroy', 'ToolsDepartmentController@massDestroy')->name('tools-departments.massDestroy');
    Route::resource('tools-departments', 'ToolsDepartmentController');

    // Tools Section Id
    Route::delete('tools-section-ids/destroy', 'ToolsSectionIdController@massDestroy')->name('tools-section-ids.massDestroy');
    Route::resource('tools-section-ids', 'ToolsSectionIdController');

    // Toolssyllabus Year
    Route::delete('toolssyllabus-years/destroy', 'ToolssyllabusYearController@massDestroy')->name('toolssyllabus-years.massDestroy');
    Route::resource('toolssyllabus-years', 'ToolssyllabusYearController');

    // Batch
    Route::delete('batches/destroy', 'BatchController@massDestroy')->name('batches.massDestroy');
    Route::resource('batches', 'BatchController');

    // Tools Course
    Route::delete('tools-courses/destroy', 'ToolsCourseController@massDestroy')->name('tools-courses.massDestroy');
    Route::resource('tools-courses', 'ToolsCourseController');

    // Course Enroll Master
    Route::delete('course-enroll-masters/destroy', 'CourseEnrollMasterController@massDestroy')->name('course-enroll-masters.massDestroy');
    Route::resource('course-enroll-masters', 'CourseEnrollMasterController');

    // Createvehicle
    Route::delete('createvehicles/destroy', 'CreatevehicleController@massDestroy')->name('createvehicles.massDestroy');
    Route::resource('createvehicles', 'CreatevehicleController');

    // Create Driver
    Route::delete('create-drivers/destroy', 'CreateDriverController@massDestroy')->name('create-drivers.massDestroy');
    Route::resource('create-drivers', 'CreateDriverController');

    // Transport Route
    Route::delete('transport-routes/destroy', 'TransportRouteController@massDestroy')->name('transport-routes.massDestroy');
    Route::resource('transport-routes', 'TransportRouteController');

    // Vehicle Assign
    Route::delete('vehicle-assigns/destroy', 'VehicleAssignController@massDestroy')->name('vehicle-assigns.massDestroy');
    Route::resource('vehicle-assigns', 'VehicleAssignController');

    // Transport Stop
    Route::delete('transport-stops/destroy', 'TransportStopController@massDestroy')->name('transport-stops.massDestroy');
    Route::resource('transport-stops', 'TransportStopController');

    // Assign Student
    Route::delete('assign-students/destroy', 'AssignStudentController@massDestroy')->name('assign-students.massDestroy');
    Route::resource('assign-students', 'AssignStudentController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
