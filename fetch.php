<?php

require_once('connection.php');

$query = "SELECT * FROM tbl_student ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->get_result();
$output = '';
$total_row = $result->num_rows;
$output .= '<table class="table table-bordered table-stripped">
     
      <tr>
        <th>first_name</th>
        <th>last_name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      ';

if ($total_row > 0) {

    while ($row = $result->fetch_array()) {

        $output .= '
	<tr>
		<td>' . $row["first_name"] . '</td>
		<td>' . $row["last_name"] . '</td>
		<td><button type = "button" name = "edit" class = "btn btn-primary btn-xs edit" id = "' . $row["id"] . '">Edit</button></td>
		<td><button type = "button" name = "delete" class = "btn btn-danger btn-xs delete" id = "' . $row["id"] . '">Delete</button></td>
	</tr>
	';
    }
} else {
    $output .= '
	<tr>
		<td colspan="4" text align"center">No Data Found</td>
	</tr>';
}

$output .= '</table>';

echo $output;

?>