<form action="">
	<div class="row">
		<div class="col-sm-4 col-md-4 col-lg-4 form-group">
			<label for="search" class="sr-only">Search</label>
			<input type="text" class="form-control" id="search" placeholder="Search&#8230;">
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 form-group">
			<label for="search" class="sr-only">Program Series</label>
			<select class="form-control" id="program-series">
				<option selected="selected">Filter by Program Series&#8230;</option>
				<?php 
				$program_series = get_terms( array( 
					'taxonomy' => 'program_series',
					'hide_empty' => false,
				 ) );

				if ( ! empty( $program_series ) && ! is_wp_error( $program_series ) ) {
					foreach ( $program_series as $series ) {
						echo '<option>' . $series -> name . '</option>';
					}
				} ?>
			</select>
		</div>
		<div class="col-sm-4 col-md-4 col-lg-4 form-group">
			<label for="search" class="sr-only">Event Type</label>
			<select class="form-control" id="event-type">
				<option selected="selected">Filter by Event Type&#8230;</option>
				<?php 
				$event_types = get_terms( array( 
					'taxonomy' => 'event_types',
					'hide_empty' => false,
				 ) );

				if ( ! empty( $event_types ) && ! is_wp_error( $event_types ) ) {
					foreach ( $event_types as $event_type ) {
							echo '<option>' . $event_type -> name . '</option>';
					}
				} ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 col-sm-1 col-md-1 col-lg-1">
			<label for="search" class="control-label custom-form-group">From:</label>
		</div>
		<div class="col-xs-9 col-sm-3 col-md-3 col-lg-3">
			<!-- When HTML5 datepickers are implemented natively in all major browsers, remove JQuery UI datepicker, and replace input type="text" with type="date" -->
			<input type="text" class="form-control custom-form-group date" id="from-date" placeholder="From Date">
		</div>
		<div class="col-xs-3 col-sm-1 col-md-1 col-lg-1">
			<label for="search" class="control-label custom-form-group">To:</label>
		</div>
		<div class="col-xs-9 col-sm-3 col-md-3 col-lg-3">
			<!-- See above -->
			<input type="text" class="form-control custom-form-group date" id="to-date" placeholder="To Date">
		</div>
		<div class="col-xs-6 col-sm-2 col-md-2 col-lg-2 col-xs-offset-3 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
			<button class="btn btn-primary form-control custom-form-group" id="filter-button">Filter</button>
		</div>
	</div>
</form>