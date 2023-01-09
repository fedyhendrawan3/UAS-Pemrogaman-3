<?php
    	include_once('koneksi.php');
        include_once('header.php');
        include_once('sidebar.php');


		// menangkap data yang di kirim dari form
		if( !empty($_POST['save']) )
		{
			$nama = $_POST['nama'];
            $kategori_id = $_POST['kategori_id'];
			$satuan_id = $_POST['satuan_id'];
			

			// menginput data ke database
			$query=mysqli_query($koneksi,"insert into barang values('','$nama',$kategori_id,$satuan_id)");

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
    
    $querykategori = "SELECT * FROM kategori";
		$resultkategori = mysqli_query ($koneksi,$querykategori); 

    $querysatuan = "SELECT * FROM satuan";
		$resultsatuan = mysqli_query ($koneksi,$querysatuan); 
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tampil_barang.php">Master Barang</a></li>
              <li class="breadcrumb-item active">Input Barang</li>
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
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" id="nama" placeholder="Isi Nama Barang" name="nama">
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                            <select class="form-control select2" style="width: 100%;" name="kategori_id">
                            <option value="">-----Pilih Kategori-----</option>
                                <?php
                                  while ($datakategori=mysqli_fetch_array($resultkategori))
                                  {
                                    echo "<option value=$datakategori[id_kategori]>$datakategori[nama]</option>";
                                  }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="satuan_id">
                            <option value="">-----Pilih Satuan-----</option>
                                <?php
                                  while ($datasatuan=mysqli_fetch_array($resultsatuan))
                                  {
                                    echo "<option value=$datasatuan[id_satuan]>$datasatuan[nama]</option>";
                                  }
                                ?>
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