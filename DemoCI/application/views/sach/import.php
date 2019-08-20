<?php echo $this->session->flashdata('msg')?>
<div class="shadow">
    <div class="shadow border border-success m-3">
    <h4 class="card-header">
        Import File
    </h4>
    <form method="POST" enctype="multipart/form-data" action="<?php echo sach_url('importExcel')?>">
        <div class="card-body border border-success bg-dark text-white m-5" id="cardbody">  
            <a class="btn btn-primary" href="index" role="button">
                <i class="fa fa-backward" aria-hidden="true"></i>
                Back
            </a>
            <button type="submit" class="btn btn-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                Save
            </button>
            <div class="form-group">
                <label for="txtImport">ImportFile</label>
                <input type="file" class="form-control" id="Import" name="Import" required>
            </div>   
        </div>
    </form>
</div> 