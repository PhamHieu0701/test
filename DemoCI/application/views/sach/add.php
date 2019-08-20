<div class="shadow border border-success m-3">
    <h4 class="card-header">
        Sách mới
    </h4>
    <form method="POST" id="formAdd">
        <div class="card-body border border-success bg-dark text-white m-5" id="cardbody">  
            <a class="btn btn-primary" href="index" role="button">
                <i class="fa fa-backward" aria-hidden="true"></i>
                Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                Save
            </button>
            <a class='btn btn-outline-success' id="AddForm" role='button'>
                <i class='fa fa-plus' aria-hidden='true' onclick="addform()"> Thêm Form</i>
            </a>
            <div class="form-group">
                <label for="txtSoForm">Số form</label>
                <input type="text" class="form-control" id="txtSoForm" name="SoForm" value="1"
                    readonly>
            </div>
            <div class="form-group">
                <label for="txtTenSach">Tên sách</label>
                <input type="text" class="form-control" id="txtTenSach0" name="TenSach0" placeholder="Tên sách mới"
                autofocus required>
            </div>
            <div class="form-group">
                <label for="txtTenTacGia">Tên tác giả</label>
                <input type="text" class="form-control" id="txtTenTacGia0" name="TenTacGia0" placeholder="Tên tác giả" required>
            </div>   
        </div>
    </form>
</div>   
</div>