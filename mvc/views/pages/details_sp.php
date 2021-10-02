<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        $(document).ready(
            function () {
                $("#themSL").click(
                    function () {
                        var sl = eval($("#quantity").val() + "+ 1");
                        $("#quantity").val(sl);
                    }
                )
                $("#botSL").click(
                    function () {
                        if (eval($("#quantity").val()) > 1) {
                            var sl = eval($("#quantity").val() + "- 1");
                            $("#quantity").val(sl);
                        }
                    }
                )
                var giaBanDau = $("#DonGia").val();
                $(':radio[name="sizename"]').change(function () {
                    if (this.value == "M") {
                        $("#DonGia").val(giaBanDau);
                    }
                    else {
                        $("#DonGia").val(eval(giaBanDau + "+ 5000"));
                    }
                });

            }
        )
</script>
<?php

$row = mysqli_fetch_array($data["du"]);

?>
<link href="public/Client/details.css" rel="stylesheet" />
<div class="row" style="margin-top:100px">
    <div class="col-md-6 col-md-offset-1" align = "center">
        <div class="thumbnail detail"><img style="width:500px; height:500px" src="public/images_sp/<?php echo $row['HinhAnh'] ?>" class="img-responsive wp-post-image" alt="" /></div>
    </div>

    <div class="col-md-5 p-3" align="left">
        <h2><strong><?php echo $row['TenDU'] ?></strong></h2>
        <!-- Begin Form -->
        <form class="form-addcart" name="form_addcart" id="form_addcart" action="/Menu/Details" method="post">
            <!-- @Html.HiddenFor(model => model.MaDU) -->
            <!--Giá SP-->
            <div class="price" align="left" style="color:red; font-size:16px"><span><strong>
                <!-- @Html.TextBoxFor(model => model.DonGia, new { @readonly = "readOnly", @style = "border: none; width:50px" }) -->
                <input type="text" readonly style="border: none; width:50px" value="<?php echo $row['DonGia'] ?>">
                &nbsp;VND
            </strong></span></div>
            <!--End giá-->
            <!--Chọn size-->
            <div class="size">
                <label style="font-size: 18px">Size</label>
                <div class="radio-size">
                    <input type="radio" id="sizeM" name="sizename" value="M" checked="checked">
                    <label for="sizeM">M</label>
                    <input type="radio" id="sizeL" name="sizename" value="L">
                    <label for="sizeL">L</label>
                </div>
                <div class="clearfix"></div>
            </div><!--End size-->
            <hr>
            <!--Chọn số lượng-->
            <div class="soluong">
                <label style="font-size: 18px">Số lượng</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon" id="botSL" style="text-align:center; font-size:15px; font-weight: bold;"><span class="fas fa-minus" style="margin-top: 7px"></span></div>
                        <input type="text" class="form-control input-sm" style="text-align:center; font-size:15px; font-weight: bold" name="quantity" id="quantity" value="1" readonly>
                        <div class="input-group-addon" id="themSL" style="text-align:center; font-size:15px; font-weight: bold;"><span class="fas fa-plus" style="margin-top: 7px"></span></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div><!--End số lượng-->
            <hr>
            <div class="ice-sugar">
                <div class="ice">
                    <label style="font-size: 18px">ICE-%</label>
                    <div class="radio-ice">
                        <div class="block">
                            <input type="radio" id="ice100" name="ice" value="100" checked="checked" class="ice100">
                            <label for="ice100"></label>
                            <span>100</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="ice70" name="ice" value="70" class="ice70">
                            <label for="ice70"></label>
                            <span>70</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="ice50" name="ice" value="50" class="ice50">
                            <label for="ice50"></label>
                            <span>50</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="ice30" name="ice" value="30" class="ice30">
                            <label for="ice30"></label>
                            <span>30</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="ice10" name="ice" value="10" class="ice10">
                            <label for="ice10"></label>
                            <span>10</span>
                        </div>
                    </div>
                </div>

                <div class="sugar">
                    <label style="font-size: 18px">SUGAR-%</label>
                    <div class="radio-sugar">
                        <div class="block">
                            <input type="radio" id="sugar100" name="sugar" value="100" checked="checked" class="sugar100">
                            <label for="sugar100"></label>
                            <span>100</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="sugar70" name="sugar" value="70" class="sugar70">
                            <label for="sugar70"></label>
                            <span>70</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="sugar50" name="sugar" value="50" class="sugar50">
                            <label for="sugar50"></label>
                            <span>50</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="sugar30" name="sugar" value="30" class="sugar30">
                            <label for="sugar30"></label>
                            <span>30</span>
                        </div>
                        <div class="block">
                            <input type="radio" id="sugar10" name="sugar" value="10" class="sugar10">
                            <label for="sugar10"></label>
                            <span>10</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!--Chọn món thêm-->
            <div class="monthem">
                <label style="font-size: 18px">Món thêm</label>
                @Html.DropDownList("Toppings", ViewBag.Toppings as MultiSelectList, new { @class = "form-control chosen-toppings border-dark", @multiple = "multiple" })
                <select name="qt" id="" class="form-control chosen-toppings border-dark">                    
                    <?php
                    while($row = mysqli_fetch_array($data["topping"])){
                        echo '<option value="'.$row["MaLoaiTP"].'">'.$row["TenTP"].'</option>';
                    }
                    ?>
                </select>
            </div><!--End chọn món thêm-->
            <div>
                <br />
                <input type="submit" value="Thêm vào giỏ" class="btn-success text-black" />
            </div>
            <br />
            <!-- @if (ViewBag.TB != "")
            {
                <div class="bg-danger p-2" style="font-weight:bold">@ViewBag.TB</div>
            } -->

        </form>
        <!-- End Form  add-to-cart buttons -->
    </div>
    <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>

</div>