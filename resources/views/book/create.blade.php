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
                <h1 class="m-0 text-primary"><i class="bi bi-journal-bookmark-fill"></i> Tambah Buku</h1> 
            </div> 
            <div class="col-sm-6"> 
                <ol class="breadcrumb float-sm-right"> 
                    <li class="breadcrumb-item"> 
                        <a href="{{ url('book') }}">Book</a> 
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
                            <h5><i class="bi bi-plus-circle-fill"></i> Form Tambah Buku</h5>
                        </div>
                        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table class="table equal-width-table w-100">
                                <tr>
                                    <th>Upload Gambar</th>
                                    <th>Judul Buku</th>
                                </tr>
                                
                                <tr>
                                    <td>
                                        <input type="file" class='form-control' id="image" name="image" >
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Buku" >
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th>Penulis</th>
                                    <th>Jumlah Halaman</th>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="author" name="author" placeholder="Masukkan Nama Penulis" >
                                        @error('author')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="pages" name="pages" placeholder="Masukkan Jumlah Halaman" >
                                        @error('pages')
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
