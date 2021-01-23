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
                <a href="{{route('category.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Kategori Produk
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($items as $item)
                            <td>{{$no}}</td>
                            <td>{{$item->category}}</td>
                            <td>
                                <a href="{{route('category.edit', $item->id)}}" class="btn btn-success">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('category.destroy', $item->id)}}" class="d-inline" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <?php $no++ ?>
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