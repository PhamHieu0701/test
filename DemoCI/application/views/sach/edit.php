<div class="shadow" >
    <h4 class="card-header">
        Edit Sách
    </h4>
    <div class="card-body">
        <form method="POST" id="formAdd">
        <a class="btn btn-primary" href="<?php echo sach_url()?>index" role="button">
                <i class="fa fa-backward" aria-hidden="true"></i>
                Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                Save
            </button>
            <div class="form-group">
                <label for="txtIdSach">Id Sách</label>
                <input type="text" class="form-control" id="txtIdSach" name="IdSach" value="<?php echo $row[0]->IdSach ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="txtTenSach">Tên Sách</label>
                <input type="text" class="form-control" id="txtTenSach0" name="TenSach" placeholder="Tên Sách" value="<?php echo $row[0]->TenSach ?>"
                    autofocus required>
            </div>
            <div class="form-group">
                <label for="txtTenTacGia">Tên tác giả</label>
                <input type="text" class="form-control" id="txtTenTacGia0" name="TenTacGia" placeholder="Tên tác giả"  value="<?php echo $row[0]->TenTacGia ?>">
            </div>
            
        </form>
    </div>
</div>
