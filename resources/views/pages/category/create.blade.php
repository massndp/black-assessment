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
            <div class="card-body">
               <form action="{{route('category.store')}}" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="category">Kategori</label>
                    <input type="text" name="category" class="form-control" value="{{old('category')}}" required>
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