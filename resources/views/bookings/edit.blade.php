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
                <h1 class="m-0 text-primary"><i class="bi bi-calendar-plus-fill"></i> Edit Booking</h1> 
            </div> 
            <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item"> 
                        <a href="{{ url('bookings') }}">Bookings</a> 
                    </li> 
                    <li class="breadcrumb-item active">Edit</li> 
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
                            <h5><i class="bi bi-plus-circle-fill"></i> Form Edit Bookings</h5>
                        </div>
                        <form action="{{ route('bookings.update', $bookings->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <table class="table equal-width-table w-100">
                                <tr>
                                    <th>Kelas</th>
                                    <th>Harga</th>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <input type="text" class="form-control" id="class" name="class" value="{{ $bookings->class }}" placeholder="Masukkan Nama Kelas">
                                        @error('class')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $bookings->price }}" placeholder="Masukkan Harga">
                                        @error('price')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>Pilih Buku</th>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <select id="id_book" name="id_book" class="form-control">
                                            <option value="{{ $bookings->id_book }}" selected>{{ $bookings->book->title }}</option>
                                            @foreach ($book as $item)
                                                @if ($item->id != $bookings->id_book)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('naid book')
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
