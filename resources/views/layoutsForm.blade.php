@extends('layouts.formMahasiswa')
@section('content')
    <div class="container-fluid mt-4 rounded background-color-$green-200">
        <form action="/mahasiswa/saveMahasiswa" method="POST" class="pt-2 pb-2">
            @csrf
            <div class="form-group w-25">
                <label><b>NIM</b></label>
                <input type="number" name="nim" class="form-control" placeholder="Masukkan NIM" require>
            </div>

            <div class="form-group w-25">
                <label><b>Nama</b></label>
                <input type="number" name="nim" class="form-control" placeholder="Masukkan Nama" require>
            </div>

            <label><b>Gender</b></label>
            <div class="form-check w-25">
                <input type="radio" name="gender" value="Pria" class="form-check-input">Pria
            </div>
            <div class="form-check w-25">
                <input type="radio" name="gender" value="Wanita" class="form-check-input">Wanita
            </div><br>

            <div class="form-group w-25">
                <label><b>Jurusan</b></label>
                <select name="jurusan" class="form-control">
                    <option value="0">--Silahkan Pilih Jurusan--</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Teologi">Teologi</option>
                    <option value="Arsitektur dan Desain">Arsitektur dan Desain</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Kedokteran">Kedokteran</option>
                    <option value="Bioteknologi">Bioteknologi</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                </select>
            </div>

            <label><b>Bidang Minat</b></label>
            <div class="form-check w-25">
                <input type="checkbox" name="minat[]" value="Teologi" class="form-check-input">Teologi<br>
                <input type="checkbox" name="minat[]" value="Sistem Informasi" class="form-check-input">Sistem Informasi<br>
                <input type="checkbox" name="minat[]" value="Teknik Informatika" class="form-check-input">Teknik Informatika<br>
                <input type="checkbox" name="minat[]" value="Arsitektur" class="form-check-input">Arsitektur<br>
                <input type="checkbox" name="minat[]" value="Desain produk" class="form-check-input">Desain produk<br>
                <input type="checkbox" name="minat[]" value="Manajemen" class="form-check-input">Manajemen<br>
                <input type="checkbox" name="minat[]" value="Akuntansi" class="form-check-input">Akuntansi<br>
                <input type="checkbox" name="minat[]" value="Bioteknologi" class="form-check-input">Bioteknologi<br>
                <input type="checkbox" name="minat[]" value="Kedokteran" class="form-check-input">Kedokteran<br>
                <input type="checkbox" name="minat[]" value="Bahasa Inggris" class="form-check-input">Bahasa Inggris
                </div>

            <div class="form-group pt-4">
                <input type="submit" value="Submit" class="btn btn-outline-success">
                <a type="button" href="/mahasiswa" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection