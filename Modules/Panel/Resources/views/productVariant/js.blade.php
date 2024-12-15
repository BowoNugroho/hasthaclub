@section('script')
  <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let tableProductVariant =  $('#productVariant_datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('panel.productVariant.datatables') }}',
                data: function (d) {
                }
            },
            columns: [
                { data: 'id' },
                { data: 'product_variants_img1', render: function(data) {
                    return data ? `<img src="{{ url('storage') }}/${data}" height="50">` : 'No Image';
                  }
                },
                { data: 'product_name' },
                { data: 'color_name' },
                { data: 'capacity_name' },
                { data: 'harga', name: 'harga', 
                    render: function(data, type, row) {
                    return 'Rp. ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'); 
                }},
                { data: 'harga_diskon', name: 'harga_diskon', 
                    render: function(data, type, row) {
                    return 'Rp. ' + data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'); 
                } },
                { data: 'stock' },
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
                        return `<button class="btn btn-primary btn-sm btn-editProductVariant" data-id="${row.id}">Edit</button>
                                <button class="btn btn-danger btn-sm btn-deleteProductVariant" data-id="${row.id}">Hapus</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

        $('#productVariantForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#product_id_error').text('');
            $('#color_id_error').text('');
            $('#capacity_id_error').text('');
            $('#harga_error').text('');
            $('#harga_diskon_error').text('');
            $('#stock_error').text('');

            let isValid = true;

            if ($('#product_id').val() === '') {
                $('#product_id_error').text('Produk wajib diisi.');
                isValid = false;
            }
            if ($('#color_id').val() === '') {
                $('#color_id_error').text('Varian Warna wajib diisi.');
                isValid = false;
            }
            if ($('#capacity_id').val() === '') {
                $('#capacity_id_error').text('Varian Kapasitas wajib diisi.');
                isValid = false;
            }
            if ($('#harga').val() === '') {
                $('#harga_error').text('Harga normal wajib diisi.');
                isValid = false;
            }
            if ($('#harga_diskon').val() === '') {
                $('#harga_diskon_error').text('Harga Diskon wajib diisi.');
                isValid = false;
            }
            if ($('#stock').val() === '') {
                $('#stock_error').text('Stock wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData(this);
              $.ajax({
                  url: '{{ route("panel.productVariant.saveProductVariant") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    console.log(response);
                      if (response.success) {
                        $('#tambahProductVariant').modal('hide');
                        $('#productVariantForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableProductVariant.ajax.reload();
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
        $('#productVariant_datatables').on('click', '.btn-editProductVariant', function () {
            var productVariantId = $(this).data('id');

           $.ajax({
                url: '{{ route('panel.productVariant.editProductVariant') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { id: productVariantId },
                success: function (data) {
                    console.log(data);
                    $('#edit_product_variant_id').val(data.id);
                    $('#edit_product_id').val(data.product_id).trigger('change');
                    $('#edit_color_id').val(data.color_id).trigger('change');
                    $('#edit_capacity_id').val(data.capacity_id).trigger('change');
                    $('#edit_harga').val(data.harga);
                    $('#edit_harga_diskon').val(data.harga_diskon);
                    $('#edit_stock').val(data.stock);
                    // $('#edit_deskripsi').val(data.deskripsi);

                    $('#editProductVariant').modal('show');
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });
        });

        $('#editProductVariantForm').on('submit', function (e) {
            e.preventDefault(); 

            $('#edit_product_id_error').text('');
            $('#edit_color_id_error').text('');
            $('#edit_capacity_id_error').text('');
            $('#edit_harga_error').text('');
            $('#edit_harga_diskon_error').text('');
            $('#edit_stock_error').text('');

            let isValid = true;

            if ($('#edit_product_id').val() === '') {
                $('#edit_product_id_error').text('Produk wajib diisi.');
                isValid = false;
            }
            if ($('#edit_color_id').val() === '') {
                $('#edit_color_id_error').text('Varian Warna wajib diisi.');
                isValid = false;
            }
            if ($('#edit_capacity_id').val() === '') {
                $('#edit_capacity_id_error').text('Varian Kapasitas wajib diisi.');
                isValid = false;
            }
            if ($('#edit_harga').val() === '') {
                $('#edit_harga_error').text('Harga normal wajib diisi.');
                isValid = false;
            }
            if ($('#edit_harga_diskon').val() === '') {
                $('#edit_harga_diskon_error').text('Harga Diskon wajib diisi.');
                isValid = false;
            }
            if ($('#edit_stock').val() === '') {
                $('#edit_stock_error').text('Stock wajib diisi.');
                isValid = false;
            }
            
            if (isValid) {
              var formData = new FormData($('#editProductVariantForm')[0]);
              console.log(formData);
              $.ajax({
                  url: '{{ route("panel.productVariant.updateProductVariant") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                      if (response.success) {
                        $('#editProductVariant').modal('hide');
                        $('#editProductVariantForm')[0].reset();
                        Swal.fire({
                              title: 'Berhasil Menyimpan data',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                tableProductVariant.ajax.reload();
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

        $('#productVariant_datatables').on('click', '.btn-deleteProductVariant', function () {
              let productVariantId = $(this).data('id');
              let deleteUrl = '{{ route("panel.productVariant.deleteProductVariant", ":id") }}'.replace(':id', productVariantId);

              Swal.fire({
                  title: 'Apa product varian mau dihapus?',
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
                                        tableProductVariant.ajax.reload();
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