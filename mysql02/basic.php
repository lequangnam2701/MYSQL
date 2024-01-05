<?php
$sinhVien = array(
    array("ten" =>"Nguyen Van A", "tuoi" => 20, "diem" =>85),
    array("ten" =>"Nguyen Van C", "tuoi" => 21, "diem" =>75),
    array("ten" =>"Nguyen Van D", "tuoi" => 22, "diem" =>90),
);
 foreach ($sinhVien as $sv) {
    echo "Tên " . $sv ["ten"] . "<br>";
    echo "Tuổi " . $sv ["tuoi"] . "<br>";
    echo "Điểm". $sv ["diem"] . "<br>";

    if ($sv["diem"] >= 80) {
        echo "đánh giá: Xuất sắc<br>";
    }elseif ($sv["diem"] >= 70) {
        echo "đánh giá: Khá<br>";
    }elseif ($sv["diem"] >= 60) {
        echo "đánh giá: trung bình<br>";
    }else {
        echo "đanhs giá: yếu<br>";
    }
    echo "<hr>";
 }

 $tongdiem =0;
 foreach ($sinhVien as $sv ) {
    $tongdiem += $sv["diem"];
 }

 $diemTrungBinh = $tongdiem / count($sinhVien);

 echo "Diem trung binhf lop  toi la: " . $diemTrungBinh;

 ?>