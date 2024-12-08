@section('script')
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let tableRole =  $('#role_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.role.datatables') }}',
                data: function (d) {
                    // Additional parameters can be added here if needed
                }
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'guard_name' },
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
                        return `<button class="btn btn-primary btn-sm btn-editRole" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteRole" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#roleForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#name_error').text('');
            $('#guard_name_error').text('');

            let isValid = true;

            if ($('#name').val() === '') {
                $('#name_error').text('Nama wajib diisi.');
                isValid = false;
            }
            if ($('#guard_name').val() === '') {
                $('#guard_name_error').text('guard wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.role.saveRole") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    console.log(response);
                      if (response.success) {
                        $('#tambahRole').modal('hide');
                        $('#roleForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              tableRole.ajax.reload();
                              // location.reload();
                            })
                        
                      }
                  },
                  error: function (xhr) {
                      var errors = xhr.responseJSON.errors;
                      if (errors) {
                          $.each(errors, function (key, value) {
                            Swal.fire({
                              title: 'Gagal menyimpan data',
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

        $('#role_datatables').on('click', '.btn-editRole', function () {
            var roleId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.role.editRole') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: roleId },
                success: function (data) {
                  console.log(data);
                  $('#edit_name').val(data.name);
                  $('#edit_role_id').val(data.id);
                  $('#edit_guard_name').val(data.guard_name);

                    $('#editRole').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });

        $('#roleEditForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_name_error').text('');
            $('#edit_guard_name_error').text('');

            let roleId = $('#edit_role_id').val();

            let isValid = true;
            if ($('#edit_name').val() === '') {
                $('#edit_name_error').text('Nama wajib diisi.');
                isValid = false;
            }
            if ($('#edit_guard_name').val() === '') {
                $('#edit_guard_name_error').text('guard wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData($('#roleEditForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.role.updateRole") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editRole').modal('hide');
                        $('#roleEditForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              tableRole.ajax.reload();
                            })
                        
                      }
                  },
                  error: function (xhr) {
                      var errors = xhr.responseJSON.errors;
                      if (errors) {
                          $.each(errors, function (key, value) {
                            Swal.fire({
                              title: 'Gagal menyimpan data.',
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

        $('#role_datatables').on('click', '.btn-deleteRole', function () {
              let userId = $(this).data('id');
              let deleteUrl = '{{ route("panel.role.deleteRole", ":id") }}'.replace(':id', userId);

              Swal.fire({
                  title: 'Apa role mau dihapus?',
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
                                        tableRoles.ajax.reload();
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
  </script>
@endsection