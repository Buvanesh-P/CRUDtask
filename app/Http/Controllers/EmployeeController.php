<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empdata= Employee::OrderBy('id')->Paginate(5);
        return view('employee.index',compact('empdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
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
            'email'=> 'required','email',
            'description'=> 'required','min:10',
            'phone'=>'required','integer',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'dob' =>'required',
            'desgination' => 'required',
            'status' =>'required',


        ]);
        $path = $request->file('image')->store('public/images');
        $rec = New Employee;
        $rec->name = $request->name;
        $rec->email = $request->email;
        $rec->description = $request->description;
        $rec->phone = $request->phone;
        $rec->image = $path;
        $rec->dob = $request->dob;
        $rec->desgination = $request->desgination;
        $rec->status = $request->status;

        $rec->save();

        return redirect()->route('employee.index')
                        ->with('success','Employee Added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $rec)
    {
        //
//        return view('employee.edit',compact('rec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $where = array('id' => $id);
        $rec= Employee::where($where)->first();

        //return view('employee.edit', $rec);

        return view('employee.edit',compact('rec'));

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

        $request->validate(['name' => 'required',
        'email'=> 'required','email',
        'description'=> 'required','min:10',
        'phone'=>'required','integer',
        'desgination' => 'required',
        'status' =>'required',
        'dob' =>'required',
        ]);

        $rec = Employee::find($id);
        $rec->name = $request->name;
        $rec->email = $request->email;
        $rec->description = $request->description;
        $rec->phone = $request->phone;
        //$rec->image = $path;
        $rec->dob = $request->dob;
        $rec->desgination = $request->desgination;
        $rec->status = $request->status;

        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $rec->image = $path;
        }

        $rec->save();
        return redirect()->route('employee.index')->with('success','Record updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where('id',$id)->delete();

        return redirect()->route('employee.index')
                        ->with('success','Employee data has been deleted successfully');
    }
}
