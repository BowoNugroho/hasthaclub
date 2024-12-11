@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.btn-deleteCart', function (e) {
            e.preventDefault();

            
            var cartItemId = $(this).data('id');
            let deleteUrl = '{{ route("cart.deleteCart", ":id") }}'.replace(':id', cartItemId);

            $(`#buttonHapusCartText${cartItemId}`).hide();
            $(`#loadingSpinnerHapusCart${cartItemId}`).show();
            
            $.ajax({
                url: deleteUrl,
                method: 'DELETE', 
                success: function (response) {
                    console.log(response);
                    $(`#cart-item-${cartItemId}`).remove();
                    $('#total-price').text(`Total Pembayaran : Rp. ${response.totalHarga}`);
                    $('#cart-count').text(response.cartCount);
                    $(`#buttonHapusCartText${cartItemId}`).show();
                    $(`#loadingSpinnerHapusCart${cartItemId}`).hide();
                },
                error: function (xhr, status, error) {
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function (key, value) {
                           
                        });
                    }
                }
            });
            

        });
    });

</script>
    
@endsection