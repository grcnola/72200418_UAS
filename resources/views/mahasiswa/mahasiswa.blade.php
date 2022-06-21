<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
          <div class="col-lg-12 bg-warning py-4">
            <div class="dropdown float-right">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-person-circle"></i> <b>User</b>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/mahasiswa/mahasiswa"> {{Auth::user()->nama_user ?? ''}}</a>
                <a class="dropdown-item" href="/user">Data User</a>
                <a class="dropdown-item" href="/logout">Log Out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-2 vh-100 border">
            <div class="nav flex-column nav-pills" mt-4 id="v-pills-tab" role="tablist" aria-orientation="vertical bg-warning">
                <a class="nav-link text-dark" href="/mahasiswa/mahasiswa">Mahasiswa</a>
                <a class="nav-link text-dark" href="/dosen/dosen"">Dosen</a>
              </div>
          </div>
          <div class="col-lg-10 vh-100">
            <div class='card mt-4'>
              <div class="row align-items-md-stretch">
                <div class="col-md-12">
                  <div class="h-100 p-2 text-white bg-warning rounded-3">
                    <p>{{Auth::user()->nama_user ?? ''}} telah melakukan login</p>
                  </div>
                </div>
              </div>
              <div class='card-header'>
                <a name="" id="" class="btn btn-dark" href="/mahasiswa/mahasiswa/formMahasiswa" role="button"><i class="bi bi-plus-square"></i> <b>Create</b></a>
                <form class="form-inline my-2 my-lg-0 float-right" method="GET" action="/mahasiswa/search">
                  <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
              <div class='card-body'>
                @if(session('alertCreate'))
                  <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>{{session('alertCreate')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if(session('alertUpdate'))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session('alertUpdate')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if(session('alertDelete'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('alertDelete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Bidang Minat</th>
                      <th scope="col">Operasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mahasiswa as $no => $mhs)
                    <tr>
                      <th scope="row">{{$mahasiswa->firstItem() + $no}}</th>
                      <td>{{$mhs -> nim}}</td>
                      <td>{{$mhs -> nama}}</td>
                      <td>{{$mhs -> gender}}</td>
                      <td>{{$mhs -> jurusan}}</td>
                      <td>{{$mhs -> bidang_minat}}</td>
                      <td><a href="/mahasiswa/mahasiswa/updateMahasiswa/{{$mhs->id}}" class="btn btn-outline-dark"><i class="bi bi-pencil-square"></i></a>
                      <button onclick="handleDelete({{$mhs->id}})" class="btn btn-outline-danger"><i class="bi bi-x-square"></i></button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
               <span class="float-right">{{$mahasiswa->links()}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <div class="modal fade" id="deleteMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
          </div>
          <div class="modal-body">
            Apakah anda yakin ingin menghapus data?
          </div>
          <div class="modal-footer">
            <a id="deleteLink" type="button" class="btn btn-danger">Ya</a>
            <button type="button" class="btn btn-dark" data-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>
  
    <script>
      function handleDelete(id){
        var link = document.getElementById('deleteLink')
        link.href = "{{URL::to('/mahasiswa/deleteMahasiswa/ ')}}" +id
        
        $('#deleteMahasiswa').modal('show')
      }
    </script>
  </body>
</html>