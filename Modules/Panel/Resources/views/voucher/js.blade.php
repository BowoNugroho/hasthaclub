@section('script')
  <script>

      $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        new Choices('#store_id', {placeholder: true,searchEnabled: true});
        new Choices('#sales_to_id', {placeholder: true,searchEnabled: true});
        const choicesStoreId = new Choices('#edit_store_id', {placeholder: true,searchEnabled: true});
        const choicesSalesId = new Choices('#edit_sales_to_id', {placeholder: true,searchEnabled: true});

        let tableVoucher =  $('#voucher_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.voucher.datatables') }}',
                data: function (d) {
                }
            },
            columns: [
                { data: 'id' },
                { data: 'voucher_name' },
                { data: 'voucher_code' },
                { data: 'potongan_harga' },
                { data: 'store_name' },
                { data: 'sales_name' },
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
                        return `<button class="btn btn-primary btn-sm btn-editVoucher" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteVoucher" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#voucherForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#store_id_error').text('');
            $('#sales_to_id_error').text('');
            $('#voucher_name_error').text('');
            $('#voucher_code_error').text('');
            $('#potongan_harga_error').text('');

            $(this).find("#spinnerText").text("Loading...");
            $('#spinnerTextIcon').hide();
            $('#spinnerVoucher').show();

            let isValid = true;

            if ($('#voucher_name').val() === '') {
                $('#voucher_name_error').text('Voucher wajib diisi.');
                isValid = false;
                $('#spinnerText').show();
                $('#spinnerTextIcon').show();
                $('#spinnerVoucher').hide();
            }
            if ($('#voucher_code').val() === '') {
                $('#voucher_code_error').text('Kode wajib diisi.');
                isValid = false;
                $('#spinnerText').show();
                $('#spinnerTextIcon').show();
                $('#spinnerVoucher').hide();
            }
            if ($('#potongan_harga').val() === '') {
                $('#potongan_harga_error').text('Potongan wajib diisi.');
                isValid = false;
                $('#spinnerText').show();
                $('#spinnerTextIcon').show();
                $('#spinnerVoucher').hide();
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.voucher.saveVoucher") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    console.log(response);
                      if (response.success) {
                        $('#tambahVoucher').modal('hide');
                        $('#voucherForm')[0].reset();
                        $('#spinnerText').show();
                        $('#spinnerTextIcon').show();
                        $('#spinnerVoucher').hide();
                        Swal.fire({
                              title: 'Berhasil menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableVoucher.ajax.reload();
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

        $('#voucher_datatables').on('click', '.btn-editVoucher', function () {
            var voucherId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.voucher.editVoucher') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: voucherId },
                success: function (data) {
                  console.log(data.status);
                  choicesStoreId.setChoiceByValue(data.store_id);
                  choicesSalesId.setChoiceByValue(data.sales_to_id);  
                  $('#voucher_id').val(data.id);
                  $('#edit_voucher_name').val(data.voucher_name);
                  $('#edit_voucher_code').val(data.voucher_code);
                  $('#edit_potongan_harga').val(data.potongan_harga);

                    $('#editVoucher').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });


        $('#editVoucherForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_store_id_error').text('');
            $('#edit_sales_to_id_error').text('');
            $('#edit_voucher_name_error').text('');
            $('#edit_voucher_code_error').text('');
            $('#edit_potongan_harga_error').text('');

            $(this).find("#editspinnerText").text("Loading...");
            $('#editspinnerTextIcon').hide();
            $('#editspinnerVoucher').show();

            let isValid = true;
            if ($('#edit_voucher_name').val() === '') {
                $('#edit_voucher_name_error').text('Voucher wajib diisi.');
                isValid = false;
                $('#editspinnerText').show();
                $('#editspinnerTextIcon').show();
                $('#editspinnerVoucher').hide();
            }
            if ($('#edit_voucher_code').val() === '') {
                $('#edit_voucher_code_error').text('Kode wajib diisi.');
                isValid = false;
                $('#editspinnerText').show();
                $('#editspinnerTextIcon').show();
                $('#editspinnerVoucher').hide();
            }
            if ($('#edit_potongan_harga').val() === '') {
                $('#edit_potongan_harga_error').text('Potongan wajib diisi.');
                isValid = false;
                $('#editspinnerText').show();
                $('#editspinnerTextIcon').show();
                $('#editspinnerVoucher').hide();
            }
            
            if (isValid) {
              var formData = new FormData($('#editVoucherForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.voucher.updateVoucher") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editVoucher').modal('hide');
                        $('#editVoucherForm')[0].reset();
                        $('#editspinnerText').show();
                        $('#editspinnerTextIcon').show();
                        $('#editspinnerVoucher').hide();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableVoucher.ajax.reload();
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

        $('#voucher_datatables').on('click', '.btn-deleteVoucher', function () {
              let voucherId = $(this).data('id');
              let deleteUrl = '{{ route("panel.voucher.deleteVoucher", ":id") }}'.replace(':id', voucherId);

              Swal.fire({
                  title: 'Apa voucher mau dihapus?',
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
                                        tableVoucher.ajax.reload();
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

    function cekKodeVoucher()
    {
        let voucherCode = null;
        if ($('#voucher_code').val()){
             voucherCode = $('#voucher_code').val();
        }
        if($('#edit_voucher_code').val()){
             voucherCode = $('#edit_voucher_code').val();
        }
        $.ajax({
                url: '{{ route('panel.voucher.checkVoucher') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { voucher_code: voucherCode},
                success: function (data) {
                  console.log(data);
                  if( data.status == 1){
                        if ($('#voucher_code').val()){
                            $('#voucher_code_success').text('');
                            $('#voucher_code_error').text(data.pesan);
                        }
                        if($('#edit_voucher_code').val()){
                            $('#edit_voucher_code_success').text('');
                            $('#edit_voucher_code_error').text(data.pesan);
                        }
                    }
                 if( data.status == 0){
                        if ($('#voucher_code').val()){
                            $('#voucher_code_error').text('');
                            $('#voucher_code_success').text(data.pesan);
                        }
                        if($('#edit_voucher_code').val()){
                            $('#edit_voucher_code_error').text('');
                            $('#edit_voucher_code_success').text(data.pesan);
                        }
                  }
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
    }
</script>
@endsection