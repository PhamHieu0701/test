<div class="sach">
    <table class="table table-striped table-bordered">
    <thead class='thead-dark'>
        <tr>
            <th>ID Sách</th>
            <th>Tên sách</th>
            <th>Tên tác giả</th>
            <th class='text-right'>Action</th>
        </tr>
    </thead>
        <?php if(!empty($sach)){ ?>
            <?php foreach($sach as $s) {?>
            <tr>
                <td><?php echo $s->IdSach?></td>
                <td><?php echo $s->TenSach?></td>
                <td><?php echo $s->TenTacGia?></td>
                <td class='text-right'>
                <a class='btn btn-primary btn-sm' href="<?php echo sach_url()?>edit/<?php echo $s->IdSach ?>" role="button">
                    <i class='fa fa-pencil' aria-hidden='true'></i>Chi tiết
                </a>
                <a class='btn btn-outline-danger btn-sm' onclick='deleteSach(<?php echo $s->IdSach?>)' role='button'>
                    <i class='fa fa-pencil' aria-hidden='true'></i>Xóa
                </a>
                </td>
            <tr>
            <?php }?>
        <?php } else{ ?>
            <div class="alert alert-danger">
                Không tìm thấy
            </div>
        <?php }?>
    </table>
</div>
<div class="paging">
    <ul class="pagination">
        <?php echo $pagelinks ?>
    </ul>
</div>