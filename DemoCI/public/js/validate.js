

$(function () {
    $('#formAdd').validate({
        errorElement: 'small',
        errorClass: 'help-block text-danger',
        highlight: function (e) {
            $(e).removeClass('is-valid').addClass('is-invalid');
        },
        unhighlight: function (e) {
            $(e).removeClass('is-invalid').addClass('is-valid');
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "Vui lòng điền đầy đủ thông tin!",
    });
});

var k = 1;
function addform() {
    if (k < 5) {
        $('<div/>', {
            id: 'card' + k,
            "class": 'card-body border border-success bg-dark text-white m-5 temp',
        }).appendTo('#formAdd');

        $('<a/>', {
            "class": "btn-outline-danger",
            role: "button",
            id: "btnDeleteForm" + k,
        }).appendTo('#card' + k);

        $('<i/>', {
            "class": "fa fa-trash",
        }).appendTo('#btnDeleteForm' + k);

        $('<div/>', {
            id: 'divTenSach' + k,
            "class": 'form-group',
        }).appendTo('#card' + k);

        $('<lable/>', {
            for: "txtTenSach" + k,
            text: "Tên sách",
        }).appendTo('#divTenSach' + k);

        $('<input/>', {
            type: "text",
            id: "txtTenSach" + k,
            name: "Sach" + "[" + k + "]" + "[" + "TenSach" + "]",
            "class": "form-control mt-3",
            placeholder: "Tên sách"
        }).appendTo('#divTenSach' + k);

        $('<div/>', {
            id: 'divTenTacGia' + k,
            "class": 'form-group',
        }).appendTo('#card' + k);

        $('<lable/>', {
            for: "txtTenTacGia" + k,
            text: "Tên tác giả"
        }).appendTo('#divTenTacGia' + k);

        $('<input/>', {
            type: "text",
            id: "txtTenTacGia" + k,
            name: "Sach" + "[" + k + "]" + "[" + "TenTacGia" + "]",
            "class": "form-control mt-3",
            placeholder: "Tên tác giả"
        }).appendTo('#divTenTacGia' + k);

        k = k + 1;
        $("input").prop('required', true);
        $("#txtSoForm").val(k);
    } else {
        alert("Vượt quá số form cho phép!")
    }
    var h = $('#txtSoForm').val();
    $(".temp a").click(function () {
        h--;
        k = h;
        $(this).parent().remove();
        $("#txtSoForm").val(k);
    });
};