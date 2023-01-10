<?php
    	include_once('koneksi.php');
        include_once('header.php');
        include_once('sidebar.php');


		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$nama_pelanggan = $_POST['nama_pelanggan'];
            $no_tlp = $_POST['no_tlp'];
			$status = $_POST['status'];
			

			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into pelanggan values('','$nama_pelanggan','$no_tlp','$status')");

			if($query)
			{
				// mengalihkan halaman kembali
				//header("location:tampil_barang.php");
			}
			else
			{
				echo mysqli_error($koneksi);
			}
		}	

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tampil_pelanggan.php">Master Pelanggan</a></li>
              <li class="breadcrumb-item active">Input Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->

          <form  method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" placeholder="Isi Nama Pelanggan" name="nama_pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">No. Telepon</label>
                        <input type="text" class="form-control" id="nama" placeholder="Isi No. Telepon" name="no_tlp">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="status" required>
                                <option value="" >----- Pilih Status -----</option>
                                <option value="MEMBER">Member</option>
                                <option value="NON MEMBER">Non Member</option>
                            </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="save" ></button>
                </div>
              </form>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                
              </div>
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
    	include_once('footer.php');
?>