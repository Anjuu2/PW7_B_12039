<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Book;
use App\Models\Bookings;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CustomerController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $customers = Customer::latest()->paginate(5);

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        $bookings = Bookings::all();
        $book = Book::all();
        return view('customer.create', compact('bookings', 'book'));
    }

    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'quantity' => 'required|integer',
            'id_bookings' => 'required'
        ]);

        Customer::create(
            [ 
            'name' => $request->name, 
            'email' => $request->email, 
            'phone' => $request->phone, 
            'quantity' => $request->quantity, 
            'id_bookings' => $request->id_bookings
        ]); 

        try 
        {
            return redirect()->route('customer.index')->with('success', 'Customer Created Successfully!');
        } catch (Exception $e) {
            return redirect()->route('customer.index')->with('error', 'Error Occurred During Process');
        }
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $bookings = Bookings::all();
        $book     = Book::all();
        return view('customer.edit', compact('customer', 'bookings', 'book'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $this->validate($request, [
            'name' => 'nullable', 
            'email' => 'nullable|email', 
            'phone' => 'nullable', 
            'quantity' => 'nullable|integer',
            'id_bookings' => 'nullable'
        ]);

        if ($request->filled('name')) {
            $customer->name = $request->name;
        }
        if ($request->filled('email')) {
            $customer->email = $request->email;
        }
        if ($request->filled('phone')) {
            $customer->phone = $request->phone;
        }
        if ($request->filled('quantity')) {
            $customer->quantity = $request->quantity;
        }
        if ($request->filled('id_bookings')) {
            $customer->id_bookings = $request->id_bookings;
        }

        $customer->save();
        return redirect()->route('customer.index')->with(['success' => 'Customer Updated Successfully!']);
    }

    public function destroy($id) 
    { 
        $customer = Customer::find($id); 
        $customer->delete(); 
        return redirect()->route('customer.index')->with(['success' => 'Customer Deleted Successfully!']); 
    }
}
