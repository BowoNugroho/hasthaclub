@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

    function submitCart(button){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let userId = @json(@auth('customer')->user()->id);

        $('#buttonText').hide();
        $('#loadingSpinner').show();

        if (userId == null){
            let Url = '{{ route("customer.loginCs") }}';
            window.location.href = Url;
        }

        if(userId){

            let productVariangId  = $('#product_variant_id').val(); 
            let selectColorId = $('#select_color_id').val(); 
            let selectCapacityId = $('#select_capacity_id').val();
            let qty = $('#qty').val();
            let voucher = $('#voucher').val();
            console.log(qty);
            console.log(voucher);
            
            $('#voucher_error').text('');
            
            let isValid = true;

            if ($('#voucher').val() === '') {
                $('#voucher_error').text('voucher wajib diisi silahkan konfirmasi ke toko.');
                isValid = false;
            }
            
            //Check Voucher
            $.ajax({
                url: '{{ route('detail.katalog.cekVoucher') }}', // Your URL to fetch the user details
                method: 'GET',
                data: { voucher: voucher
                },
                success: function (data) {
                    console.log(data);
                    if(data.id != null){
                        $.ajax({
                            url: '{{ route('detail.katalog.addCart') }}', // Your URL to fetch the user details
                            method: 'POST',
                            data: { voucher: voucher,
                                product_variang_id: productVariangId,
                                qty: qty,
                                user_id: userId
                            },
                            success: function (data) {
                                console.log(data);
                                $('#buttonText').show(); 
                                $('#loadingSpinner').hide();
                                $('#voucher').val('');
                                updateCartCount();
                            },
                            error: function () {
                                alert('Failed to fetch user data.');
                            }
                        });
                    }
                    if(data.id == null){
                        Swal.fire(
                            "Warning!",
                            "Kode Voucher Salah!!",
                            "warning"
                        )
                    }
                },
                error: function () {
                    alert('Failed to fetch user data.');
                }
            });

        }

    }

    function variant(button) {
        let colorId = button.getAttribute('data-color-id');
        let capacityId = button.getAttribute('data-capacity-id'); 
        let selectColorId = $('#select_color_id') .val(); 
        let selectCapacityId = $('#select_capacity_id') .val(); 

        let productId = $('#product_id') .val(); 
        
        let fixColorId = null;
        let fixCapacityId = null;
        
        if (colorId) {
            fixColorId = colorId;
            fixCapacityId = selectCapacityId;
        }
        
        if (capacityId) {
            fixColorId = selectColorId;
            fixCapacityId = capacityId;
        }


        $.ajax({
            url: '{{ route('detail.katalog.cekProduct') }}', // Your URL to fetch the user details
            method: 'GET',
            data: { color_id: fixColorId,
                capacity_id: fixCapacityId,
                product_id: productId 
            },
            success: function (data) {
                if(data.id != null){
                    let Url = '{{ route("detail.katalog.product", ":id") }}'.replace(':id', data.id );
                    window.location.href = Url;
                }
                if(data.id == null){
                    Swal.fire(
                        "Warning!",
                        "varian kosong.",
                        "warning"
                      )
                }
            },
            error: function () {
                alert('Failed to fetch user data.');
            }
        });
    }

    function updateCartCount() {
            $.ajax({
                url: '{{ route('detail.katalog.counCart') }}', 
                method: 'GET',
                success: function(response) {
                    console.log(response)
                    $('#cart-count').text(response); 
                }
            });
        }
</script>
@endsection