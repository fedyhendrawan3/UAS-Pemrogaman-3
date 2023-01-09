<?php 
// Load the database configuration file 
include_once 'koneksi.php'; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "Transaksi-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('Pelanggan', 'Status', 'Kategori', 'Barang', 'Qty', 'Harga', 'Diskon', 'Total'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = mysqli_query($koneksi,"select p.nama_pelanggan as nama_pelanggan, p.status, k.nama, b.nama as nama_barang, t.qty, t.harga, t.diskon, (t.harga-((t.diskon/100)*t.qty*t.harga)) as total  from transaksi t LEFT JOIN pelanggan p on t.id_pelanggan = p.id_pelanggan LEFT JOIN barang b on b.id_barang=t.id_barang LEFT JOIN kategori k on b.kategori_id = k.id_kategori;"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = mysqli_fetch_array($query)){ 
        $lineData = array($row['nama_pelanggan'], $row['status'], $row['nama'], $row['nama_barang'], $row['qty'], $row['harga'], $row['diskon'], $row['total']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;