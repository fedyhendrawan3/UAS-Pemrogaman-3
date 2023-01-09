<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');


			$no = 1;
			$query = mysqli_query($koneksi," select t.nama_transaksi, t.tgl_transaksi, t.harga, t.qty, b.nama, t.diskon, p.nama_pelanggan from transaksi t left join barang b on t.id_barang = b.id_barang left join pelanggan p on p.id_pelanggan = t.id_pelanggan;");


?>


	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
              <a href="input_transaksi.php" role="button" class="btn btn-normal bg-gradient-primary">Tambah Transaksi</a>
              <a href="excel_transaksi.php" role="button" class="btn btn-normal bg-gradient-success">Export Excel</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
                <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Nama Barang</th>
            <th>Diskon</th>
            <th>Nama Pelanggan</th>
					</tr>
					</thead>
					<tbody>
					<?php
						while($data = mysqli_fetch_array($query))
						{
					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data['nama_transaksi'] ?></td>
              <td><?php echo $data['tgl_transaksi'] ?></td>
              <td><?php echo $data['harga'] ?></td>
              <td><?php echo $data['qty'] ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $data['diskon'] ?></td>
              <td><?php echo $data['nama_pelanggan'] ?></td>
						</tr>
					<?php	
						}
					?>
					</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
	include_once('footer.php');
?>