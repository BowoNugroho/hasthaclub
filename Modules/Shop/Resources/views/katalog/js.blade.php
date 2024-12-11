<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
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
</script>