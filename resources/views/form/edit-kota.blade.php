@extends('badan')

@section('create-siswa')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Siswa</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kota.update', $kota->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md col-lg">

                                <div class="form-group">
                                    <label for="kota" class="col-md-4 col-form-label">Nama Kota</label>
                                    <div class="col-md-9 p-0">
                                        <input type="text" class="form-control input-full" id="kota"
                                            name="nama_kota" placeholder="Masukan Nama Kota"
                                            value="{{ old('nama_kota', $kota->nama_kota) }}" />
                                        @error('nama_kota')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
