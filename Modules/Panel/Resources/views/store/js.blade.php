@section('script')
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

        let tableStore = $('#store_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.store.datatables') }}',
                data: function (d) {
                    // Additional parameters can be added here if needed
                }
            },
            columns: [
                { data: 'id' },
                { data: 'store_name' },
                { data: 'kota' },
                { data: 'email' },
                { data: 'no_hp' },
                { data: 'mitra_name' },
                { data: 'sales_mitra_name' },
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
                        return `<button class="btn btn-primary btn-sm btn-editStore" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteStore" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#store_datatables').on('click', '.btn-editStore', function () {
            var storeId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.store.editStore') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: storeId },
                success: function (data) {
                  console.log(data);
                  $('#edit_store_id').val(data.id);
                  $('#edit_store_name').val(data.store_name);
                  $('#edit_jam_operasional').val(data.jam_operasional);
                  $('#edit_no_hp').val(data.no_hp);
                  $('#edit_email').val(data.email);
                  $('#edit_kota').val(data.kota);
                  $('#edit_provinsi').val(data.provinsi);
                  $('#edit_alamat').val(data.alamat);
                  $('#edit_mitra_id').val(data.mitra_id).trigger('change');
                  $('#edit_sales_mitra_id').val(data.sales_mitra_id).trigger('change');

                    $('#editStore').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });

        $('#storeForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#store_name_error').text('');
            $('#jam_operasional_error').text('');
            $('#no_hp_error').text('');
            $('#email_error').text('');
            $('#kota_error').text('');
            $('#provinsi_error').text('');
            $('#alamat_error').text('');
            $('#mitra_id_error').text('');
            $('#sales_mitra_id_error').text('');

            let isValid = true;

            if ($('#store_name').val() === '') {
                $('#store_name_error').text('Nama Toko wajib diisi.');
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
            if ($('#jam_operasional').val() === '') {
                $('#jam_operasional_error').text('Jam operasional wajib diisi.');
                isValid = false;
            }
            if ($('#kota').val() === '') {
                $('#kota_error').text('Kota wajib diisi.');
                isValid = false;
            }
            if ($('#provinsi').val() === '') {
                $('#provinsi_error').text('Provinsi wajib diisi.');
                isValid = false;
            }
            if ($('#alamat').val() === '') {
                $('#alamat_error').text('Alamat wajib diisi.');
                isValid = false;
            }
            if ($('#sales_mitra_id').val() === '') {
                $('#sales_mitra_id_error').text('Staff akuisisi wajib diisi.');
                isValid = false;
            }
            if ($('#mitra_id').val() === '') {
                $('#mitra_id_error').text('Pemilik wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.store.saveStore") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#tambahStore').modal('hide');
                        $('#storeForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              tableStore.ajax.reload();
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

          $('#editStoreForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_store_name_error').text('');
            $('#edit_jam_operasional_error').text('');
            $('#edit_no_hp_error').text('');
            $('#edit_email_error').text('');
            $('#edit_kota_error').text('');
            $('#edit_provinsi_error').text('');
            $('#edit_alamat_error').text('');
            $('#edit_mitra_id_error').text('');
            $('#edit_sales_mitra_id_error').text('');

            let isValid = true;

            if ($('#edit_store_name').val() === '') {
                $('#edit_store_name_error').text('Nama Toko wajib diisi.');
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
            if ($('#edit_jam_operasional').val() === '') {
                $('#edit_jam_operasional_error').text('Jam operasional wajib diisi.');
                isValid = false;
            }
            if ($('#edit_kota').val() === '') {
                $('#edit_kota_error').text('Kota wajib diisi.');
                isValid = false;
            }
            if ($('#edit_provinsi').val() === '') {
                $('#edit_provinsi_error').text('Provinsi wajib diisi.');
                isValid = false;
            }
            if ($('#edit_alamat').val() === '') {
                $('#edit_alamat_error').text('Alamat wajib diisi.');
                isValid = false;
            }
            if ($('#edit_sales_mitra_id').val() === '') {
                $('#edit_sales_mitra_id_error').text('Staff akuisisi wajib diisi.');
                isValid = false;
            }
            if ($('#edit_mitra_id').val() === '') {
                $('#edit_mitra_id_error').text('Pemilik wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData($('#editStoreForm')[0]);
              $.ajax({
                  url: '{{ route("panel.store.updateStore") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editStore').modal('hide');
                        $('#editStoreForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                              tableStore.ajax.reload();
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
          $('#store_datatables').on('click', '.btn-deleteStore', function () {
              let userId = $(this).data('id');
              let deleteUrl = '{{ route("panel.store.deleteStore", ":id") }}'.replace(':id', userId);

              Swal.fire({
                  title: 'Apa toko mau dihapus?',
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
                                        tableStore.ajax.reload();
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

    function checkHp()
    {
        let storeId = $('#edit_store_id').val();
        let no_hp = $('#edit_no_hp').val();

        $.ajax({
                url: '{{ route('panel.store.checkHp') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: storeId, no_hp : no_hp},
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
        let storeId = $('#edit_store_id').val();
        let email = $('#edit_email').val();

        $.ajax({
                url: '{{ route('panel.store.checkEmail') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: storeId, email : email},
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