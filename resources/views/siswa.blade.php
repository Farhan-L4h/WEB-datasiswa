@extends('badan')
@section('siswa')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Tabel Siswa</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Siswa</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Add Row</h4>
                        <a href="/siswa/create" class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>


                <div class="card-body">

                    <!-- resources/views/siswa.blade.php -->

                    <!-- Search Bar -->
                    <div class="d-flex justify-content-between mb-3">
                        <div class="col-md-3">
                            <form action="{{ route('siswa.search') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control"
                                        placeholder="Type to search..." value="{{ request('keyword') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>TGL Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($siswas) > 0)
                                    @foreach ($siswas as $s)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->nisn }}</td>
                                            <td>{{ $s->nama }}</td>
                                            <td>{{ $s->kelas }}</td>
                                            <td>{{ $s->tanggal_lahir }}</td>
                                            <td>{{ $s->jenis_kelamin }}</td>
                                            <td>{{ $s->alamat }}</td>
                                            <td>{{ $s->kota->nama_kota }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/siswa/edit/{{ $s->id }}" type="button"
                                                        data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="/siswa/delete/{{ $s->id }}" type="button"
                                                        data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">Data Belum Tersedia</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- pagination --}}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @if ($siswas->links()->paginator->hasPages())
                                @if ($siswas->links()->paginator->onFirstPage())
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $siswas->links()->paginator->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @foreach ($siswas->links()->paginator->getUrlRange(1, $siswas->links()->paginator->lastPage()) as $page => $url)
                                    @if ($page == $siswas->links()->paginator->currentPage())
                                        <li class="page-item active">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($siswas->links()->paginator->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $siswas->links()->paginator->nextPageUrl() }}"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
