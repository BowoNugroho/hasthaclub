@section('script')
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let tableCategory =  $('#category_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.category.datatables') }}',
                data: function (d) {
                }
            },
            columns: [
                { data: 'id' },
                { data: 'category_name' },
                { data: 'deskripsi' },
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
                        return `<button class="btn btn-primary btn-sm btn-editCategory" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteCategory" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#categoryForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#category_name_error').text('');
            $('#deskripsi_error').text('');

            let isValid = true;

            if ($('#category_name').val() === '') {
                $('#category_name_error').text('Nama Kategori wajib diisi.');
                isValid = false;
            }
            if ($('#deskripsi').val() === '') {
                $('#deskripsi_error').text('Deskripsi wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.category.saveCategory") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    console.log(response);
                      if (response.success) {
                        $('#tambahCategory').modal('hide');
                        $('#categoryForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableCategory.ajax.reload();
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

        $('#category_datatables').on('click', '.btn-editCategory', function () {
            var categoryId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.category.editCategory') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: categoryId },
                success: function (data) {
                  console.log(data);
                  $('#edit_category_name').val(data.category_name);
                  $('#edit_deskripsi').val(data.deskripsi);
                  $('#edit_category_id').val(data.id);

                    $('#editCategory').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });

        $('#editCategoryForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_category_name_error').text('');
            $('#edit_deskripsi_error').text('');


            let isValid = true;
            if ($('#edit_category_name').val() === '') {
                $('#edit_category_name_error').text('Nama Kategori wajib diisi.');
                isValid = false;
            }
            if ($('#edit_deskripsi').val() === '') {
                $('#edit_deskripsi_error').text('Deskripsi wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData($('#editCategoryForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.category.updateCategory") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editCategory').modal('hide');
                        $('#editCategoryForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableCategory.ajax.reload();
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

        $('#category_datatables').on('click', '.btn-deleteCategory', function () {
              let userId = $(this).data('id');
              let deleteUrl = '{{ route("panel.category.deleteCategory", ":id") }}'.replace(':id', userId);

              Swal.fire({
                  title: 'Apa category mau dihapus?',
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
                                        tableCategory.ajax.reload();
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