<section class="product">
    <div class="page-header">
        <img alt="page=header" src="public/images/page-header.jpg" class="img-fluid">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 stickySidebar">
                <aside class="menu-box sticky">
                    <h1>MENU</h1>
                    <div class="menu-link">
                        <ul>                            
                            <?php
                                while($row = mysqli_fetch_array($data["ldu"])){
                                    echo 
                                    '<li>
                                        <a class="menu_scroll_link" title="'.$row["TenLoaiDU"].'" href="#'.$row["MaLoaiDU"].'">'.$row["TenLoaiDU"].'</a>
                                    </li>
                                    ';
                                }
                            ?>
                            <li>
                                <a class='menu_scroll_link' title="Topping" href="#Topping">Topping</a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8">
                <div class="hm_scrollview">                    
                    <?php
                    // $row1 = mysqli_fetch_array($data["ldu"]);                   
                    while($row1 = mysqli_fetch_array($data["ldu"])){ ?>
                        <div class="hm_block_menu_items" id="<?php $row1["MaLoaiDU"] ?>">
                            <h1 class="hm_menu_items_title"><?php $row1["TenLoaiDU"] ?></h1>
                            <div class="row">
                            <?php
                            while($row2 = mysqli_fetch_array($data["du"])){
                                $giaL = $row2["DonGia"] + 5000; 
                                if($row1["MaLoaiDU"] == $row2["MaLoaiDU"]){ ?>
                                    <div class="col-lg-4 col-md-6 col-6">
                                        <a href="@Url.Action("Details", "Menu", new { id = childItem.MaDU})">
                                            <div class="hm_menu_item">
                                                <div class="hm_item_image">
                                                    <img src="public/images_sp/<?php $row2["HinhAnh"] ?>" alt="<?php $row2["TenDU"] ?>" class="img-fluid">
                                                </div>
                                                <div class="hm_item_info">
                                                    <div class="item_title">
                                                        <h3><?php $row2["TenDU"] ?></h3>
                                                    </div>
                                                    <div class="item_price">
                                                        <div class="size">
                                                            <span>M</span><br>
                                                            <span><?php $row2["DonGia"] ?> ₫</span>
                                                        </div>
                                                        <div class="size">
                                                            <span>L</span><br>
                                                            <span><?php $giaL ?> ₫</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>                                            
                                    </div>
                                <?php }
                            }?>                                  
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="hm_block_menu_items" id="Topping">
                        <h1 class="hm_menu_items_title">Topping</h1>
                        <div class="row">
                            <?php
                            while($row = mysqli_fetch_array($data["topping"])){
                                echo 
                                '
                                <div class="col-lg-4 col-md-6 col-6">
                                    <div class="hm_menu_item">
                                        <div class="hm_item_image">
                                            <img src="public/images_sp/'.$row["HinhAnh"].'" alt="'.$row["TenTP"].'" class="img-fluid">
                                        </div>
                                        <div class="hm_item_info">
                                            <div class="item_title">
                                                <h3>'.$row["TenTP"].'</h3>
                                            </div>
                                            <div class="item_price">
                                                <div class="size">
                                                    <span>'.$row["DonGia"].' ₫</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }                           
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>