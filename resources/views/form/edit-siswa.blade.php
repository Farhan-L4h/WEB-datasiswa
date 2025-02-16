@extends('badan')

@section('create-siswa')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Siswa</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="post">

                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md col-lg">

                                <div class="form-group">
                                    <label for="nisn" class="col-md-4 col-form-label">NISN Siswa</label>
                                    <div class="col-md-12 p-0">
                                        <input type="text" name="nisn"
                                            class="form-control input-full @error('nisn') is-invalid @enderror"
                                            id="nisn" placeholder="Enter NISN"
                                            value="{{ old('nisn', $siswa->nisn) }}" />
                                        @error('nisn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama" class="col-md-4 col-form-label">Nama Siswa </label>
                                    <div class="col-md-12 p-0">
                                        <input type="text" name="nama"
                                            class="form-control input-full @error('nama') is-invalid @enderror"
                                            id="nama" placeholder="Enter Nama"
                                            value="{{ old('nama', $siswa->nama) }}" />
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kelas" class="col-md-4 col-form-label">Kelas Siswa</label>
                                    <div class="col-md-12 p-0">
                                        <input type="text" name="kelas"
                                            class="form-control input-full @error('kelas') is-invalid @enderror"
                                            id="kelas" placeholder="Enter Kelas"
                                            value="{{ old('kelas', $siswa->kelas) }}" />
                                        @error('kelas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin" class="col-md-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-12 p-0">
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" value="Laki-Laki" id="male"
                                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="male">
                                                    Laki-Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                    type="radio" name="jenis_kelamin" value="Perempuan" id="female"
                                                    {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }} />
                                                <label class="form-check-label" for="female">
                                                    Perempuan
                                                </label>
                                            </div>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="5">{{ old('alamat', $siswa->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-lg-8 d-flex">

                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-select @error('id_kota') is-invalid @enderror" name="id_kota"
                                            id="formGroupDefaultSelect">
                                            <option value="">Pilih Kota</option>
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}"
                                                    {{ old('id_kota', $siswa->id_kota) == $kota->id ? 'selected' : '' }}>
                                                    {{ $kota->nama_kota }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kota')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir"
                                            class="form-control input-full @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" />
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-danger">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
