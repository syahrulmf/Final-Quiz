@extends('layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="container-fluid">
    <!-- Default box -->
        <div class="card mt-3">

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
  </div>
  <!-- /.content-wrapper -->
@endsection
