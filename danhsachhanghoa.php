<!DOCTYPE html>
<html lang="en">
<?php
include "ketnoi.php";
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách hàng hóa</title>
</head>
<body>
	<!-- Nếu nhấn vào nút submit thì câu sql có điều kiện còn ko thì select * from hanghoa -->
	<?php
	$sql = "Select*from hanghoa";
	$result=mysqli_query($conn,$sql);
	$tenhang = "";
	if (isset($_POST["submit"])) {
		$tenhang = $_POST["txtTenhang"];
		if ($tenhang == "") {
			$sql = "Select * From hanghoa";
			$result = mysqli_query($conn,$sql);
		}
		else {
			$sql = "Select * From hanghoa where Tenhang = '$tenhang'";
			$result = mysqli_query($conn,$sql);
		}
	}
	?>
	<table border="1" align="center" cellspacing="0" cellpading="3">
	<caption>Danh sách hàng hóa</caption>
	<tr>
		<td colspan="3" align="center"><a href="themhang.php"><button>Thêm mới</button></a></td>
		<td colspan="5">
			<form method="post">
				<input type="text" name="txtTenhang" placeholder="Nhập hàng hóa cần tìm" value="<?php echo $tenhang?>">
				<input type="submit" name="submit" value="Tìm kiếm">
			</form>
		</td>
	</tr>
	<tr>
		<th>Mã hàng</th>
		<th>Tên hàng</th>
		<th>Đơn giá</th>
		<th>Số lượng</th>
		<th>Đơn vị tính</th>
		<th>Ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>	
	</tr>
	<?php
	while ($row=mysqli_fetch_array($result)) {
		echo "<tr>";
			$mahang = $row["Mahang"];
			echo "<td>".$row["Mahang"]."</td>";
			echo "<td>".$row["Tenhang"]."</td>";
			echo "<td>".$row["Dongia"]."</td>";
			echo "<td>".$row["Soluong"]."</td>";
			echo "<td>".$row["DVT"]."</td>";
			echo "<td><img src='img/".$row["Anh"]."' width='50' height='50'></td>";
			echo "<td><a href='suahang.php?mahang=$mahang'><img src='img/sua.png' width='20px' height='20px'></a></td>";
			echo "<td><a href='xoahang.php?mahang=$mahang' onclick='return checkDelete()'><img src='img/xoa.jpg' width='20px' height='20px'></a></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
<script>
	function checkDelete() {
		return confirm("Bạn có chắc chắn muốn xóa mã hàng <?php echo $mahang?>?");
	}
</script>