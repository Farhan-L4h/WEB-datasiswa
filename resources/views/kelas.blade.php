@extends('app')
@section('kota')

    <div class="page-header">
        <h3 class="fw-bold mb-3">Tables</h3>
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
                <a href="#">Kota</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Table Kota</h4>
                        <a href="/kota/create" class="btn btn-primary btn-round ms-auto"    > <i class="fa fa-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>


                <div class="card-body">


                    <!-- table -->
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kota</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>

                            <tbody id="table-body">
                                @if (count($kotas) > 0)
                                    @foreach ($kotas as $kota)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kota->nama_kota}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-success">
                                                        <i class="fa fa-eye"></i>
                                                    </button>

                                                    <button type="button" data-bs-toggle="tooltip" title=""
                                                        class="btn btn-link btn-danger" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
