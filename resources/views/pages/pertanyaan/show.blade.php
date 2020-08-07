@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-primary shadow mx-3 mt-3">
      <div class="card-header">
      <h3 class="card-title">{{ $pertanyaan->judul }}}}</h3>

      </div>
      <!-- /.card-header -->
    <p>{{ $pertanyaan->isi }}</p>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
