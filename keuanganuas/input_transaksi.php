<?php
    	include_once('koneksi.php');
        include_once('header.php');
        include_once('sidebar.php');


        if( !empty($_POST['save']) )
        {
          $status = $_POST['status'];
          $tgl_transaksi = $_POST['tgl_transaksi'];
          $harga = $_POST['harga'];
          $qty = $_POST['qty'];
          $id_barang = $_POST['id_barang'];
          $diskon = $_POST['diskon'];
          $id_pelanggan = $_POST['id_pelanggan'];
    
          // menginput data ke database
          $query=mysqli_query($koneksi,"insert into transaksi values('','$status','$tgl_transaksi','$harga','$qty','$id_barang','$diskon','$id_pelanggan')");
    
          if($query)
          {
            // mengalihkan halaman kembali
            //header("location:transaksi.php");
          }
          else
          {
            echo mysqli_error($koneksi);
          }
        }	
    
        $querybarang = "SELECT * FROM barang";
        $resultbarang = mysqli_query ($koneksi,$querybarang); 

        $querypelanggan = "SELECT * FROM pelanggan";
        $resultpelanggan = mysqli_query ($koneksi,$querypelanggan); 
    

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Input Transaksi</li>
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
                        <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="status">
                                <option selected="selected" >----- Pilih Transaksi -----</option>
                                <option value="PEMBELIAN">PEMBELIAN</option>
                                <option value="PENJUALAN">PENJUALAN</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal</label>
                        <input type="date" class="form-control" id="tgl_transaksi" placeholder="Isi Tanggal" name="tgl_transaksi">
                    </div>
                    <div class="form-group">
                        <label for="nama">Harga</label>
                        <input type="number" class="form-control" id="harga" placeholder="Isi Harga" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="nama">Qty</label>
                        <input type="number" class="form-control" id="qty" placeholder="Isi Qty" name="qty">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                            <select class="form-control select2" style="width: 100%;" name="id_barang">
                              <option value="">-----Pilih Barang-----</option>
                                <?php
                                  while ($databarang=mysqli_fetch_array($resultbarang))
                                  {
                                    echo "<option value=$databarang[id_barang]>$databarang[nama]</option>";
                                  }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Pelanggan</label>
                            <select class="form-control select2" style="width: 100%;" id="id_pelanggan" name="id_pelanggan" onchange="DataPelanggan()">
                              <option value="">-----Pilih Pelanggan-----</option>
                                <?php
                                  while ($datapelanggan=mysqli_fetch_array($resultpelanggan))
                                  {
                                    echo "<option value=$datapelanggan[id_pelanggan]>$datapelanggan[nama_pelanggan]</option>";
                                  }
                                ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" class="form-control" id="diskon" placeholder="Isi Diskon" name="diskon">
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
  <script type='text/javascript'>
		function DataPelanggan()
		{
			var id_pelanggan = document.getElementById("id_pelanggan").value;
			//alert(id_member);

			$.ajax
			({
				url : "GetDiskon.php",
				method : "POST",
				data : {
					x : id_pelanggan 
				},
				dataType : "JSON",
				success : function(data){
					document.getElementById("diskon").value = data.Diskon;

					document.getElementById("diskon").setAttribute('readonly',true);
				}
			})
		}
  </script>

<?php
    	include_once('footer.php');
?>