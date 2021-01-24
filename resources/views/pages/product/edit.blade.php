@extends('layouts.default')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Produk</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <button class="close" data-dismiss="alert" aria-label="close">
                  <span aria-hidden="false">&times;</span>
                </button>
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
          @endif
            <div class="card-body">
               <form action="{{route('product.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Nama Produk</label>
                  <input type="text" name="name" class="form-control" value="{{$item->name}}" required>
                </div>
                <div class="form-group">
                  <label for="category_id">Kategori</label>
                  <select name="category_id" id="" class="form-control select2" required>
                    <option value="">Pilih Kategori Product</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">
                          {{$item->category}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="price">Harga Produk</label>
                  <input type="number" name="price" class="form-control" value="{{$item->price}}" required>
                </div>
                <div class="form-group">
                  <label for="qty">Jumlah Produk</label>
                  <input type="number" name="qty" class="form-control" value="{{$item->qty}}" required>
                </div>
                <div class="form-group">
                  <label for="photo"></label><br>
                  <input type="file" name="photo">
                </div>
                  <button class="btn btn-primary" type="submit">
                    <i class="fa fa-save"></i>
                  </button>
                  <button class="btn btn-danger" type="reset">
                    <i class="fa fa-undo"></i>
                  </button>
               </form>
            </div>
        </div>
      </div>
    </section>
   
  </div>
@endsection