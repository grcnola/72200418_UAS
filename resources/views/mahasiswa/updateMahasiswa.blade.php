<!doctype html>
<html lang="en">
  <head>
    <title>Document</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  </head>
  <body>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 bg-dark py-4"></div>
        </div>
        <div class="row">
          <div class="col-lg-2 vh-100 border">
            <div class="nav flex-column nav-pills" mt-4 id="v-pills-tab" role="tablist" aria-orientation="vertical bg-dark">
                <a class="nav-link active bg-dark text-light" href="/mahasiswa/mahasiswa">Mahasiswa</a>
                <a class="nav-link text-dark" href="/dosen/dosen">Dosen</a>
              </div>
          </div>
          <div class="col-lg-10 vh-100">
            <div class='card mt-4'>
              <div class='card-body'>
                  <div class="container-fluid mt-4 rounded background-color-$green-200">
                    <form action="/mahasiswa/updateMahasiswa/{{$mahasiswa->id}}" method="POST" class="pt-2 pb-2">
                        @csrf
                        @method('PUT')
                        <div class="form-group w-25">
                            <label><b>NIM</b></label>
                            <input type="number" name="nim" class="form-control" value="{{$mahasiswa->nim}}" readonly>
                        </div>

                        <div class="form-group w-25">
                            <label><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control" value="{{$mahasiswa->nama}}" require>
                        </div>

                        <label><b>Gender</b></label>
                        <div class="form-check w-25">
                            <input type="radio" name="gender" value="Pria" {{$mahasiswa->gender == 'Pria' ? 'checked':''}} class="form-check-input">Pria
                        </div>
                        <div class="form-check w-25">
                            <input type="radio" name="gender" value="Wanita" {{$mahasiswa->gender == 'Wanita' ? 'checked':''}} class="form-check-input">Wanita
                        </div><br>

                        <div class="form-group w-25">
                            <label><b>Jurusan</b></label>
                            <select name="jurusan" class="form-control">
                                <option value="0">--Silahkan Pilih Jurusan--</option>
                                <option value="Teknologi Informasi" {{$mahasiswa->jurusan == 'Teknologi Informasi' ? 'selected':''}}>Teknologi Informasi</option>
                                <option value="Teologi" {{$mahasiswa->jurusan == 'Teologi' ? 'selected':''}}>Teologi</option>
                                <option value="Arsitektur dan Desain" {{$mahasiswa->jurusan == 'Arsitektur dan Desain' ? 'selected':''}}>Arsitektur dan Desain</option>
                                <option value="Bisnis" {{$mahasiswa->jurusan == 'Bisnis' ? 'selected':''}}>Bisnis</option>
                                <option value="Kedokteran" {{$mahasiswa->jurusan == 'Kedokteran' ? 'selected':''}}>Kedokteran</option>
                                <option value="Bioteknologi" {{$mahasiswa->jurusan == 'Bioteknologi' ? 'selected':''}}>Bioteknologi</option>
                                <option value="Bahasa Inggris" {{$mahasiswa->jurusan == 'Bahasa Inggris' ? 'selected':''}}>Bahasa Inggris</option>
                            </select>
                        </div>
                        
                        @php
                            $minat = explode(', ',$mahasiswa->bidang_minat);
                        @endphp
                        <label><b>Bidang Minat</b></label>
                        <div class="form-check w-25">
                            <input type="checkbox" name="minat[]" value="Teologi" {{in_array('Teologi', $minat) ? 'checked':'' }} class="form-check-input">Teologi<br>
                            <input type="checkbox" name="minat[]" value="Sistem Informasi" {{in_array('Sistem Informasi', $minat) ? 'checked':''}} class="form-check-input">Sistem Informasi<br>
                            <input type="checkbox" name="minat[]" value="Teknik Informatika" {{in_array('Teknik Informatika', $minat) ? 'checked':''}} class="form-check-input">Teknik Informatika<br>
                            <input type="checkbox" name="minat[]" value="Arsitektur" {{in_array('Arsitektur', $minat) ? 'checked':''}} class="form-check-input">Arsitektur<br>
                            <input type="checkbox" name="minat[]" value="Desain produk" {{in_array('Desain produk', $minat) ? 'checked':''}} class="form-check-input">Desain produk<br>
                            <input type="checkbox" name="minat[]" value="Manajemen" {{in_array('Manajemen', $minat) ? 'checked':''}} class="form-check-input">Manajemen<br>
                            <input type="checkbox" name="minat[]" value="Akuntansi" {{in_array('Akuntansi', $minat) ? 'checked':''}} class="form-check-input">Akuntansi<br>
                            <input type="checkbox" name="minat[]" value="Bioteknologi" {{in_array('Bioteknologi', $minat) ? 'checked':''}} class="form-check-input">Bioteknologi<br>
                            <input type="checkbox" name="minat[]" value="Kedokteran" {{in_array('Kedokteran', $minat) ? 'checked':''}} class="form-check-input">Kedokteran<br>
                            <input type="checkbox" name="minat[]" value="Bahasa Inggris" {{in_array('Bahasa Inggris', $minat) ? 'checked':''}} class="form-check-input">Bahasa Inggris
                        </div>
                        <div class="form-group pt-4">
                            <input type="submit" value="Submit" class="btn btn-outline-dark">
                            <a type="button" href="/mahasiswa/mahasiswa" class="btn btn-outline-danger">Cancel</a>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>