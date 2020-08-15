@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stack Overflow</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Pertanyaan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <h4>Recent Questions</h4>

              @forelse ($pertanyaan as $pertanyaan)
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="https://ui-avatars.com/api/?name={{ $pertanyaan->profile->nama_lengkap }}" alt="user image">
                    <span class="username">
                        <a class="text-dark" href="#">{{ $pertanyaan->profile->nama_lengkap }}</a>
                    </span>
                    <span class="description">Shared publicly - {{ $pertanyaan->created_at }}</span>
                  </div>
                  <!-- /.user-block -->
                <h4><a class="text-gray" href="{{ route('pertanyaan.show', $pertanyaan->id) }}">{{ $pertanyaan->judul }}</a></h4>
                  <p>
                    {{ $pertanyaan->isi }}
                  </p>

                  <p>
                      @forelse ($pertanyaan->tags as $tag)
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i>{{ $tag->tag_name }}</a>
                      @empty
                          No Tags
                      @endforelse
                  </p>
                  <span class="badge badge-success bage-xs">Jawaban 0</span>
                  <span class="badge badge-primary bage-xs">Komentar 0</span>
                </div>
              @empty
                No Post
              @endforelse
            </div>
            {{-- /col --}}
          </div>
          {{-- /row --}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
