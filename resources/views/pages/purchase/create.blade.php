@extends('layouts.default')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Transaksi Pembelian</h1>
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
               <form action="{{route('purchase.store')}}" method="POST">
                @csrf
                  <div class="form-group" style="width: 50%">
                    <label for="products_id">Produk</label>
                    <select name="products_id" class="form-control select2">
                      <option value="">Pilih Produk</option>
                      @foreach ($products as $item)
                          <option value="{{$item->id}}">
                            {{$item->name}}
                          </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" style="width: 50%">
                    <label for="qty">Jumlah</label>
                    <input type="number" name="qty" class="form-control" value="{{old('qty')}}">
                  </div>
                  <div class="form-group" style="width: 50%">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" value="{{old('tanggal')}}">
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