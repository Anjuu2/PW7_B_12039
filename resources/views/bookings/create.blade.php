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
                <h1 class="m-0 text-primary"><i class="bi bi-calendar-plus-fill"></i> Tambah Booking</h1> 
            </div> 
            <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item"> 
                        <a href="{{ url('bookings') }}">Bookings</a> 
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
                            <h5><i class="bi bi-plus-circle-fill"></i> Form Tambah Bookings</h5>
                        </div>
                        <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table equal-width-table w-100">
                                <tr>
                                    <th>Kelas</th>
                                    <th>Harga</th>
                                </tr>
                                
                                <tr>
                                    <td>
                                    <input type="text" class="form-control" id="class" name="class" placeholder="Masukkan Nama Kelas">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga">
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
                                            <option value="" disabled selected>Pilih Buku</option>
                                            @forelse ($book as $item)
                                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                            @empty
                                                <option value="">Tidak ada buku tersedia</option>
                                            @endforelse
                                        </select>
                                        @error('id book')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></i><button type="submit" class="btn btn-success" style="float: right;">Simpan Perubahan</button></td>
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
