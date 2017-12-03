<!DOCTYPE html>
<html>
<head>
	<title>Data Mahasiswa</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>Data <small>Mahasiswa</small></h2>
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add New</button>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>NIM</th>
						<th>NAMA</th>
						<th>PRODI</th>
						<th>QR CODE</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data->result() as $row):?>
					<tr>
						<td style="vertical-align: middle;"><?php echo $row->nim;?></td>
						<td style="vertical-align: middle;"><?php echo $row->nama;?></td>
						<td style="vertical-align: middle;"><?php echo $row->prodi;?></td>
						<td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row->qr_code;?>"></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal add new mahasiswa-->
	<form action="<?php echo base_url().'index.php/mahasiswa/simpan'?>" method="post">
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Add New Mahasiswa</h4>
		      </div>
		      <div class="modal-body">
		    
		          <div class="form-group">
		            <label for="nim" class="control-label">NIM:</label>
		            <input type="text" name="nim" class="form-control" id="nim">
		          </div>
		          <div class="form-group">
		            <label for="nama" class="control-label">NAMA:</label>
		            <input type="text" name="nama" class="form-control" id="nama">
		          </div>
	       		  <div class="form-group">
		            <label for="prodi" class="control-label">PRODI:</label>
		            <select name="prodi" class="form-control" id="prodi">
		            	<option>Sistem Informasi</option>
		            	<option>Sistem Komputer</option>
		            	<option>Manajemen Informatika</option>
		            </select>
		          </div>
	        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-primary">Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>

	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.1.4.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
</body>
</html>