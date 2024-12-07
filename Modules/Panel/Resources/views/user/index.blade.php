@extends('panel::layouts.master')

@section('title')
    Konfifgurasi - Data User
@endsection

@section('content')
<div class="col-12">
    <div class="card card-md">
      <div class="card-stamp card-stamp-lg">
        <div class="card-stamp-icon bg-primary">
          <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
        </div>
      </div>
      <div class="card-body">
        <div class="d-flex ">
          <h1>Data User</h1>
          <button  type="button" class="btn btn-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah</button>
        </div>
          <table id="user_datatables" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Created At</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Data will be loaded here via AJAX -->
              </tbody>
          </table>
      </div>
    </div>
  </div>

  {{-- modal --}}

  <div class="modal" id="tambahUser" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah user</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="userForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama" />
              <span class="error text-danger" id="name_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="username" />
              <span class="error text-danger" id="username_error"></span>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Nomer Hp</label>
                  <input type="text" id="no_hp" name="no_hp" class="form-control"  placeholder="no handphone" />
                  <span class="error text-danger" id="no_hp_error"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" id="email" name="email" class="form-control"  placeholder="email" />
                  <span class="error text-danger" id="email_error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
        $('#user_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.user.datatables') }}',
                data: function (d) {
                    // Additional parameters can be added here if needed
                }
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'no_hp' },
                { data: 'created_at' }
            ]
        });

        $('#userForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#name_error').text('');
            $('#username_error').text('');
            $('#no_hp_error').text('');
            $('#email_error').text('');

            let isValid = true;

            if ($('#name').val() === '') {
                $('#name_error').text('Nama wajib diisi.');
                isValid = false;
            }
            if ($('#username').val() === '') {
                $('#username_error').text('Username wajib diisi.');
                isValid = false;
            }
            if ($('#no_hp').val() === '') {
                $('#no_hp_error').text('No handphone wajib diisi.');
                isValid = false;
            }
            if ($('#email').val() === '') {
                $('#email_error').text('Email wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.user.saveUser") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#tambahUser').modal('hide');
                        $('#userForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              location.reload();
                            })
                        
                      }
                  },
                  error: function (xhr) {
                      var errors = xhr.responseJSON.errors;
                      if (errors) {
                          $.each(errors, function (key, value) {
                            Swal.fire({
                              title: 'No hp / email sudah ready',
                              icon: 'error',
                              showCancelButton: false,
                            }).then((result) => {
                              
                            })
                          });
                      }
                  }
              });
            }
          });
    });

  </script>
@endsection
