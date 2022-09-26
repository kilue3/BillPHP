<form method="POST" action="" style="margin-bottom: 0">
	<div class="card CardBGSetting" style="margin-bottom: 15px; border: 1px solid #3e3e3e; border-radius: 10px">
		<!----- Start พื้นหลัง ----->
		<div class="card-body CardBodyBGSetting">
			<div class="row">
				<div class="col-6">
					<h5 align="left" style="margin-top: 10px; margin-bottom: 0">ข้อมูลสินค้า</h5>
				</div>
				<div class="col-6" align="right">
					<button type="submit" class="btn btn-success">
						<img class="Button-icon" src="image/Buttonicon/save_white.png">
						บันทึกการแก้ไข
					</button>
				
				</div>
			</div>

			<?php
			require( "Factor/ConnectDatabase.php" );

			if ( isset( $_POST[ 'addproduct_pname' ] ) ):
				require( "Factor/ConnectDatabase.php" );
			$sql = "UPDATE `product` SET `p_name`= :p_name, `p_amount`= :p_amount, `p_producer`= :p_producer, `p_group`= :p_group, `p_status`= :p_status WHERE p_id=:p_id";

			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':p_id', $_GET[ 'p_id' ] );

			$stmt->bindParam( ':p_name', $_POST[ 'addproduct_pname' ] );
			$stmt->bindParam( ':p_amount', $_POST[ 'addproduct_pamout' ] );
			$stmt->bindParam( ':p_producer', $_POST[ 'addproduct_producer' ] );
			$stmt->bindParam( ':p_group', $_POST[ 'addproduct_group' ] );
			$stmt->bindParam( ':p_status', $_POST[ 'addproduct_status' ] );

			if ( $stmt->execute() ):
				?>

			<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong style="font-size: 18px">บันทึกการแก้ไขขอมูลสำเร็จ!</strong><br> หมายเหตุ : ข้อมูลถูกบันทึกใน Database แล้ว แต่ข้อมูลในหน้านี้จะยังไม่เปลี่ยนแปลง จนกว่าจะรีเฟรชหน้านี้
			</div>
			<?php else : ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong>แก้ไขข้อมูลสินค้าไม่สำเร็จ โปรดลองใหม่อีกครั้ง</strong>
			</div>
			<?php endif;
													
															$conn = null;
														endif;
													?>

			<div class="LineBetween"></div>
			<p style="max-width: 490px; font-size: 18px" align="left">ชื่อสินค้า<br>
				<input class="form-control" type="text" placeholder="ชื่อสินค้า" maxlength="35" name="addproduct_pname" value="<?php echo $result[" p_name "]; ?>" required/>
				<small class="form-text text-muted">
															พิมพ์ตัวอักษรได้สูงสุด 35 ตัวอักษร
														</small>
			



			</p>

			<div class="form-row" style="max-width: 500px; font-size: 18px; margin-bottom: 10px" align="left">
				<div class="form-group col-sm-6" style="margin-bottom: 0">จำนวนสินค้า
					<input class="form-control" type="number" placeholder="จำนวนสินค้า" maxlength="5" name="addproduct_pamout" value="<?php echo $result[" p_amount "]; ?>" required/>
					<small class="form-text text-muted">
																จำนวนสินค้าที่มีอยู่ในคลังสินค้า
															</small>
				



				</div>
				<div class="form-group col-sm-6" style="margin-bottom: 0">สถานะการมองเห็น
					<div class="form-group">
						<select class="form-control" id="FormSelectGroup" name="addproduct_status" value="<?php echo $result[" p_status "]; ?>">
							<?php if ($result["p_status"] == "มองเห็นได้") { ?>
							<option>มองเห็นได้</option>
							<option>ปิดการมองเห็น</option>
							<?php } else if ($result["p_status"] == "ปิดการมองเห็น") { ?>
							<option>ปิดการมองเห็น</option>
							<option>มองเห็นได้</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>

			<div class="form-row" style="max-width: 500px; font-size: 18px;" align="left">
				<div class="form-group col-sm-6" style="margin-bottom: 0">แพลตฟอร์ม
					<div class="form-group">
						<select class="form-control" id="FormSelectProducer" name="addproduct_producer">
							<?php if ($result["p_producer"] == "Steam") { ?>
							<option>Steam</option>
							<option>Origin</option>
							<option>Microsoft</option>
							<?php } else if ($result["p_producer"] == "Origin") { ?>
							<option>Origin</option>
							<option>Steam</option>
							<option>Microsoft</option>
							<?php } else if ($result["p_producer"] == "Microsoft") { ?>
							<option>Microsoft</option>
							<option>Steam</option>
							<option>Origin</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group col-sm-6" style="margin-bottom: 0">หมวดหมู่
					<div class="form-group">
						<select class="form-control" id="FormSelectGroup" name="addproduct_group">
							<?php if ($result["p_group"] == "Normal") { ?>
							<option>Normal</option>
							<option>Spacial Discount</option>
							<option>Recommended Game</option>
							<?php } else if ($result["p_group"] == "Spacial Discount") { ?>
							<option>Spacial Discount</option>
							<option>Normal</option>
							<option>Recommended Game</option>
							<?php } else if ($result["p_group"] == "Recommended Game") { ?>
							<option>Recommended Game</option>
							<option>Normal</option>
							<option>Spacial Discount</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<form method="POST" action="" style="margin-bottom: 0">
	<div class="card CardBGSetting" style="margin-bottom: 15px; border: 1px solid #3e3e3e; border-radius: 10px;">
		<!----- Start พื้นหลัง ----->
		<div class="card-body CardBodyBGSetting">
			<div class="row">
				<div class="col-6">
					<h5 align="left" style="margin-top: 10px; margin-bottom: 0">ราคา</h5>
				</div>
				<div class="col-6" align="right">
					<button type="submit" class="btn btn-success">
																<img class="Button-icon" src="image/Buttonicon/save_white.png">
																บันทึกการแก้ไข
															</button>
				



				</div>
			</div>

			<?php
			require( "Factor/ConnectDatabase.php" );

			if ( isset( $_POST[ 'addproduct_tzsprice' ] ) ):
				require( "Factor/ConnectDatabase.php" );
			$sql = "UPDATE `product` SET `p_producer_price`= :p_producer_price,`p_sale_price`= :p_sale_price, `p_tzs_price`= :p_tzs_price WHERE p_id=:p_id";

			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':p_id', $_GET[ 'p_id' ] );

			$stmt->bindParam( ':p_producer_price', $_POST[ 'addproduct_producerprice' ] );
			$stmt->bindParam( ':p_sale_price', $_POST[ 'addproduct_saleprice' ] );
			$stmt->bindParam( ':p_tzs_price', $_POST[ 'addproduct_tzsprice' ] );

			if ( $stmt->execute() ):
				?>

			<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong style="font-size: 18px">บันทึกการแก้ไขขอมูลสำเร็จ!</strong><br> หมายเหตุ : ข้อมูลถูกบันทึกใน Database แล้ว แต่ข้อมูลในหน้านี้จะยังไม่เปลี่ยนแปลง จนกว่าจะรีเฟรชหน้านี้
			</div>
			<?php else : ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong>แก้ไขข้อมูลสินค้าไม่สำเร็จ โปรดลองใหม่อีกครั้ง</strong>
			</div>
			<?php endif;
													
															$conn = null;
														endif;
													?>

			<div class="LineBetween"></div>
			<p style="max-width: 490px; font-size: 18px" align="left">ราคาสินค้าปกติ
				<input class="form-control" type="number" placeholder="ราคาสินค้าปกติ" maxlength="5" name="addproduct_tzsprice" value="<?php echo $result["p_tzs_price"]; ?>" required/>
				<small class="form-text text-muted">
					ราคาสินค้าที่ต้องการขายภายในเว็บไซต์นี้
				</small>
			</p>

			<p style="max-width: 490px; font-size: 18px" align="left">ราคาสินค้าในช่วงโปรโมชั่น
				<input class="form-control" type="number" placeholder="ราคาสินค้าในช่วงโปรโมชั่น" maxlength="5" name="addproduct_saleprice" value="<?php echo $result["p_sale_price"]; ?>" required/>
				<small class="form-text text-muted">
					ราคาสินค้าที่ต้องการขายภายในเว็บไซต์นี้ ในช่วงลดราคา หากไม่มีให้ใส่เลข 0
				</small>
			</p>

			<p style="max-width: 490px; font-size: 18px" align="left">ราคาจากแพลตฟอร์ม
				<input class="form-control" type="number" placeholder="ราคาสินค้าจากแพลตฟอร์ม" maxlength="5" name="addproduct_producerprice" value="<?php echo $result[" p_producer_price "]; ?>" required/>
				<small class="form-text text-muted">
					ราคาสินค้าจากแพลตฟอร์มของเกมนั้น ๆ ใช้เพื่อนำมาเปรียบเทียบราคาให้กับลูกค้า
				</small>
			</p>
		</div>
	</div>
</form>

<form method="POST" action="" style="margin-bottom: 0">
	<div class="card CardBGSetting" style="margin-bottom: 15px; border: 1px solid #3e3e3e; border-radius: 10px;">
		<!----- Start พื้นหลัง ----->
		<div class="card-body CardBodyBGSetting">
			<div class="row">
				<div class="col-6">
					<h5 align="left" style="margin-top: 10px; margin-bottom: 0">คำอธิบายของสินค้า</h5>
				</div>
				<div class="col-6" align="right">
					<button type="submit" class="btn btn-success">
																<img class="Button-icon" src="image/Buttonicon/save_white.png">
																บันทึกการแก้ไข
															</button>
				



				</div>
			</div>

			<?php
			require( "Factor/ConnectDatabase.php" );

			if ( isset( $_POST[ 'addproduct_detail' ] ) ):
				require( "Factor/ConnectDatabase.php" );
			$sql = "UPDATE `product` SET `p_detail`= :p_detail, `p_system_require`= :p_system_require WHERE p_id=:p_id";

			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':p_id', $_GET[ 'p_id' ] );

			$stmt->bindParam( ':p_detail', $_POST[ 'addproduct_detail' ] );
			$stmt->bindParam( ':p_system_require', $_POST[ 'addproduct_system_require' ] );
			if ( $stmt->execute() ): ?>
			<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong style="font-size: 18px">บันทึกการแก้ไขขอมูลสำเร็จ!</strong><br> หมายเหตุ : ข้อมูลถูกบันทึกใน Database แล้ว แต่ข้อมูลในหน้านี้จะยังไม่เปลี่ยนแปลง จนกว่าจะรีเฟรชหน้านี้
			</div>
			<?php else : ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong>แก้ไขข้อมูลสินค้าไม่สำเร็จ โปรดลองใหม่อีกครั้ง</strong>
			</div>
			<?php endif;
																$conn = null;
															endif;
													?>

			<div class="LineBetween"></div>

			<p style="max-width: 490px; font-size: 18px" align="left">คำอธิบายของสินค้า
				<textarea class="form-control" style="min-height:110px" type="text" maxlength="500" placeholder="คำอธิบายของเกม" name="addproduct_detail">
					<?php echo $result["p_detail"]; ?>
				</textarea>
				<small class="form-text text-muted">
					พิมพ์ตัวอักษรได้สูงสุด 500 ตัวอักษร
				</small>
			</p>

			<p style="max-width: 490px; font-size: 18px" align="left">ความต้องการของระบบ
				<textarea class="form-control" style="min-height:110px" type="text" maxlength="500" placeholder="ความต้องการของระบบ" name="addproduct_system_require">
					<?php echo $result["p_system_require"]; ?>
				</textarea>
				<small class="form-text text-muted">
					พิมพ์ตัวอักษรได้สูงสุด 500 ตัวอักษร
				</small>
			</p>
		</div>
	</div>
</form>

<form method="POST" action="" style="margin-bottom: 0">
	<div class="card CardBGSetting" style="margin-bottom: 15px; border: 1px solid #3e3e3e; border-radius: 10px">
		<!----- Start พื้นหลัง ----->
		<div class="card-body CardBodyBGSetting">
			<div class="row">
				<div class="col-6">
					<h5 align="left" style="margin-top: 10px; margin-bottom: 0">วีดีโอ</h5>
				</div>
				<div class="col-6" align="right">
					<button type="submit" class="btn btn-success">
																<img class="Button-icon" src="image/Buttonicon/save_white.png">
																บันทึกการแก้ไข
															</button>
				



				</div>
			</div>

			<?php
			require( "Factor/ConnectDatabase.php" );

			if ( isset( $_POST[ 'addproduct_youtubevideo' ] ) ):
				require( "Factor/ConnectDatabase.php" );
			$sql = "UPDATE `product` SET `p_youtubevideo`= :p_youtubevideo WHERE p_id=:p_id";

			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':p_id', $_GET[ 'p_id' ] );

			$stmt->bindParam( ':p_youtubevideo', $_POST[ 'addproduct_youtubevideo' ] );
			if ( $stmt->execute() ): ?>
			<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong style="font-size: 18px">บันทึกการแก้ไขขอมูลสำเร็จ!</strong><br> หมายเหตุ : ข้อมูลถูกบันทึกใน Database แล้ว แต่ข้อมูลในหน้านี้จะยังไม่เปลี่ยนแปลง จนกว่าจะรีเฟรชหน้านี้
			</div>
			<?php else : ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong>แก้ไขข้อมูลสินค้าไม่สำเร็จ โปรดลองใหม่อีกครั้ง</strong>
			</div>
			<?php endif;
															$conn = null;
														endif;
													?>

			<div class="LineBetween"></div>
			<p style="max-width: 490px; font-size: 18px" align="left">ลิงค์วีดีโอาก Youtube
				<input class="form-control" type="text" placeholder="ลิงค์วีดีโอจาก Youtube" maxlength="50" name="addproduct_youtubevideo" value="<?php echo $result[" p_youtubevideo "]; ?>" required/>
				<small class="form-text text-muted">
					พิมพ์ตัวอักษรได้สูงสุด 50 ตัวอักษร
				</small>
			</p>

			<p style="max-width: 490px; font-size: 18px" align="left">วิธีคัดลอกลิงค์จาก Youtube<br> ให้คัดลอกลิงค์จากด้านหลังของ www.youtube.com/watch?v=
				<img class="ImgResponsive" src="image\AdminPage\youtubelink.png">
			</p>
		</div>
	</div>
