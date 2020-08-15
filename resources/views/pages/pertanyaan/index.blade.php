@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="{{ url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="card card-primary shadow mx-3 mt-3">
      <div class="card-header">
        <h3 class="card-title">Data Pertanyaan</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
            <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary btn-sm mb-2">Tambah</a>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @forelse ($pertanyaan as $key => $pertanyaan)
            <tr>
                <td>{{ $key + 1 }}</td>
            <td>{{ $pertanyaan->judul }}</td>
                <td>{{ $pertanyaan->isi }}</td>
                <td class="inline">
                    {{-- <a href="/pertanyaan/{{$pertanyaan->id}}" class="btn btn-info btn-xs">Show</a>
                    <a href="/pertanyaan/{{$pertanyaan->id}}/edit" class="btn btn-default btn-xs">edit</a> --}}
                    <a href="{{ route('pertanyaan.show', $pertanyaan->id) }}" class="btn btn-info btn-xs">Show</a>
                    <a href="{{ route('pertanyaan.edit', $pertanyaan->id) }}" class="btn btn-default btn-xs">edit</a>
                    <form action="/pertanyaan/{{$pertanyaan->id}}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" class="btn btn-xs btn-danger">
                    </form>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="4">Empty Data</td>
            </tr>
          @endforelse
          </tbody>
          <tfoot>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection

@push('script')
    <script src="{{ url('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
    });
    </script>
@endpush
