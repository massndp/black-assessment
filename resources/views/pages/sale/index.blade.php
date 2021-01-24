@extends('layouts.default')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori Produk</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{route('sale.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Transaksi Penjualan
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No Transaksi</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Tanggal Pembelian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{$item->uuid}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>
                                    <form action="{{route('sale.destroy', $item->id)}}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Kategori Kosong!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
   
  </div>
@endsection