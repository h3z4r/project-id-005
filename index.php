<?php include('inc/header.php'); ?>


<div class="grid main">


	<div class="grid_4 publishers">
		Publishers
	</div>
	<div class="gird_4 publications">
		Publications
	</div>



	<div class="grid inner inner_text omega">
		<?php

		function get_publishers_all() {

			try {
				$db = new PDO("mysql:host=localhost;dbname=infoflow", "malierdo", "27942794");
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$db->exec("SET NAMES 'utf8'");

			} catch (Exception $e) {
				echo "Could not connect to the database.";
				exit;
			}	

			try {
				$results = $db->query("SELECT name, foundation FROM publishers");

			} catch (Exception $e) {
				echo "Data could not be retrieved from the database.";
				exit;
			}

			$publishers = $results->fetchAll(PDO::FETCH_ASSOC); 

			return $publishers;
		}
		?>

		<?php echo $publishers["name"]; ?>


		<form action="#" method="POST" name="add_publisher_form">
			<fieldset>
				<legend>Important Information</legend>
				<label for="publisher_name">Publisher Name:</label>
				<input type="text" name="publisher_name" id="publisher_name"><br />
				<label for="publisher_name">Foundation:</label>
				<input type="text" name="foundation_year" id="publisher_name"><br />
				<input type="radio" name="distribution" value="international">International<br />
				<input type="radio" name="distribution" value="international">National<br />
			</fieldset><br />

			<fieldset>
				<legend>Optional</legend>
				<select>
					<option>North America</option>
					<option>South America</option>
					<option>Europa</option>
					<option>Asia</option>
					<option>Australia</option>
					<option>Antartica</option>
				</select><br /></fieldset><br />
				<input type="submit" value="Save"><br />



			</form>
		</div>
	</div>



	<?php include('inc/footer.php'); ?>