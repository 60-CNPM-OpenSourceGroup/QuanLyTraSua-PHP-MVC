<?php
for($i = 1; $i <= 4; $i++){
    $row = mysqli_fetch_array($data["SPh"]);
    $giaL = $row["DonGia"] + 5000;

    // $today = date("Y-m-d");
    
    // if (strtotime($today) > strtotime($row["NgayThem"])) {
    //     echo "Yesterday";
    // } else {
    //     echo "Tomorrow";
    // }
    // var_dump($row["NgayThem"]);
    // # = Details/'.$row["MaDU"].'
    echo 
    '<div class="col-lg-3 col-md-6 col-6">
        <a href="Menu/Details/'.$row["MaDU"].'" >
            <div class="hm_menu_item">
                <div class="hm_item_image">
                    <img src="public/upload/douong/'.$row["HinhAnh"].'" alt="'.$row["TenDU"].'" class="img-fluid">
                </div>
                <div class="hm_item_info">
                    <div class="item_title">
                        <h3>'.$row["TenDU"].'</h3>
                    </div>
                    <div class="item_price">
                        <div class="size">
                            <span>M</span><br>
                            <span>'.$row["DonGia"].' ₫</span>
                        </div>
                        
                        <div class="size">
                            <span>L</span><br>
                            <span>'.$giaL.' ₫</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    ';
}

?>
