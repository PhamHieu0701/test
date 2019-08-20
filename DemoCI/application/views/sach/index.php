<!DOCTYPE html>
<?php echo $this->session->flashdata('msg')?>
<html lang="en">
<head>
   <?php $this->load->view('sach/head')?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="<?php echo sach_url()?>">
    <i class="fa fa-home fa-lg"></i>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo sach_url()?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo sach_url()?>add">Thêm mới</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo sach_url()?>ImportExcel" tabindex="-1" aria-disabled="true">Import file</a>
      </li>
    </ul>
  </div>
</nav>
<div class="content">
<?php $this->load->view($temp) ?>
</div>
</body>
<script>
  ajaxsach(page_url=false);
  function Search()
  {
    ajaxsach(page_url=false);
    return false;
  }
  $(document).on('click',".pagination li a", function(){
    var page_url=$(this).attr("href");
    ajaxsach(page_url);
    return false;
  })
  function ajaxsach(page_url)
  {
    var search=$("#search_key").val();
    var dataString='search_key='+search;
    var base_url="<?php echo sach_url('index_ajax')?>";
    if(page_url){
      base_url=page_url;
    }
    $.ajax({
      type:'POST',
      url: base_url,
      data:dataString,
      success:function(response){
        $("#ajaxContent").html(response);
      }
    }); 
  }
</script>
</html>