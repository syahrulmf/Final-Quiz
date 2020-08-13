@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-primary shadow mx-3 mt-3">
      <div class="card-header">
        <h3 class="card-title">{{ $pertanyaan->judul }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <p>{{ $pertanyaan->isi }}</p>
        <p>Author : {{ $pertanyaan->profile->nama_lengkap }}</p>
        <div>
            Tags :
            @forelse ($pertanyaan->tags as $tag)
                <a href="" class="badge badge-primary badge-xs"> {{ $tag->tag_name }} </a>
            @empty
                No Tags
            @endforelse
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
