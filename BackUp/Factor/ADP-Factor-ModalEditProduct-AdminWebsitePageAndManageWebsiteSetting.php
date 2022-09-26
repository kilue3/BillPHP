<?php
	require("Factor/ConnectDatabase.php");

	if (isset($_POST['addproduct_pname'])) :
		require("Factor/ConnectDatabase.php");
		$sql = "UPDATE product (p_name,p_amount,p_producer,p_group,p_producer_price,p_sale_price,p_tzs_price,p_header_image,p_logo,p_image1,p_image2,p_image3,p_image4,p_image5,p_detail,p_system_require) 
		VALUES(:p_name,:p_amount,:p_producer,:p_group,:p_producer_price,:p_sale_price,:p_tzs_price,:p_header_image,:p_logo,:p_image1,:p_image2,:p_image3,:p_image4,:p_image5,:p_detail,:p_system_require)";

		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':p_name', $_POST['addproduct_pname']);
		$stmt->bindParam(':p_amount', $_POST['addproduct_pamout']);
		$stmt->bindParam(':p_producer', $_POST['addproduct_producer']);
		$stmt->bindParam(':p_group', $_POST['addproduct_group']);
		$stmt->bindParam(':p_producer_price', $_POST['addproduct_producerprice']);
		$stmt->bindParam(':p_sale_price', $_POST['addproduct_saleprice']);
		$stmt->bindParam(':p_tzs_price', $_POST['addproduct_tzsprice']);
		$stmt->bindParam(':p_header_image', $_POST['addproduct_header_image']);
		$stmt->bindParam(':p_logo', $_POST['addproduct_logo']);
		$stmt->bindParam(':p_image1', $_POST['addproduct_image1']);
		$stmt->bindParam(':p_image2', $_POST['addproduct_image2']);
		$stmt->bindParam(':p_image3', $_POST['addproduct_image3']);
		$stmt->bindParam(':p_image4', $_POST['addproduct_image4']);
		$stmt->bindParam(':p_image5', $_POST['addproduct_image5']);
		$stmt->bindParam(':p_detail', $_POST['addproduct_detail']);
		$stmt->bindParam(':p_system_require', $_POST['addproduct_system_require']);
		if ($stmt->execute()) :?>
			<div class="alert alert-success" role="alert">
  				<strong>เพิ่มสินค้าสำเร็จ!</strong>
				<a href="#">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</a>
			</div>
		<?php else : ?>
			<div class="alert alert-danger" role="alert">
				เพิ่มสินค้าไม่สำเร็จ โปรดลองใหม่อีกครั้ง
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		<?php endif;
		$conn = null;
	endif;



	require("Factor/ConnectDatabase.php");

	$sql = "SELECT * FROM product where p_id =:p_id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':p_id', $g);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	$conn = null;
?>

