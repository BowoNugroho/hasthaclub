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
                        return `<button class="btn btn-primary btn-sm btn-editCategory" data-id="${row.id}">Edit</button>`;
                    },
                    orderable: false, // Disable sorting for the Edit button column
                    searchable: false // Disable searching for the Edit button column
                }
            ]
        });

    });
</script>
@endsection