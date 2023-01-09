<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');


			$no = 1;
			$query = mysqli_query($koneksi," SELECT * FROM pelanggan ");


?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Master Pelanggan</li>
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
			  <a href="input_pelanggan.php" role="button" class="btn btn-normal bg-gradient-primary">Tambah Pelanggan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
                <table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>No Telepon</th>
						<th>Status</th>
					</tr>
					</thead>
					<tbody>
					<?php
						while($data = mysqli_fetch_array($query))
						{
					?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $data['nama_pelanggan'] ?></td>
							<td><?php echo $data['no_tlp'] ?></td>
							<td><?php echo $data['status'] ?></td>
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