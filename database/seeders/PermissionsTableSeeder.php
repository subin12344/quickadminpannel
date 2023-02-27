<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'tool_access',
            ],
            [
                'id'    => 20,
                'title' => 'academic_year_create',
            ],
            [
                'id'    => 21,
                'title' => 'academic_year_edit',
            ],
            [
                'id'    => 22,
                'title' => 'academic_year_show',
            ],
            [
                'id'    => 23,
                'title' => 'academic_year_delete',
            ],
            [
                'id'    => 24,
                'title' => 'academic_year_access',
            ],
            [
                'id'    => 25,
                'title' => 'tools_degree_type_create',
            ],
            [
                'id'    => 26,
                'title' => 'tools_degree_type_edit',
            ],
            [
                'id'    => 27,
                'title' => 'tools_degree_type_show',
            ],
            [
                'id'    => 28,
                'title' => 'tools_degree_type_delete',
            ],
            [
                'id'    => 29,
                'title' => 'tools_degree_type_access',
            ],
            [
                'id'    => 30,
                'title' => 'tools_department_create',
            ],
            [
                'id'    => 31,
                'title' => 'tools_department_edit',
            ],
            [
                'id'    => 32,
                'title' => 'tools_department_show',
            ],
            [
                'id'    => 33,
                'title' => 'tools_department_delete',
            ],
            [
                'id'    => 34,
                'title' => 'tools_department_access',
            ],
            [
                'id'    => 35,
                'title' => 'tools_section_id_create',
            ],
            [
                'id'    => 36,
                'title' => 'tools_section_id_edit',
            ],
            [
                'id'    => 37,
                'title' => 'tools_section_id_show',
            ],
            [
                'id'    => 38,
                'title' => 'tools_section_id_delete',
            ],
            [
                'id'    => 39,
                'title' => 'tools_section_id_access',
            ],
            [
                'id'    => 40,
                'title' => 'toolssyllabus_year_create',
            ],
            [
                'id'    => 41,
                'title' => 'toolssyllabus_year_edit',
            ],
            [
                'id'    => 42,
                'title' => 'toolssyllabus_year_show',
            ],
            [
                'id'    => 43,
                'title' => 'toolssyllabus_year_delete',
            ],
            [
                'id'    => 44,
                'title' => 'toolssyllabus_year_access',
            ],
            [
                'id'    => 45,
                'title' => 'batch_create',
            ],
            [
                'id'    => 46,
                'title' => 'batch_edit',
            ],
            [
                'id'    => 47,
                'title' => 'batch_show',
            ],
            [
                'id'    => 48,
                'title' => 'batch_delete',
            ],
            [
                'id'    => 49,
                'title' => 'batch_access',
            ],
            [
                'id'    => 50,
                'title' => 'tools_course_create',
            ],
            [
                'id'    => 51,
                'title' => 'tools_course_edit',
            ],
            [
                'id'    => 52,
                'title' => 'tools_course_show',
            ],
            [
                'id'    => 53,
                'title' => 'tools_course_delete',
            ],
            [
                'id'    => 54,
                'title' => 'tools_course_access',
            ],
            [
                'id'    => 55,
                'title' => 'course_enroll_master_create',
            ],
            [
                'id'    => 56,
                'title' => 'course_enroll_master_edit',
            ],
            [
                'id'    => 57,
                'title' => 'course_enroll_master_show',
            ],
            [
                'id'    => 58,
                'title' => 'course_enroll_master_delete',
            ],
            [
                'id'    => 59,
                'title' => 'course_enroll_master_access',
            ],
            [
                'id'    => 60,
                'title' => 'transport_access',
            ],
            [
                'id'    => 61,
                'title' => 'createvehicle_create',
            ],
            [
                'id'    => 62,
                'title' => 'createvehicle_edit',
            ],
            [
                'id'    => 63,
                'title' => 'createvehicle_show',
            ],
            [
                'id'    => 64,
                'title' => 'createvehicle_delete',
            ],
            [
                'id'    => 65,
                'title' => 'createvehicle_access',
            ],
            [
                'id'    => 66,
                'title' => 'create_driver_create',
            ],
            [
                'id'    => 67,
                'title' => 'create_driver_edit',
            ],
            [
                'id'    => 68,
                'title' => 'create_driver_show',
            ],
            [
                'id'    => 69,
                'title' => 'create_driver_delete',
            ],
            [
                'id'    => 70,
                'title' => 'create_driver_access',
            ],
            [
                'id'    => 71,
                'title' => 'transport_route_create',
            ],
            [
                'id'    => 72,
                'title' => 'transport_route_edit',
            ],
            [
                'id'    => 73,
                'title' => 'transport_route_show',
            ],
            [
                'id'    => 74,
                'title' => 'transport_route_delete',
            ],
            [
                'id'    => 75,
                'title' => 'transport_route_access',
            ],
            [
                'id'    => 76,
                'title' => 'vehicle_assign_create',
            ],
            [
                'id'    => 77,
                'title' => 'vehicle_assign_edit',
            ],
            [
                'id'    => 78,
                'title' => 'vehicle_assign_show',
            ],
            [
                'id'    => 79,
                'title' => 'vehicle_assign_delete',
            ],
            [
                'id'    => 80,
                'title' => 'vehicle_assign_access',
            ],
            [
                'id'    => 81,
                'title' => 'transport_stop_create',
            ],
            [
                'id'    => 82,
                'title' => 'transport_stop_edit',
            ],
            [
                'id'    => 83,
                'title' => 'transport_stop_show',
            ],
            [
                'id'    => 84,
                'title' => 'transport_stop_delete',
            ],
            [
                'id'    => 85,
                'title' => 'transport_stop_access',
            ],
            [
                'id'    => 86,
                'title' => 'assign_student_create',
            ],
            [
                'id'    => 87,
                'title' => 'assign_student_edit',
            ],
            [
                'id'    => 88,
                'title' => 'assign_student_show',
            ],
            [
                'id'    => 89,
                'title' => 'assign_student_delete',
            ],
            [
                'id'    => 90,
                'title' => 'assign_student_access',
            ],
            [
                'id'    => 91,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
