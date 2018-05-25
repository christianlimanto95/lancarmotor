<a href="<?php echo base_url("admin/master_brand"); ?>" class="btn btn-update btn-back">< Kembali ke Master Brand</a>
<div class="section section-update">
    <div class="form-tambah-satuan">
        <div class="form-item">
            <div class="form-label">Nama Brand <span class="error error-nama-brand"></span></div>
            <input type="text" name="brand_name" class="form-input input-nama-brand" maxlength="10" value="<?php echo $data->brand_name; ?>" />
        </div>
        <div class="form-item">
            <div class="form-label">Gambar</div>
            <?php
            $imageAdded = "";
            $src = "";
            if ($data->brand_image_extension != "") {
                $imageAdded = " image-added";
                $src = "src='" . base_url("assets/images/brands/brands_" . $data->brand_id . "." . $data->brand_image_extension . "?d=" . strtotime($data->modified_date)) . "'";
            }
            ?>
            <div class="form-right<?php echo $imageAdded; ?>">
                <input type="hidden" name="brand_image" class="image-input" value="" />
                <div class="upload-container">
                    <div class="upload-button">
                        <div class="upload-text">Choose Image</div>
                    </div>
                    <input type="file" class="image-input-upload" name="input-image" accept="image/*" />
                </div>
                <img class="image-preview" <?php echo $src; ?> />
                <div class="btn btn-negative btn-delete-image">Delete Image</div>
            </div>
        </div>
        <div class="btn btn-simpan-perubahan">Simpan Perubahan</div>
    </div>
</div>
<script>
var brand_id = "<?php echo $data->brand_id; ?>";
var do_edit_brand_url = "<?php echo base_url("admin/brand_update"); ?>";
</script>