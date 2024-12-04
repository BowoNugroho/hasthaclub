@extends('panel::layouts.master')

@section('title')
    Konfifgurasi - Data User
@endsection

@section('content')
<div class="col-12">
    <div class="card card-md">
      <div class="card-stamp card-stamp-lg">
        <div class="card-stamp-icon bg-primary">
          <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" /><path d="M10 10l.01 0" /><path d="M14 10l.01 0" /><path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
        </div>
      </div>
      <div class="card-body">
          <h1>Data User</h1>
          <button class="btn btn-primary mb-3" id="addUserBtn">Add User</button>
          <table id="user_datatables" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Created At</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Data will be loaded here via AJAX -->
              </tbody>
          </table>
      </div>
    </div>
  </div>

  <!-- Modal for Add/Edit User -->
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </form>
            </div>
        </div>
    </div>
  </div>

@endsection

@section('script')
  <script>
    $(document).ready(function() {
        loadUsers();

        // Open modal to add new user
        $('#addUserBtn').click(function() {
            $('#userModalLabel').text('Add User');
            $('#userForm')[0].reset();
            $('#userForm').attr('data-id', ''); // Optionally clear the ID if needed
            $('#saveBtn').text('Save');
            $('#userModal').modal('show');
        });

        // Edit Record
        $(document).on('click', '.btn-edit', function() {
            var id = $(this).data('id');
            var editUrl = '{{ route('panel.user.edit', ':id') }}'.replace(':id', id); // Replace :id with actual ID

            $.get(editUrl, function(data) {
              console.log(data);
              $('#userModalLabel').text('Edit User');
              $('#name').val(data.name);
              $('#username').val(data.username);
              $('#email').val(data.email);
              $('#no_hp').val(data.no_hp);
              // $('#userForm').data('id', data.id);
              $('#userForm').attr('data-id', data.id);
              $('#saveBtn').text('Update');
              $('#userModal').modal('show');
            });
        });

        // Delete Record
        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            var deleteUrl = '{{ route('panel.user.destroy', ':id') }}'.replace(':id', id); // Replace :id with actual ID
            if (confirm('Are you sure you want to delete this record?')) {
              $.ajax({
                url: deleteUrl,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                  loadUsers();
                }
              });
            }
        });

        // Save or Update Record (Create/Edit)
        $('#userForm').submit(function(e) {
            e.preventDefault();
            // var id = $('#userForm').data('id');
            var id = $('#userForm').attr('data-id');

            var createUrl = '{{ route('panel.user.store') }}';
            var updateUrl = '{{ route('panel.user.update', ':id') }}'.replace(':id', id); // Replace :id with actual ID

            let url = $('#saveBtn').text() === 'Save' ? createUrl : updateUrl;
            let method = $('#saveBtn').text() === 'Save' ? 'POST' : 'PUT';
            
            $.ajax({
                url: url,
                method: method,
                data: {
                    _token: '{{ csrf_token() }}',
                    name: $('#name').val(),
                    username: $('#username').val(),
                    no_hp: $('#no_hp').val(),
                    email: $('#email').val(),
                },
                success: function(response) {
                    $('#userModal').modal('hide');
                    loadUsers();
                }
            });

        });

    });

    function loadUsers() {
      $('#user_datatables').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: '{{ route('panel.user.datatables') }}',
              data: function (d) {
                  // Additional parameters can be added here if needed
              }
          },
          columns: [
              { data: 'id' },
              { data: 'name' },
              { data: 'email' },
              { data: 'no_hp' },
              { data: 'created_at' },
              {
                  data: null,
                  render: function(data, type, row) {
                    return `
                            <button class="btn btn-warning btn-edit" data-id="${row.id}">Edit</button>
                            <button class="btn btn-danger btn-delete" data-id="${row.id}">Delete</button>
                          `;
                  }
              }
          ]
      });
    }

    
  </script>
@endsection
