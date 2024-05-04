<!-- Include the necessary styles and scripts for DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Render the users data table -->
{!! $manuDT->table(['class' => 'table table-bordered']) !!}

<!-- Render the orders data table -->
{!! $catDT->table(['class' => 'table table-bordered']) !!}

<!-- Initialize the DataTables -->
{!! $manuDT->scripts() !!}
{!! $catDT->scripts() !!}