<div class="modal" id="editCapacity" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editCapacityForm">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" id="edit_capacity_name" name="capacity_name" placeholder="Nama" />
                <input type="hidden" class="form-control" id="edit_capacity_id" name="capacity_id" placeholder="Nama" />
                <span class="error text-danger" id="edit_capacity_name_error"></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control"  id="edit_deskripsi" name="deskripsi" rows="3"  placeholder="deskripsi"></textarea>
                <span class="error text-danger" id="edit_deskripsi_error"></span>
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
