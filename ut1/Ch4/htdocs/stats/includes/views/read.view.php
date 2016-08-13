<?php require_once(VIEW_PATH.'header.inc.php'); ?>
	<h3><?php echo $stat->player; ?></h3>
	<table>
	<th>Year</th><th>GP</th><th>AB</th><th>R</th><th>H</th><th>HR</th><th>RBI</th><th>Salary</th><th>Bio</th><th>Update</th><th>Delete</th>
    

    <tr><td><?php echo $stat->YR; ?></td>
    <td><?php echo $stat->GP; ?></td>  
    <td><?php echo $stat->AB; ?></td>  
    <td><?php echo $stat->R; ?></td>  
    <td><?php echo $stat->H; ?></td>  
    <td><?php echo $stat->HR; ?></td>  
    <td><?php echo $stat->RBI; ?></td>  
    <td><?php echo $stat->Salary; ?></td>  
    <td><?php echo $stat->Bio; ?></td>  

    
    <td><a href="update.php?id=<?php echo $stat->id; ?>">Update</a></td>  
    <td><a href="delete.php?id=<?php echo $stat->id; ?>" onClick = "javascript: return confirm('Are you sure you want to delete?');">Delete</a></td></tr>  
     </table>

<?php require_once(VIEW_PATH.'footer.inc.php'); ?>