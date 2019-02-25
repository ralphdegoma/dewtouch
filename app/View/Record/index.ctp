
<div class="row-fluid">
	<table class="table table-bordered" id="table_records">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>	
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>

<?php $this->start('script_own')?>
<script>
$(document).ready(function(){

	$("#table_records").DataTable({
		searchDelay: 400,
        serverSide: true,
		ajax: {
		    "url": "/Record/data",
		    "dataSrc": "data"
		},
		columns: [
            { "data": "Record.id" },
            { "data": "Record.name" }
        ],
        autoWidth: false,
	    lengthChange: true,
	    ordering: true,
		info: false,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        pageLength: 10,
	});

})
</script>
<?php $this->end()?>