<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <link rel="icon" href="dk.png">
  <title>Delete Multiple Data - www.dewankomputer.com</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand text-white" href="index.php">
      Dewan Komputer
    </a>
  </nav>

  <div class="container">
    <h3 align="center" class="mt-3">Menghapus Multiple Data dengan Checkbox pada PHP</h3>
      <?php
        include 'koneksi.php';
        $query = "SELECT * FROM tbl_karyawan";
        $dewan1 = $db1->prepare($query);
        $dewan1->execute();
        $res1 = $dewan1->get_result();

        if($res1->num_rows > 0){
      ?>
      <form action="delete.php" method="POST">
        <div align="right">
          <button type="submit" name="btn_delete" id="btn_delete" class="btn btn-danger mb-4 mt-4" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete Selected</button>
        </div>

        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th><input type="checkbox" class="form-control check_all"/></th>
              </tr>
            </thead>
            <tbody>           
              <?php
                $no=1;
                while($row = $res1->fetch_assoc()){
              ?>
                <tr id="<?php echo $row["id"]; ?>">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row["nama_lengkap"]; ?></td>
                  <td><?php echo $row["jenkel"]; ?></td>
                  <td><?php echo $row["alamat"]; ?></td>
                  <td>
                    <input type="checkbox" name="id[]" class="form-control chk_boxes1" value="<?php echo $row["id"]; ?>" />
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        </form>
      <?php } ?>
  </div>

  <div class="text-center p-2">© <?php echo date('Y'); ?> Copyright:
    <a href="https://dewankomputer.com/"> Dewan Komputer</a>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $('.check_all').click(function() {
          $('.chk_boxes1').prop('checked', this.checked);
      });
    });
  </script>
</body>
</html>