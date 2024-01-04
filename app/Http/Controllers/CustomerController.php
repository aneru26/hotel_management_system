<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Customer::all();
        return view('customer.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'g-recaptcha-response' => 'required|captcha',
    ]);

    // Check if a customer with the same email and full name already exists
    $existingCustomer = Customer::where('email', $request->email)
        ->where('full_name', $request->full_name)
        ->first();

    if ($existingCustomer) {
        // Customer with the same email and full name already exists, return an error
        return redirect()->back()->with('error', 'A customer with the same email and full name already exists.');
    }

    $imgPath = null; // Initialize the variable

    if ($request->hasFile('photo')) {
        $imgPath = $request->file('photo')->store('public/imgs');
    }

    $data = new Customer;
    $data->full_name = $request->full_name;
    $data->email = $request->email;
    $data->password = sha1($request->password);
    $data->mobile = $request->mobile;
    $data->address = $request->address;
    $data->photo = $imgPath; // Assign the variable here
    $data->save();

    $ref = $request->ref;
    if ($ref == 'front') {
        return redirect('register')->with('success', 'Data has been saved');
    }

    return redirect('admin/customer/create')->with('success', 'Data has been added');
}

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Customer::find($id);
        return view('customer.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        

        $data=Customer::find($id);
        return view('customer.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            

        ]);

        if($request->hasFile('photo')){
            $imgPath=$request->file('photo')->store('public/imgs');
        }else {
            $imgPath=$request->prev_photo;
        }

        
         
        $data=Customer::find($id);
        $data->full_name=$request->full_name;
        $data->email=$request->email;
        $data->password = sha1($request->password);
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->photo=$imgPath;
        $data->save();

        return redirect('admin/customer/'.$id.'/edit')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Check if the customer exists
        $customer = Customer::find($id);
    
        if (!$customer) {
            return redirect('admin/customer')->with('error', 'Customer not found');
        }
    
        // Delete the customer
        $customer->delete();
    
        return redirect('admin/customer')->with('success', 'Data has been deleted');
    }
    //customer login
    function frontlogin(){
        return view('frontlogin');
    }

    //check
    function customer_login(Request $request){
        $email=$request->email;
        $pwd=sha1($request->password);
        $detail=Customer::where(['email'=>$email,'password'=>$pwd])->count();
        if($detail>0){
            $detail=Customer::where(['email'=>$email,'password'=>$pwd])->get();
            session(['customerlogin'=>true,'data'=>$detail]);
            return redirect('/');
        }else{
            return redirect('frontlogin')->with('error','Invalid email/password!!');
        }
    }
    //register
    function register(){
        return view('register');
    }

    //logout
    function logout(){
       session()->forget(['customerlogin','data']);
       return redirect('/');
    }
}
