<div class="section">
    <div class="section-title">List</div>
    <div class="item-container">
        <table class="table">
            <thead>
                <tr>
                    <td>KATEGORI</td>
                    <td>BRAND</td>
                    <td>NAMA</td>
                    <td>GAMBAR</td>
                    <td>HARGA</td>
                    <td>STOK</td>
                    <td>DIMENSI</td>
                    <td>BERAT</td>
                    <td data-col="action">ACTION</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<div class="section section-insert">
    <div class="section-title">Tambah Barang</div>
    <div class="form-tambah-item">
        <div class="form-item">
            <div class="form-label">Kategori <span class="error error-kategori"></span></div>
            <div class="select select-kategori" data-value="<?php echo $category[0]->category_id; ?>">
                <input type="hidden" class="select-input" name="category_id" value="<?php echo $category[0]->category_id; ?>" />
                <div class="select-text"><?php echo $category[0]->category_name; ?></div>
                <div class="dropdown-container dropdown-container-kategori">
                    <?php
                    $iLength = sizeof($category);
                    for ($i = 0; $i < $iLength; $i++) {
                        echo "<div class='dropdown-item' data-value='" . $category[$i]->category_id . "'>" . $category[$i]->category_name . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-item">
            <div class="form-label">Brand <span class="error error-brand"></span></div>
            <div class="select select-brand" data-value="<?php echo $brand[0]->brand_id; ?>">
                <input type="hidden" class="select-input" name="brand_id" value="<?php echo $brand[0]->brand_id; ?>" />
                <div class="select-text"><?php echo $brand[0]->brand_name; ?></div>
                <div class="dropdown-container dropdown-container-brand">
                    <?php
                    $iLength = sizeof($brand);
                    for ($i = 0; $i < $iLength; $i++) {
                        echo "<div class='dropdown-item' data-value='" . $brand[$i]->brand_id . "'>" . $brand[$i]->brand_name . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-item">
            <div class="form-label">Nama Barang <span class="error error-nama-barang"></span></div>
            <input type="text" name="item_name" class="form-input input-nama-barang" maxlength="50" />
        </div>
        <div class="form-item">
            <div class="form-label">Gambar <span class="error error-image"></span></div>
            <div class="form-right">
                <input type="hidden" name="brand_image" class="image-input" value="" />
                <div class="upload-container">
                    <div class="upload-button">
                        <div class="upload-text">Choose Image</div>
                    </div>
                    <input type="file" class="image-input-upload" name="input-image" accept="image/*" />
                </div>
                <img class="image-preview" />
                <div class="btn btn-negative btn-delete-image">Delete Image</div>
            </div>
        </div>
        <div class="form-item-inline">
            <div class="form-label">Stok <span class="error error-stok"></span></div>
            <input type="text" name="item_qty" class="form-input input-stok" maxlength="10" data-type="number" value="0" />
        </div><div class="form-item-inline">
            <?php
            $first_satuan_nama = "";
            $iLength = sizeof($satuan);
            for ($i = 0; $i < $iLength; $i++) {
                if ($satuan[$i]->satuan_type == 3) {
                    $first_satuan_nama = $satuan[$i]->satuan_nama;
                    break;
                }
            }
            ?>
            <div class="form-label">Satuan Stok <span class="error error-satuan-qty"></span></div>
            <div class="select select-satuan-qty" data-value="<?php echo $first_satuan_nama; ?>">
                <input type="hidden" class="select-input" name="item_satuan" value="<?php echo $first_satuan_nama; ?>" />
                <div class="select-text"><?php echo $first_satuan_nama; ?></div>
                <div class="dropdown-container dropdown-container-satuan-qty">
                    <?php
                    $iLength = sizeof($satuan);
                    for ($i = 0; $i < $iLength; $i++) {
                        if ($satuan[$i]->satuan_type == 3) {
                            echo "<div class='dropdown-item' data-value='" . $satuan[$i]->satuan_nama . "'>" . $satuan[$i]->satuan_nama . "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-item">
            <div class="form-label">Harga <span class="error error-harga"></span></div>
            Rp &nbsp;<input type="text" name="item_price" class="form-input input-harga" maxlength="12" data-type="number" data-thousand-separator="true" value="0" />
        </div>
        <div class="form-item-inline">
            <div class="form-label">Panjang <span class="error error-panjang"></span></div>
            <input type="text" name="item_panjang" class="form-input input-panjang" maxlength="7" data-type="number" />
        </div><div class="form-item-inline">
            <div class="form-label">Lebar <span class="error error-lebar"></span></div>
            <input type="text" name="item_lebar" class="form-input input-lebar" maxlength="7" data-type="number" />
        </div><div class="form-item-inline">
            <div class="form-label">Tinggi <span class="error error-tinggi"></span></div>
            <input type="text" name="item_tinggi" class="form-input input-tinggi" maxlength="7" data-type="number" />
        </div><div class="form-item-inline">
            <?php
            $first_satuan_nama = "";
            $iLength = sizeof($satuan);
            for ($i = 0; $i < $iLength; $i++) {
                if ($satuan[$i]->satuan_type == 1) {
                    $first_satuan_nama = $satuan[$i]->satuan_nama;
                    break;
                }
            }
            ?>
            <div class="form-label">Satuan Dimensi <span class="error error-satuan-dimensi"></span></div>
            <div class="select select-satuan-dimensi" data-value="<?php echo $first_satuan_nama; ?>">
                <input type="hidden" class="select-input" name="item_dimensi_satuan" value="<?php echo $first_satuan_nama; ?>" />
                <div class="select-text"><?php echo $first_satuan_nama; ?></div>
                <div class="dropdown-container dropdown-container-satuan-dimensi">
                    <?php
                    $iLength = sizeof($satuan);
                    for ($i = 0; $i < $iLength; $i++) {
                        if ($satuan[$i]->satuan_type == 1) {
                            echo "<div class='dropdown-item' data-value='" . $satuan[$i]->satuan_nama . "'>" . $satuan[$i]->satuan_nama . "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div></div>
        <div class="form-item-inline">
            <div class="form-label">Berat <span class="error error-berat"></span></div>
            <input type="text" name="item_berat" class="form-input input-berat" maxlength="7" data-type="number" />
        </div><div class="form-item-inline">
            <?php
            $first_satuan_nama = "";
            $iLength = sizeof($satuan);
            for ($i = 0; $i < $iLength; $i++) {
                if ($satuan[$i]->satuan_type == 2) {
                    $first_satuan_nama = $satuan[$i]->satuan_nama;
                    break;
                }
            }
            ?>
            <div class="form-label">Satuan Berat <span class="error error-satuan-berat"></span></div>
            <div class="select select-satuan-berat" data-value="<?php echo $first_satuan_nama; ?>">
                <input type="hidden" class="select-input" name="item_berat_satuan" value="<?php echo $first_satuan_nama; ?>" />
                <div class="select-text"><?php echo $first_satuan_nama; ?></div>
                <div class="dropdown-container dropdown-container-satuan-berat">
                    <?php
                    $iLength = sizeof($satuan);
                    for ($i = 0; $i < $iLength; $i++) {
                        if ($satuan[$i]->satuan_type == 2) {
                            echo "<div class='dropdown-item' data-value='" . $satuan[$i]->satuan_nama . "'>" . $satuan[$i]->satuan_nama . "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-item">
            <div class="form-label">Deskripsi <span class="error error-deskripsi"></span></div>
            <textarea name="item_description" class="form-input input-deskripsi" ></textarea>
        </div>
        <div class="btn btn-tambah-barang">Tambah Barang</div>
    </div>
</div>
<script>
var image_url = "<?php echo base_url("assets/images/item/item_"); ?>";
var get_data_url = "<?php echo base_url("admin/item_get"); ?>";
var tambah_item_url = "<?php echo base_url("admin/item_insert"); ?>";
var edit_item_url = "<?php echo base_url("admin/master_item_edit/"); ?>";
var hapus_item_url = "<?php echo base_url("admin/item_delete"); ?>";
</script>