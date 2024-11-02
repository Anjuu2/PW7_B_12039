@extends('dashboard')
@section('content')

<style>
    .equal-width-table td, .equal-width-table th {
        width: 50%;
        border: 0px;
    }
</style>

<div class="content-header"> 
    <div class="container-fluid"> 
        <div class="row mb-2"> 
            <div class="col-sm-6"> 
                <h1 class="m-0 text-primary"><i class="bi bi-person-plus-fill"></i> Tambah Customer</h1> 
            </div> 
            <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item"> 
                        <a href="{{ url('customer') }}">Customer</a> 
                    </li> 
                    <li class="breadcrumb-item active">Create</li> 
                </ol> 
            </div> 
        </div> 
    </div> 
</div>

<div class="content"> 
    <div class="container-fluid"> 
        <div class="row"> 
            <div class="col-12"> 
                <div class="card"> 
                    <div class="card-body"> 
                        <div class="card-header bg-primary">
                            <h5><i class="bi bi-plus-circle-fill"></i> Form Tambah Customer</h5>
                        </div>
                        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table equal-width-table w-100">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Customer">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Customer">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>No Telepon</th>
                                    <th>Bookings</th>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="phone" class="font-weight-bold">No Telepon</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan No Telepon">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <select id="id_bookings" name="id_bookings" class="form-control">
                                            <option value="" disabled selected>Pilih bookings</option>
                                            @foreach($bookings as $booking)
                                                <option value="{{ $booking->id }}">
                                                {{ $booking->book->title }} ({{ $booking->class }}: {{ $booking->price }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_bookings')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>Quantity</th>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Quantity">
                                        @error('quantity')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></i><button type="submit" class="btn btn-success" style="float: right;">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

@endsection
