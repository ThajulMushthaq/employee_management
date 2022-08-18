<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    private $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new \App\Models\EmployeeModel;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['employee_active'] = 'active';
        $data['data'] = $this->employeeModel->get_all_data();
        // dd($data);
        return view('employee.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        //
        // dd($id);
        $data = [];
        $data['employee_active'] = 'active';
        if ($id > 0) {
            $data['data'] = $this->employeeModel->get_row($id);
        }
        return view('employee.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employee,email,' . $request->get('id'),
        ]);

        $values = array(
            'name' => @$request->get('name') ?: '',
            'phone' => @$request->get('phone') ?: '',
            'email' => @$request->get('email') ?: '',
            'updated_at' => date('Y-m-d H:i:s')
        );

        if ($request->get('id') > 0) {
            $id = $request->get('id');
        } else {
            $id = 0;
            $values['created_at'] = date('Y-m-d H:i:s');
        }

        $this->employeeModel->save_data($values, $id);

        return redirect('/employee')->with('success', 'Employee successfully updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($id > 0) {
            $this->employeeModel->delete_data($id);
            return redirect()->back()->with("success", "Item Deleted successfully!");
        }
    }
}
