<div class="section">
    <div class="section-title">List</div>
    <div class="item-container">
        <table class="table">
            <thead>
                <tr>
                    <td>NAMA</td>
                    <td>TIPE</td>
                    <td data-col="action">ACTION</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="section section-insert">
    <div class="section-title">Tambah Satuan</div>
    <div class="form-tambah-satuan">
        <div class="form-item">
            <div class="form-label">Nama Satuan <span class="error error-nama-satuan"></span></div>
            <input type="text" name="satuan_nama" class="form-input input-nama-satuan" maxlength="10" />
        </div>
        <div class="form-item">
            <div class="form-label">Tipe Satuan</div>
            <div class="select select-satuan-type" data-value="1">
                <input type="hidden" class="select-input input-tipe-satuan" name="satuan_type" value="1" />
                <div class="select-text">Dimensi</div>
                <span class="dropdown-icon" style="background-image: url(<?php echo base_url("assets/icons/down.png"); ?>);"></span>
                <div class="dropdown-container dropdown-container-satuan-type">
                    <div class="dropdown-item" data-value="1">Dimensi</div>
                    <div class="dropdown-item" data-value="2">Berat</div>
                    <div class="dropdown-item" data-value="3">Qty</div>
                </div>
            </div>
        </div>
        <div class="btn btn-tambah-satuan">Tambah Satuan</div>
    </div>
</div>
<script>
var get_data_url = "<?php echo base_url("admin/satuan_get"); ?>";
var tambah_satuan_url = "<?php echo base_url("admin/satuan_insert"); ?>";
var edit_satuan_url = "<?php echo base_url("admin/master_satuan_edit/"); ?>";
var hapus_satuan_url = "<?php echo base_url("admin/satuan_delete"); ?>";
</script>