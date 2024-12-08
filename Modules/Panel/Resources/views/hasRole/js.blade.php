@section('script')
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let tableHasRole =  $('#hasRole_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.hasRole.datatables') }}',
                data: function (d) {
                }
            },
            columns: [
                { data: 'role_id' },
                { data: 'role_name' },
                { data: 'model_type' },
                { data: 'model_id' },
                { data: 'user_name' },
                {
                    data: null, // We don't have specific data here
                    render: function (data, type, row) {
                        return `<button class="btn btn-primary btn-sm btn-editHasRole" data-id="${row.model_id}">Edit</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#hasRoleForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#role_id_error').text('');
            $('#user_id_error').text('');

            let isValid = true;

            if ($('#role_id').val() === '') {
                $('#role_id_error').text('Role wajib diisi.');
                isValid = false;
            }
            if ($('#user_id').val() === '') {
                $('#user_id_error').text('user wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.hasRole.saveHasRole") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    console.log(response);
                      if (response.success) {
                        $('#tambahHasRole').modal('hide');
                        $('#hasRoleForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableHasRole.ajax.reload();
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

        $('#hasRole_datatables').on('click', '.btn-editHasRole', function () {
            var modelId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.hasRole.editHasRole') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: modelId },
                success: function (data) {
                  console.log(data[0].role_id);
                    $("#edit_role_id").val(data[0].role_id).trigger('change');
                    $("#edit_user_id").val(data[0].model_id).trigger('change');

                    $('#editHasRole').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });

        $('#hasRoleEditForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_user_id_error').text('');
            $('#edit_role_id_error').text('');

            let isValid = true;
            if ($('#edit_role_id').val() === '') {
                $('#edit_role_id_error').text('user wajib diisi.');
                isValid = false;
            }
            if ($('#edit_user_id').val() === '') {
                $('#edit_user_id_error').text('Role wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData($('#hasRoleEditForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.hasRole.updateHasRole") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editHasRole').modal('hide');
                        $('#hasRoleEditForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              tableHasRole.ajax.reload();
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

    });
</script>
@endsection