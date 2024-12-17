@section('script')
  <script>

      $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        new Choices('#product_variant_id', {placeholder: true,searchEnabled: true});
        new Choices('#status', {placeholder: true,searchEnabled: true});
        const choicesProductVariantId = new Choices('#edit_product_variant_id', {placeholder: true,searchEnabled: true});
        const choicesStatus = new Choices('#edit_status', {placeholder: true,searchEnabled: true});

        let tableProductCheckout =  $('#productCheckout_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.productCheckout.datatables') }}',
                data: function (d) {
                }
            },
            columns: [
                { data: 'id' },
                { data: 'product_name' },
                { data: 'capacity_name' },
                { data: 'color_name' },
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
                        return `<button class="btn btn-primary btn-sm btn-editProductCheckout" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteProductCheckout" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#producCheckoutForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#product_variant_id_error').text('');
            $('#status_error').text('');
            $(this).find("#spinnerText").text("Loading...");
            $('#spinnerTextIcon').hide();
            $('#spinnerCheckout').show();

            let isValid = true;

            if ($('#product_variant_id').val() === '') {
                $('#product_variant_id_error').text('Produk wajib diisi.');
                isValid = false;
                $('#spinnerText').show();
                $('#spinnerTextIcon').show();
                $('#spinnerCheckout').hide();
            }
            if ($('#status').val() === '') {
                $('#status_error').text('Deskripsi wajib diisi.');
                isValid = false;
                $('#spinnerText').show();
                $('#spinnerTextIcon').show();
                $('#spinnerCheckout').hide();
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.productCheckout.saveProductCheckout") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    console.log(response);
                      if (response.success) {
                        $('#tambahProductCheckout').modal('hide');
                        $('#producCheckoutForm')[0].reset();
                        $('#spinnerText').show();
                        $('#spinnerTextIcon').show();
                        $('#spinnerCheckout').hide();
                        Swal.fire({
                              title: 'Berhasil menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableProductCheckout.ajax.reload();
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

        $('#productCheckout_datatables').on('click', '.btn-editProductCheckout', function () {
            var productBestId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.productCheckout.editProductCheckout') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: productBestId },
                success: function (data) {
                  console.log(data.status);
                  let statusValue = data.status == 1 ? "1" : "0";
                  choicesProductVariantId.setChoiceByValue(data.product_variant_id);
                  choicesStatus.setChoiceByValue(statusValue);
                  $('#product_checkout_id').val(data.id);

                    $('#editProductCheckout').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });

        $('#editProductCheckoutForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_product_variant_id_error').text('');
            $('#edit_status_error').text('');

            $(this).find("#editspinnerText").text("Loading...");
            $('#editspinnerTextIcon').hide();
            $('#editspinnerCheckout').show();

            let isValid = true;
            if ($('#edit_product_variant_id').val() === '') {
                $('#edit_product_variant_id_error').text('Produk wajib diisi.');
                isValid = false;
                $('#editspinnerText').show();
                $('#editspinnerTextIcon').show();
                $('#editspinnerCheckout').hide();
            }
            if ($('#edit_status').val() === '') {
                $('#edit_status_error').text('Status wajib diisi.');
                isValid = false;
                $('#editspinnerText').show();
                $('#editspinnerTextIcon').show();
                $('#editspinnerCheckout').hide();
            }
            
            if (isValid) {
              var formData = new FormData($('#editProductCheckoutForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.productCheckout.updateProductCheckout") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editProductCheckout').modal('hide');
                        $('#editProductCheckoutForm')[0].reset();
                        $('#editspinnerText').show();
                        $('#editspinnerTextIcon').show();
                        $('#editspinnerCheckout').hide();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableProductCheckout.ajax.reload();
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

        $('#productCheckout_datatables').on('click', '.btn-deleteProductCheckout', function () {
              let userId = $(this).data('id');
              let deleteUrl = '{{ route("panel.productCheckout.deleteProductCheckout", ":id") }}'.replace(':id', userId);

              Swal.fire({
                  title: 'Apa product mau dihapus?',
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
                                        tableProductCheckout.ajax.reload();
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