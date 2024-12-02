<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeDashboardController extends Controller
{
    //  dashboard
    public function index(){
        // $data['task_status'] = TaskStatus::where('status', 1)->get();
        return view('backend.file.employee.dashboard');
    }
}
