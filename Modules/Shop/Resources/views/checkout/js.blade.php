@section('script')
<script>
     $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#formCheckout').on('submit', function (e) {
            e.preventDefault(); 

            $('#customer_name_error').text('');
            $('#customer_no_hp_error').text('');
            $('#type_pemesanan_error').text('');
            $('#store_id_error').text('');

            let isValid = true;
            if ($('#customer_name').val() === '') {
                $('#customer_name_error').text('Nama wajib diisi.');
                isValid = false;
            }
            if ($('#customer_no_hp').val() === '') {
                $('#customer_no_hp_error').text('No handphone wajib diisi.');
                isValid = false;
            }
            if ($('#type_pemesanan').val() === '') {
                $('#type_pemesanan_error').text('Type Pemesanan wajib diisi.');
                isValid = false;
            }
            if ($('#store_id').val() === '') {
                $('#store_id_error').text('Toko wajib diisi.');
                isValid = false;
            }

            if (isValid) {
                let formData = new FormData(this);
              console.log(formData);
              $.ajax({
                  url: '{{ route("checkout.payment") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    let Url = '{{ route("checkout.paymentRek", "co_id=:id") }}'.replace(':id', response.co_id );
                    window.location.href = Url;
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

    function selectData(){
        let type_data =  $('#type_data').val();
        
        if(type_data == 1){
            $.ajax({
                url: '{{ route('checkout.dataAkun') }}', 
                method: 'GET',
                success: function(response) {
                    console.log(response.data);
                    $('#customer_name').val(response.data.name);
                    $('#customer_no_hp').val(response.data.no_hp);
                    $('#customer_email').val(response.data.email);
                }
            });
        }

    }

    function typePemesanan(){
        let type_pemesanan =  $('#type_pemesanan').val();
        console.log(type_pemesanan);
        
        if(type_pemesanan == 'Pick Up'){
            console.log('masuk');
            $('#pickUp').removeClass('hidden');
        }else{
            $('#pickUp').addClass('hidden');
        }

    }
</script>  
@endsection