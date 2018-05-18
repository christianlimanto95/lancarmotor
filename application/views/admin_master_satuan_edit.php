<a href="<?php echo base_url("admin/master_satuan"); ?>" class="btn btn-update btn-back">< Kembali ke Master Satuan</a>
<div class="section section-update">
    <div class="form-tambah-satuan">
        <div class="form-item">
            <div class="form-label">Nama Satuan <span class="error error-nama-satuan"></span></div>
            <input type="text" name="satuan_nama" class="form-input input-nama-satuan" maxlength="10" value="<?php echo $data->satuan_nama; ?>" />
        </div>
        <div class="form-item">
            <div class="form-label">Tipe Satuan</div>
            <div class="select select-satuan-type" data-value="<?php echo $data->satuan_type; ?>">
                <input type="hidden" class="select-input input-tipe-satuan" name="satuan_type" value="<?php echo $data->satuan_type; ?>" />
                <?php
                $satuan_type_text = "";
                switch ($data->satuan_type) {
                    case "1":
                        $satuan_type_text = "Dimensi";
                        break;
                    case "2":
                        $satuan_type_text = "Berat";
                        break;
                    case "3":
                        $satuan_type_text = "Qty";
                        break;
                }
                ?>
                <div class="select-text"><?php echo $satuan_type_text; ?></div>
                <span class="dropdown-icon" style="background-image: url(<?php echo base_url("assets/icons/down.png"); ?>);"></span>
                <div class="dropdown-container dropdown-container-satuan-type">
                    <div class="dropdown-item" data-value="1">Dimensi</div>
                    <div class="dropdown-item" data-value="2">Berat</div>
                    <div class="dropdown-item" data-value="3">Qty</div>
                </div>
            </div>
        </div>
        <div class="btn btn-simpan-perubahan">Simpan Perubahan</div>
    </div>
</div>
<script>
var satuan_id = "<?php echo $data->satuan_id; ?>";
var do_edit_satuan_url = "<?php echo base_url("admin/satuan_update"); ?>";
</script>