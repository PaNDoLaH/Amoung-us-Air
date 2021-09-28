<?php 
include 'server.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Among Us Airline</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min3.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style3.css" />
	<style>
		* {box-sizing: border-box;}
		
	</style>


</head>
<div class="header">
	<img src="images/logo.png">
		<div class="header-right">
			<div class="sign_btn">
				<a href="login.php" class="button">LOG IN</a>
			</div>
		</div>
	</div>
	
<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container" >
				<div class="row">
					<div class="booking-form">
						<form>
							<div class="form-group">
								<div class="form-checkbox">
								<label for="one-way">
										<input type="radio" id="one-way" name="trip" value="2" checked>
										One way<span></span>
										
									</label>
									<label for="roundtrip">
										<input type="radio" id="roundtrip" name="trip" value="1">
										Roundtrip <span></span>
										
									</label>

									
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Departure Airport</span>
										<div class="col-md-12">
                                            <select  name="departure_airport_id" id="departure_location" placeholder="City or airport" class="form-control">
                                                <option value=""></option>
                                            <?php
                                                $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while($row = $airport->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Arrival Airport</span>
										<div class="col-md-12">
                                        
                                            <select name="arrival_airport_id" id="arrival_airport_id" class="form-control">

                                                <option value=""></option>

                                            <?php
                                                $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while($row = $airport->fetch_assoc()):
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
		
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Departing</span>
										<input class="form-control" type="date" name="date" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group" >
										<label for="" class="form-label">Returning</label>
										<input class="form-control" type="date" name="date_return" autocomplete="off" required>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">Adults (18+)</span>
										<select class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
											<option>8</option>
											<option>9</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">Children(0-17)</span>
										<select class="form-control">
											<option>0</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Travel class</span>
										<select class="form-control">
											<option>Economy class</option>
											<option>Business class</option>
											<option>First class</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Show flights</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        })
        $('.select2').select2({
            placeholder:'Select Departure',
            width:'100%'
        })
        $('[name="trip"]').on("keypress change keyup",function(){
            if($(this).val() == 1){
                $('#rdate').hide()
            }else{
                $('#rdate').show()
            }
        })
    </script>
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>