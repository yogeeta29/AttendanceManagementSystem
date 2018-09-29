<?php
include('db_con.php');
 
$stmt=$db_con->prepare('select * from books');
$stmt->execute();
 
 
?>
 
<html>
<head>
<title>Export Books Data into Excel Sheet</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="panel">
    <div class="panel-heading">
      <h3>Export Books Data into Excel Sheet</h3>
      <div class="panel-body">
        <table border="1" class="table table-bordered table-striped">
    				<tr>
    					<th>Sr NO.</th>
    					<th width="120">Book Name</th>
    					<th>Book Author</th>
              	<th>Book ISBN</th>
    				</tr>
    			<?php
 
    			while($row=$stmt->FETCH(PDO::FETCH_ASSOC)){
    				echo '
    				<tr>
    					<td>'.$row["book_id"].'</td>
    					<td>'.$row["book_name"].'</td>
    					<td>'.$row["book_author"].'</td>
              <td>'.$row["book_isbn"].'</td>
    				</tr>
    				';
    			}
    			?>
    		</table>
    		<a href="export-book.php">Export To Excel</a>
 
      </div>
 
    </div>
 
  </div>
 
</div>
 
 
 
</body>
</html>