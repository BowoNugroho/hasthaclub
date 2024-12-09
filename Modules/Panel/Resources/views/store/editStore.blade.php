
<div class="modal" id="editStore" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Store</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editStoreForm">
          @csrf
          <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nama Toko</label>
                    <input type="text" id="edit_store_name" name="store_name" class="form-control"  placeholder="nama toko" />
                    <input type="hidden" id="edit_store_id" name="store_id" class="form-control"  placeholder="nama toko" />
                    <span class="error text-danger" id="edit_store_name_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Jam Operasional</label>
                    <input type="text" id="edit_jam_operasional" name="jam_operasional" class="form-control"  placeholder="jam_operasional" />
                    <span class="error text-danger" id="edit_jam_operasional_error"></span>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Nomer Hp Toko</label>
                  <input type="text" id="edit_no_hp" name="no_hp" class="form-control"  placeholder="no handphone" onkeyup="checkHp()" />
                  <span class="error text-danger" id="edit_no_hp_error"></span>
                  <span class="error text-success" id="edit_no_hp_success"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Email Toko</label>
                    <input type="text" id="edit_email" name="email" class="form-control"  placeholder="email" onkeyup="checkEmail()"/>
                    <span class="error text-danger" id="edit_email_error"></span>
                    <span class="error text-success" id="edit_email_success"></span>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" id="edit_kota" name="kota" class="form-control"  placeholder="kota" />
                    <span class="error text-danger" id="edit_kota_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Provinsi</label>
                    <input type="text" id="edit_provinsi" name="provinsi" class="form-control"  placeholder="provinsi" />
                    <span class="error text-danger" id="edit_provinsi_error"></span>
                  </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control"  id="edit_alamat" name="alamat" rows="3"  placeholder="alamat"></textarea>
                <span class="error text-danger" id="edit_alamat_error"></span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                      <label class="form-label">Pemilik Toko</label>
                        <select class="form-select" id="edit_mitra_id" name="mitra_id">
                            <option value="">- Pilih - </option>
                            @foreach ($mitras as $mitra)
                            <option value="{{ $mitra->id }}">{{ $mitra->name }}</option>
                            @endforeach 
                        </select>
                      <span class="error text-danger" id="edit_mitra_id_error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                      <label class="form-label">Staff Akuisisi</label>
                        <select class="form-select" id="edit_sales_mitra_id" name="sales_mitra_id">
                            <option value="">- Pilih - </option>
                            @foreach ($akuisisis as $akuisisi)
                            <option value="{{ $akuisisi->id }}">{{ $akuisisi->name }}</option>
                            @endforeach 
                        </select>
                      <span class="error text-danger" id="edit_sales_mitra_id_error"></span>
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