<script src="<?php echo base_url('aset/croppie/')?>jquery.js"></script>
<script src="<?php echo base_url('aset/croppie/')?>croppie.js"></script>
<link rel="stylesheet" href="<?php echo base_url('aset/croppie/')?>croppie.css">          
                
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"> 
        <div class="row mb-2"> 
          <div class="col-sm-6">
            <h4 class="m-0 text-dark">Ganti Foto dan Password</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Ganti Foto dan Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
    <!-- /.content-header -->

        <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form  id="id_form">
                        <div id="upload-demo" style="width:300px"></div>
                       <strong>Select Image:</strong>
                        <br/>
                        <input type="file" id="upload" class="btn btn-primary btn-flat">
                        <br/><br/>
                        <button id="uploadnow" class="btn btn-primary btn-flat"><i class="fa fa-upload"></i> Upload Image</button>
                        <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:50px;height:300px;margin-top:10px"><img src="<?php echo base_url('aset/'); ?>dist/img/<?php echo $this->session->userdata('user'); ?>.jpg"></div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form id="id_form1" action="<?php echo base_url('admin_gantifoto/simpan') ?>" method="POST">
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password Lama :</label>
                            <input type="password" class="form-control" id="p_lama" name="p_lama" placeholder="Password Lama">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password Baru :</label>
                            <input type="password" class="form-control" id="p_baru1" name="p_baru1" placeholder="Password baru">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="p_baru2" name="p_baru2" placeholder="Konfirmasi Password baru">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-flat glyphicon glyphicon-floppy-save"> Simpan</button>
                        </div>
                    </form>
                        <?php echo $alert; ?>                        
                    </div>

                    
                
                
            </div>
            <!-- /.row -->

        </div>
         
        </div>

    </div>
        <!-- /.container-fluid -->
    </section>

        <!-- /.content -->
</div>                   
        

     
      



      
       
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        //type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

var url;

$('#upload').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);
});

$('#uploadnow').on('click', function (ev) {
   
  

  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) { 
      $.ajax({
            url: '<?php echo base_url('admin_gantifoto/simpanfoto/');?>',
            type: "POST",
            data: {"image":resp},
            success: function (data) {
                html = '<img src="' + resp + '" />';
                $("#upload-demo-i").html(html);
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert(textStatus.responseText);
            }
        });
  });
});


    function simpan() {
        var url;
        url = '<?php echo base_url('admin_gantifoto/simpan'); ?>'; 
            $.ajax({
                url : url,
                type : 'POST',
                data : $('#id_form1').serialize(),
                dataType : "JSON",
                success : function(data) {
                    location.reload();
                    alert('Data Berhasil Disimpan ...!')
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    
                }
            })
    }

</script>

        
  


 




