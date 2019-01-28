   <?php   
   $dn ="";
   $dk="";
   @session_start();
       if(isset($_SESSION['dangnhap'])){
           $dn= $_SESSION['dangnhap'];
           $cssdk = "display: none;";
           $css1 = "margin-left: 5px";
           $width="width:200px";
           $marginleft="margin-left: 10px";
          
       }else{
        $dn= 'Đăng Nhập';
        $css = "display: none;";
        $width="width:90px";
       }
   ?>
   <div class="menu">
        	<ul>
            	<li><a href="index.php">Trang chủ</a></li>
                <li style="<?php echo $cssdk; ?>;<?php echo $width; ?>"><a href="?quanly=dangkymoi">Đăng ký</a></li>
                 <li style="<?php echo $css1;?>;<?php echo $width;?>"><a href="?quanly=dangnhap"><?php echo $dn; ?></a>
                  <li style="<?php echo $css;?>;<?php echo $marginleft;?>" ><a href="?quanly=userInfo">Thông Tin |</a>
                  <li style="<?php echo $css; ?>;margin-left:0px;" ><a href="?quanly=donhang">Đơn Hàng</a>
                  <li style= "<?php echo $css; ?>;width:100px;margin-left: 10px;" ><a href="update_cart.php?thoat=1" style="text-decoration:underline;color:#fff; margin-left:-20px;">Đăng Xuất</a>   </li>
                 <li style="<?php echo $css; ?>;margin-left: 330px;"><a href="?quanly=dathang">Giỏ hàng</a></li>
            </ul>
        </div>