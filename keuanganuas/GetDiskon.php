<?php
ini_set('display_errors',1);
include 'koneksi.php';

$id_pelanggan = $_POST['x'];
$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = {$id_pelanggan} AND status ='MEMBER' ";
$result = mysqli_query($koneksi,$sql);

$rowcount = mysqli_num_rows($result);

if ($rowcount > 0)
{
    $data['Diskon'] = 5;
}
else
{
    $data['Diskon'] = 2;
}
/*
while($rows = mysqli_fetch_array($result))
{
    $data['Diskon'] = $rows["diskon"];
}
*/
echo json_encode($data);

?>