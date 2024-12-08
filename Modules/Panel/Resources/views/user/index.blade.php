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
          <div class="row">
            <div class="col-md-1">
              <h1>Data User</h1>
            </div>
            <div class="col-md-11">
              <button  type="button" class="btn btn-primary btn-md m-2 float-end" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah</button>
            </div>
          </div>
          <table id="user_datatables" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Created At</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Data will be loaded here via AJAX -->
              </tbody>
          </table>
      </div>
    </div>
  </div>

  {{-- modal tambah--}}

  <div class="modal" id="tambahUser" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah user</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="userForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama" />
              <span class="error text-danger" id="name_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="username" />
              <span class="error text-danger" id="username_error"></span>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Nomer Hp</label>
                  <input type="text" id="no_hp" name="no_hp" class="form-control"  placeholder="no handphone" />
                  <span class="error text-danger" id="no_hp_error"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" id="email" name="email" class="form-control"  placeholder="email" />
                  <span class="error text-danger" id="email_error"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- modal edit --}}

  <div class="modal" id="editUser" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit user</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="userEditForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" class="form-control" id="edit_name" name="name" placeholder="Nama" />
              <input type="hidden" class="form-control" id="edit_user_id" name="id"/>
              <span class="error text-danger" id="edit_name_error"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control" id="edit_username" name="username" placeholder="username" onkeyup="checkUsername()" />
              <span class="error text-danger" id="edit_username_error"></span>
              <span class="error text-success" id="edit_username_success"></span>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Nomer Hp</label>
                  <input type="text" id="edit_no_hp" name="no_hp" class="form-control"  placeholder="no handphone" onkeyup="checkHp()" />
                  <span class="error text-danger" id="edit_no_hp_error"></span>
                  <span class="error text-success" id="edit_no_hp_success"></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" id="edit_email" name="email" class="form-control"  placeholder="email" onkeyup="checkEmail()" />
                  <span class="error text-danger" id="edit_email_error"></span>
                  <span class="error text-success" id="edit_email_success"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
            Cancel
            </a>
            <button type="submit" class="btn btn-primary ms-auto">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 5l0 14"></path>
                <path d="M5 12l14 0"></path>
              </svg>
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@include('panel::user.js')


