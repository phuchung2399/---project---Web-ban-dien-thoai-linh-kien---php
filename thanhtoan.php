<?php
	@session_start();
	include('admincp/modules/config.php');
		$name=$_SESSION['dangnhap'];	
		$insert_cart="insert into cart (fullname) value ('".$name."')";
		$ketqua= mysqli_query($conn,$insert_cart);
		if($ketqua){
			for($i=0;$i<count($_SESSION['product']);$i++){
			$max=mysqli_query($conn	,"select max(id) from cart");
			$row=mysqli_fetch_array($max);
			$cart_id=$row[0];
			$product_id=$_SESSION['product'][$i]['id'];
			$quantity=$_SESSION['product'][$i]['soluong'];
			
			$price=$_SESSION['product'][$i]['gia'];
			$tongtien= 0;
			$tongtien = $price * $quantity;
			$tinhtrang = "Chưa Xác Nhận";
			 $insert_cart_detail="insert into cart_detail (cart_id,product_id,quantity,price,tinhtrang) values('".$cart_id."','".$product_id."','".$quantity."','".$tongtien."','".$tinhtrang."');";
			 $cart_detail=mysqli_query($conn,$insert_cart_detail);

		}
		
	}	
		unset($_SESSION['product']);
?>
<?php
header('location:index.php?quanly=camon');
?>