<!-- Modal Add Product -->
	<div class="modal fade" id="ModalEditProduct" tabindex="-1" role="dialog" aria-labelledby="ModalEditProduct" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
			<div class="modal-content modal-lg" style="background-color: #121212; border: 2px solid #3e3e3e">
			  	<div class="modal-header" style="border: 0px">
					<h4 class="modal-title" id="ModalEditProduct">แก้ไขข้อมูลสินค้า</h4>
			  	</div>
			  	<div class="modal-body" style="border-top: 1px solid #3e3e3e; border-bottom:1px solid #3e3e3e">
					<div align="center">
						<form method="POST">
							
							<h5 align="left">ข้อมูลสินค้า <?php echo $ge; ?></h5>
							
							<p style="max-width: 490px; font-size: 18px" align="left">ชื่อสินค้า <?php echo $result["p_name"]; ?>
								<input class="form-control" type="text" placeholder="ชื่อสินค้า" maxlength="35" name="addproduct_pname" value="<?php echo $result["p_name"]; ?>" required/>
								<small class="form-text text-muted">
									พิมพ์ตัวอักษรได้สูงสุด 35 ตัวอักษร
								</small>
							</p>
							
							<p style="max-width: 490px; font-size: 18px" align="left">จำนวนสินค้า
								<input class="form-control" type="number" placeholder="จำนวนสินค้า" maxlength="5" name="addproduct_pamout" value="0" required/>
								<small class="form-text text-muted">
									จำนวนสินค้าที่มีอยู่ในคลังสินค้า
								</small>
							</p>
							
							<div class="form-row" style="max-width: 500px; font-size: 18px;" align="left">
								<div class="form-group col-sm-6" style="margin-bottom: 0">ค่ายเกม
									<div class="form-group">
										<select class="form-control" id="FormSelectProducer" name="addproduct_producer">
											<option>Steam</option>
											<option>Origin</option>
											<option>Microsoft</option>
										</select>
									</div>
								</div>
								<div class="form-group col-sm-6" style="margin-bottom: 0">หมวดหมู่
									<div class="form-group">
										<select class="form-control" id="FormSelectGroup" name="addproduct_group">
											<option>Normal</option>
											<option>Spacial Discount</option>
											<option>Recommended Game</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="LineBetween"></div>
							<h5 align="left">คำอธิบายของสินค้า</h5>
							
							<p style="max-width: 490px; font-size: 18px" align="left">คำอธิบายของสินค้า
								<textarea class="form-control" style="min-height:110px" type="text" maxlength="500" placeholder="คำอธิบายของเกม" name="addproduct_detail"></textarea>
								<small class="form-text text-muted">
									พิมพ์ตัวอักษรได้สูงสุด 500 ตัวอักษร
								</small>
							</p>
							
							<p style="max-width: 490px; font-size: 18px" align="left">ความต้องการของระบบ
								<textarea class="form-control" style="min-height:110px" type="text" maxlength="500" placeholder="ความต้องการของระบบ" name="addproduct_system_require" ></textarea>
								<small class="form-text text-muted">
									พิมพ์ตัวอักษรได้สูงสุด 500 ตัวอักษร
								</small>
							</p>
							
							<div class="LineBetween"></div>
							<h5 align="left">ราคา</h5>
							
							<p style="max-width: 490px; font-size: 18px" align="left">ราคาสินค้าที่ต้องการขาย
								<input class="form-control" type="number" placeholder="ราคาสินค้าที่ต้องการขาย" maxlength="5" name="addproduct_tzsprice" value="0" required/>
								<small class="form-text text-muted">
									ราคาสินค้าที่ต้องการขายภายในเว็บไซต์นี้
								</small>
							</p>
							
							<p style="max-width: 490px; font-size: 18px" align="left">ราคาสินค้าหลังจากลดราคาแล้ว
								<input class="form-control" type="number" placeholder="ราคาสินค้าหลังจากลดราคาแล้ว" maxlength="5" name="addproduct_saleprice" value="0" required/>
								<small class="form-text text-muted">
									ราคาสินค้าที่ต้องการขายภายในเว็บไซต์นี้ ในช่วงลดราคา หากไม่มีให้ใส่เลข 0
								</small>
							</p>
							
							<p style="max-width: 490px; font-size: 18px" align="left">ราคาสินค้าจากค่ายเกม
								<input class="form-control" type="number" placeholder="ราคาสินค้าจากค่ายเกม" maxlength="5" name="addproduct_producerprice" value="0" required/>
								<small class="form-text text-muted">
									ราคาสินค้าจากค่ายเกมของเกมนั้น ๆ ใช้เพื่อนำมาเปรียบเทียบราคาให้กับลูกค้า
								</small>
							</p>
							
							<div class="LineBetween"></div>
							<h5 align="left">วีดีโอ</h5>
							
							<p style="max-width: 490px; font-size: 18px" align="left">ลิงค์วีดีโอาก Youtube 
								<input class="form-control" type="text" placeholder="ลิงค์วีดีโอจาก Youtube" maxlength="50" name="addproduct_youtubevideo" value="Zm23HqJEQoo" required/>
								<small class="form-text text-muted">
									พิมพ์ตัวอักษรได้สูงสุด 50 ตัวอักษร
								</small>
							</p>
							
							<p style="max-width: 490px; font-size: 18px" align="left">วิธีคัดลอกลิงค์จาก Youtube<br>
								ให้ก็อบปี้ลิงค์จากด้านหลังของ www.youtube.com/watch?v=
								<img class="ImgResponsive" src="image\AdminPage\youtubelink.png">
							</p>
							<br>
							
							<div class="LineBetween"></div>
							<h5 align="left">รูปภาพ</h5>
							
							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">รูปภาพขนาดย่อ
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_header_image" value="Empty_HeaderGame_image.png	" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									รูปภาพขนาดย่อจะแสดงอยู่ในหน้ารวมของรายการสินค้า
									</small>
							</div>
							</p>
							<br>
						
							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">โลโก้ของสินค้า
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_logo" value="Empty_LogoGame_image.png" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									โลโก้ของสินค้าจะอยู่ในส่วนรายละเอียดของสินค้า
									</small>
							</div>
							</p>
							<br>
					
							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">รูปภาพสไลด์ รูปที่ 1
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_image1" value="Empty_imageGame1_image.png" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									รูปภาพสไลด์ จะอยู่ในส่วนรายละเอียดของสินค้า เพื่อให้ลูกค้ามีส่วนในการตัดสินใจ
									</small>
							</div>
							</p>
							<br>
							
							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">รูปภาพสไลด์ รูปที่ 2
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_image2" value="Empty_imageGame2_image.png" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									รูปภาพสไลด์ จะอยู่ในส่วนรายละเอียดของสินค้า เพื่อให้ลูกค้ามีส่วนในการตัดสินใจ
									</small>
							</div>
							</p>
							<br>
			
							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">รูปภาพสไลด์ รูปที่ 3
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_image3" value="Empty_imageGame3_image.png" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									รูปภาพสไลด์ จะอยู่ในส่วนรายละเอียดของสินค้า เพื่อให้ลูกค้ามีส่วนในการตัดสินใจ
									</small>
							</div>
							</p>
							<br>
		
							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">รูปภาพสไลด์ รูปที่ 4
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_image4" value="Empty_imageGame4_image.png" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									รูปภาพสไลด์ จะอยู่ในส่วนรายละเอียดของสินค้า เพื่อให้ลูกค้ามีส่วนในการตัดสินใจ
									</small>
							</div>
							</p>
							<br>

							<p style="max-width: 490px; font-size: 18px; margin-bottom: 1px" align="left">รูปภาพสไลด์ รูปที่ 5
							<div class="custom-file" style="max-width: 490px; font-size: 18px" align="left">
									<input type="file" id="filepicture" class="custom-file-input" name="addproduct_image5" value="Empty_imageGame5_image.png" multiple>
									<label class="custom-file-label" for="filepicture">ไม่ได้เลือกไฟล์ใด</label>
									<small class="form-text text-muted">
									รูปภาพสไลด์ จะอยู่ในส่วนรายละเอียดของสินค้า เพื่อให้ลูกค้ามีส่วนในการตัดสินใจ
									</small>
							</div>
							</p>
							<br>
						
					</div>
			  	</div>
			  	<div class="modal-footer" style="border: 0px">
					<button type="submit" class="btn btn-outline-success">บันทึกการแก้ไข</button>
				</form>
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">ยกเลิก</button>
				</div>
			</div>
		</div>
	</div>