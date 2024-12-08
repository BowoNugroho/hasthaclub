<div class="modal" id="tambahHasRole" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Has Role</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="hasRoleForm">
          @csrf
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">User</label>
                        <select class="form-select" id="user_id" name="user_id">
                            <option value="">- Pilih - </option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach 
                        </select>
                        <span class="error text-danger" id="user_id_error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                      <label class="form-label">Role</label>
                      <select class="form-select" id="role_id" name="role_id">
                          <option value="">- Pilih - </option>
                          @foreach ($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }} -| Guard {{ $role->guard_name }}</option>
                          @endforeach 
                      </select>
                      <span class="error text-danger" id="role_id_error"></span>
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
