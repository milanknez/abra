<?php
require_once '../include/header.php';
require_once '../lib/Kendo/Autoload.php';
?>

<div id="example" style="text-align: center;">
	<div class="demo-section k-content wide" style="display: inline-block;">
	<h4>Disable weekends</h4>
	<?php
	$array = array(
		"sa", "su",
	);

	$multiViewCalendar = new \Kendo\UI\MultiViewCalendar('weekend-calendar');

	$multiViewCalendar->disableDates($array);

	echo $multiViewCalendar->render();
	?>

	<h4 style="margin-top:1em">Disable Federal Holidays in USA in 2015</h4>

	<?php
	$multiViewCalendar = new \Kendo\UI\MultiViewCalendar('national-holidays');

	$multiViewCalendar->disableDates('disableDates');

	echo $multiViewCalendar->render();
	?>

	<script>
		function compareDates(date, dates) {
			for (var i = 0; i < dates.length; i++) {
				if (dates[i].getDate() == date.getDate() &&
					dates[i].getMonth() == date.getMonth() &&
					dates[i].getYear() == date.getYear()) {
					return true;
				}
			}
		}
		function disableDates(date) {
			var dates = [
						new Date("1/1/2015"),
						new Date("1/19/2015"),
						new Date("2/16/2015"),
						new Date("4/16/2015"),
						new Date("5/10/2015"),
						new Date("5/25/2015"),
						new Date("6/21/2015"),
						new Date("7/3/2015"),
						new Date("9/7/2015"),
						new Date("10/12/2015"),
						new Date("11/11/2015"),
						new Date("11/26/2015"),
						new Date("11/27/2015"),
						new Date("12/25/2015")
						];
			if (date && compareDates(date, dates)) {
				return true;
			} else {
				return false;
			}
		}
	</script>

	</div>
</div>
<?php require_once '../include/footer.php'; ?>
