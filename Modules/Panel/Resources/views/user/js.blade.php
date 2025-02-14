@section('script')
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        let tableUser = $('#user_datatables').DataTable({
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
                { data: 'username' },
                { data: 'email' },
                { data: 'no_hp' },
                { data: 'created_at', 
                  render: function(data, type, row) {
                      if (data) {
                          return moment(data).format('DD-MM-YYYY HH:mm:ss'); 
                      }
                      return data;
                  } 
                },
                {
                    data: null, // We don't have specific data here
                    render: function (data, type, row) {
                        return `<button class="btn btn-primary btn-sm btn-editUser" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteUser" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#user_datatables').on('click', '.btn-editUser', function () {
            var userId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.user.editUser') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: userId },
                success: function (data) {
                  console.log(data);
                  $('#edit_user_id').val(data.id);
                  $('#edit_name').val(data.name);
                  $('#edit_username').val(data.username);
                  $('#edit_no_hp').val(data.no_hp);
                  $('#edit_email').val(data.email);

                    $('#editUser').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
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
                              tableUser.ajax.reload();
                              // location.reload();
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

          $('#userEditForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_name_error').text('');
            $('#edit_username_error').text('');
            $('#edit_no_hp_error').text('');
            $('#edit_email_error').text('');
            

            let userId = $('#edit_user_id').val();

            let isValid = true;

            if ($('#edit_name').val() === '') {
                $('#edit_name_error').text('Nama wajib diisi.');
                isValid = false;
            }
            if ($('#edit_username').val() === '') {
                $('#edit_username_error').text('Username wajib diisi.');
                isValid = false;
            }
            if ($('#edit_no_hp').val() === '') {
                $('#edit_no_hp_error').text('No handphone wajib diisi.');
                isValid = false;
            }
            if ($('#edit_email').val() === '') {
                $('#edit_email_error').text('Email wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData($('#userEditForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.user.updateUser") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editUser').modal('hide');
                        $('#userEditForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              tableUser.ajax.reload();
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
          $('#user_datatables').on('click', '.btn-deleteUser', function () {
              let userId = $(this).data('id');
              let deleteUrl = '{{ route("panel.user.deleteUser", ":id") }}'.replace(':id', userId);

              Swal.fire({
                  title: 'Apa user mau dihapus?',
                  // text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Hapus',
                  cancelButtonText: 'Kembali',
                  reverseButtons: true  
                }).then((result) => {
                    if (result.isConfirmed) {
                      $.ajax({
                            url: deleteUrl,
                            method: 'DELETE', 
                            success: function (response) {
                              if (response.success) {
                                  Swal.fire({
                                        title: 'Berhasil hapus data',
                                        icon: 'success',
                                        showCancelButton: false,
                                      }).then((result) => {
                                        tableUser.ajax.reload();
                                      })
                                  
                                }
                            },
                            error: function (xhr, status, error) {
                              var errors = xhr.responseJSON.errors;
                                if (errors) {
                                    $.each(errors, function (key, value) {
                                      Swal.fire({
                                        title: 'Terjadi kesalahan saat hapus data!',
                                        icon: 'error',
                                        showCancelButton: false,
                                      }).then((result) => {
                                        
                                      })
                                    });
                                }
                            }
                          });
                    } else {
                      Swal.fire(
                        "Batal!",
                        "batal hapus data.",
                        "error"
                      )
                    }
                })
            });
    });

    function checkUsername()
    {
        let userId = $('#edit_user_id').val();
        let username = $('#edit_username').val();

        $.ajax({
                url: '{{ route('panel.user.checkUsername') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: userId, username : username},
                success: function (data) {
                  console.log(data);
                  if( data.status == 1){
                      $('#edit_username_success').text('');
                      $('#edit_username_error').text(data.pesan);
                    }
                 if( data.status == 0){
                        $('#edit_username_error').text('');
                        $('#edit_username_success').text(data.pesan);
                  }
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
    }
    function checkHp()
    {
        let userId = $('#edit_user_id').val();
        let no_hp = $('#edit_no_hp').val();

        $.ajax({
                url: '{{ route('panel.user.checkHp') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: userId, no_hp : no_hp},
                success: function (data) {
                  console.log(data);
                  if( data.status == 1){
                      $('#edit_no_hp_success').text('');
                      $('#edit_no_hp_error').text(data.pesan);
                    }
                 if( data.status == 0){
                        $('#edit_no_hp_error').text('');
                        $('#edit_no_hp_success').text(data.pesan);
                  }
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
    }

    function checkEmail()
    {
        let userId = $('#edit_user_id').val();
        let email = $('#edit_email').val();

        $.ajax({
                url: '{{ route('panel.user.checkEmail') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: userId, email : email},
                success: function (data) {
                  console.log(data);
                  if( data.status == 1){
                      $('#edit_email_success').text('');
                      $('#edit_email_error').text(data.pesan);
                    }
                 if( data.status == 0){
                        $('#edit_email_error').text('');
                        $('#edit_email_success').text(data.pesan);
                  }
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
    }

  </script>
@endsection