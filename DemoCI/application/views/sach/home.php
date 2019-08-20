<?php echo $this->session->flashdata('msg')?>
<div id="ketqua">
<table class='table table-striped table-bordered' id='results'>
<thead class='thead-dark'>
<tr>
<th>ID Truyện</th>
<th>Ten Truyện</th>
<th>Tên Tác giả</th>
<th class='text-right'>
    Action
</th>
</tr>
</thead>
<?php foreach($list as $list) {?>
<tr>
    <td><?php echo $list->IdSach ?></td>
    <td><?php echo $list->TenSach ?></td>
    <td><?php echo $list->TenTacGia ?></td>
    <td class='text-right'>
        <a class='btn btn-primary btn-sm' href="<?php echo sach_url()?>edit/<?php echo $list->IdSach ?>" role="button">
            <i class='fa fa-pencil' aria-hidden='true'></i>Chi tiết
        </a>
        <a class='btn btn-outline-danger btn-sm' onclick='deleteSach(<?php echo $list->IdSach?>)' role='button'>
            <i class='fa fa-pencil' aria-hidden='true'></i>Xóa
        </a>
    </td>
</tr>
<?php } ?>
</table>
</div>