@extends('shop::layouts.app')

@section('title')
    Bukti Pembayaran
@endsection

@section('cart-count')
    @if (@auth('customer')->user()->id)
        <span id="cart-count" class="cart-count bg-blue-500  text-white w-4 h-4 pl-1  text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection
@section('cart-count2')
    @if (@auth('customer')->user()->id)
        <span id="cart-count2" class="cart-count bg-blue-500  text-white w-4 h-4   text-xs rounded-full absolute ">
            {{ $cartCount ?? 0 }}
        </span>
    @endif
@endsection
@section('content')
<div class="grid xl:grid-cols-5 grid-cols-5 p-5">
    <div class="box "></div>
    <div class="box  xl:col-span-3 col-span-5  mt-5">
        <div class="grid grid-cols-1 text-center mt-7">
            <span class="text-3xl text-blue-500 font-bold">Silahkan Upload Bukti Pembayran</span>
        </div>
        <div class="grid grid-cols-1 text-center mt-7">
            <form id="formUploadBukti" class="max-w-lg mx-auto">
                @csrf
                <input type="hidden" name="co_id" id="co_id" value="{{$getInvoice->co_id}}">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-3" aria-describedby="user_avatar_help" id="bukti_pembayaran_img" name="bukti_pembayaran_img" type="file">
                <span class="error text-red-500" id="bukti_error"></span>

                <div class="mt-10">
                    <button type="submit" class="inline-block px-6 py-2.5 border-2 bg-green-500 border-green-500 text-white font-semibold text-lg leading-tight rounded-full hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"> Upload</button>
                </div>
            </form>
        </div>
    </div>
    <div class="box "></div>
</div>
@endsection
@section('script')
<script>
      $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#formUploadBukti').on('submit', function (e) {
            e.preventDefault(); 

            $('#bukti_error').text('');

            let isValid = true;
            if ($('#bukti_pembayaran_img').val() === '') {
                $('#bukti_error').text('Wajib Upload Bukti Pembayaran.');
                isValid = false;
            }

            if (isValid) {
                let formData = new FormData(this);
              console.log(formData);
              $.ajax({
                  url: '{{ route("checkout.uploadBukti") }}',
                  type: 'POST',
                  data: formData,
                  processData: false,  
                  contentType: false,  
                  success: function (response) {
                    if (response.success) {
                        Swal.fire({
                              title: 'Pembayaran segera kita cek, Tunggu 1 x 24 jam untuk nota dikirim by Whatsapp',
                              icon: 'success',
                              showCancelButton: false,
                            }).then((result) => {
                                let Url = '{{ route("riwayatCs") }}';
                                window.location.href = Url;
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

