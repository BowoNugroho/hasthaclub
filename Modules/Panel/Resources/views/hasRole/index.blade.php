@extends('panel::layouts.master')

@section('title')
    Konfigurasi - Data Model Has Role
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
          <div class="col-md-2">
            <h1>Data Model Has Role</h1>
          </div>
          <div class="col-md-10">
            <button  type="button" class="btn btn-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#tambahHasRole">Tambah</button>
          </div>
        </div>
          <table id="hasRole_datatables" class="display">
              <thead>
                  <tr>
                      <th>Role Id</th>
                      <th>Role Name</th>
                      <th>Model Type</th>
                      <th>Model Id</th>
                      <th>User</th>
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
@include('panel::hasRole.tambahHasRole')
@include('panel::hasRole.editHasRole')
@endsection

@include('panel::hasRole.js')


