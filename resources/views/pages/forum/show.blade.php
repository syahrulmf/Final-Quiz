@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Pertanyaan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <h4>Details Questions {{ $pertanyaan->id }}</h4>

                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="https://ui-avatars.com/api/?name={{ $pertanyaan->profile->nama_lengkap }}" alt="user image">
                    <span class="username">
                        <a href="#">{{ $pertanyaan->profile->nama_lengkap }}</a>
                    </span>
                    <span class="description">Shared publicly - {{ $pertanyaan->created_at }}</span>
                  </div>
                  <!-- /.user-block -->
                  <h4>{{ $pertanyaan->judul }}</h4>
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
            </div>
            {{-- /col --}}
          </div>
          {{-- /row --}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>
  <!-- /.content-wrapper -->
@endsection