</form>

<form method="POST" action="" style="margin-bottom: 0">
	<div class="card CardBGSetting" style="margin-bottom: 15px; border: 1px solid #3e3e3e; border-radius: 10px">
		<!----- Start พื้นหลัง ----->
		<div class="card-body CardBodyBGSetting">
			<div class="row">
				<div class="col-6">
					<h5 align="left" style="margin-top: 10px; margin-bottom: 0">รูปภาพ</h5>
				</div>
				<div class="col-6" align="right">
					<button type="submit" class="btn btn-success">
																<img class="Button-icon" src="image/Buttonicon/save_white.png">
																บันทึกการแก้ไข
															</button>
				



				</div>
			</div>

			<?php
			require( "Factor/ConnectDatabase.php" );

			if ( isset( $_POST[ 'addproduct_pname' ] ) ):
				require( "Factor/ConnectDatabase.php" );
			$sql = "UPDATE `product` SET `p_header_image`= :p_header_image, `p_logo`= :p_logo, `p_image1`= :p_image1, 
														`p_image2`= :p_image2, `p_image3`= :p_image3, `p_image4`= :p_image4, `p_image5`= :p_image5 WHERE p_id=:p_id";

			$stmt = $conn->prepare( $sql );
			$stmt->bindParam( ':p_id', $_GET[ 'p_id' ] );

			$stmt->bindParam( ':p_header_image', $_POST[ 'addproduct_header_image' ] );
			$stmt->bindParam( ':p_logo', $_POST[ 'addproduct_logo' ] );
			$stmt->bindParam( ':p_image1', $_POST[ 'addproduct_image1' ] );
			$stmt->bindParam( ':p_image2', $_POST[ 'addproduct_image2' ] );
			$stmt->bindParam( ':p_image3', $_POST[ 'addproduct_image3' ] );
			$stmt->bindParam( ':p_image4', $_POST[ 'addproduct_image4' ] );
			$stmt->bindParam( ':p_image5', $_POST[ 'addproduct_image5' ] );
			if ( $stmt->execute() ): ?>
			<div class="alert alert-success" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong style="font-size: 18px">บันทึกการแก้ไขขอมูลสำเร็จ!</strong><br> หมายเหตุ : ข้อมูลถูกบันทึกใน Database แล้ว แต่ข้อมูลในหน้านี้จะยังไม่เปลี่ยนแปลง จนกว่าจะรีเฟรชหน้านี้
			</div>
			<?php else : ?>
			<div class="alert alert-danger" role="alert" style="margin-top: 10px; margin-bottom: 10px" align="left">
				<strong>แก้ไขข้อมูลสินค้าไม่สำเร็จ โปรดลองใหม่อีกครั้ง</strong>
			</div>
			<?php endif;
															$conn = null;
														endif;
													?>

			<div class="LineBetween"></div>
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
		</div>
	</div>
</form>