 
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Employees</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 	<!-- Optional theme -->
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
 	<script src="
https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 	<!-- Latest compiled and minified JavaScript -->
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<style type="text/css">
 		body{
 		  padding:20px 20px;
 		}

 		.results tr[visible='false'],
 		.no-result{
 		  display:none;
 		}

 		.results tr[visible='true']{
 		  display:table-row;
 		}

 		.counter{
 		  padding:8px; 
 		  color:#ccc;
 		}
 	</style>
 </head>
 <body>
<?php if (isset($data) && !empty($data)): ?>
<div class="form-group">
    <input type="text" class="search form-control" placeholder="Search Employees">
</div>
<span class="counter pull-right"></span>
	<table class="table table-hover table-bordered results">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th class="col-md-5 col-xs-5">firstName</th>
	      <th class="col-md-4 col-xs-4">lastName</th>
	      <th class="col-md-3 col-xs-3">age</th>
	      <th class="col-md-5 col-xs-5">country</th>
	      <th class="col-md-4 col-xs-4">bankAccountNumber</th>
	      <th class="col-md-3 col-xs-3">creditCardNumber</th>
	      <th class="col-md-5 col-xs-5">phones</th>
	      <th class="col-md-4 col-xs-4">address</th>
	      <th class="col-md-3 col-xs-3">email</th>
	      <th class="col-md-5 col-xs-5">city</th>
	      <th class="col-md-5 col-xs-5">Create</th>
	      <th class="col-md-5 col-xs-5">Edit</th>
	      <th class="col-md-5 col-xs-5"><a id="del_employees" class = "btn btn-danger">Delete</a></th>
	    </tr>
	    <tr class="warning no-result">
	      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
	    </tr>
	  </thead> 
	  <?php foreach ($data as $dt => $employee) { ?>
	  	
			  <tbody>
			    <tr class="emp">
			      <th scope="row"><?= $employee["id"]?></th>
				      <td><?= $employee["firstName"]?></td>
				      <td><?= $employee["lastName"]?></td>
				      <td><?= $employee["age"]?></td>
				      <td><?= $employee["country"]?></td>
				      <td><?= $employee["bankAccountNumber"]?></td>
				      <td><?= $employee["creditCardNumber"]?></td>
				      	<td><ul>
				      	<?php if (isset($employee["phone_id"]) && !empty($employee["phone_id"])): ?>
					      	<?php foreach (json_decode($employee["phone_id"],true) as $phone) { ?>
						      	<li>
						      		<?= $phone ?>
						      	</li>
					     	<?php } ?>
					      	</ul>
					     </td> 	
				      	<?php endif; ?>
		            	<td><ul>
		            	<?php if (isset($employee["address_id"]) && !empty($employee["address_id"])): ?>
		      	      	<?php foreach (json_decode($employee["address_id"],true) as $address) { ?>
		      		      	<li>
		      		      		<?= $address ?>
		      		      	</li>
		      	     	<?php } ?>
		      	      	</ul>
		      	     </td> 	
		            	<?php endif; ?>
				      <td><?= $employee["email"]?></td>
				      <td><?= $employee["city"]?></td>
				      <td><a href="employees/createEmployee" class = "btn btn-primary">Create </a></td>
				      <td><a href="employees/<?= $employee["id"]?>/editEmployee" class = "btn btn-primary">Edit </a></td>
				      <td class="text-center"><input class ="checkbox emp" type="checkbox" value="<?= $employee["id"]?>"></td>
			    </tr>
			  </tbody>
	  <?php } ?>
	</table>

<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function() {
	  $(".search").keyup(function () {
	    var searchTerm = $(".search").val();
	    var listItem = $('.results tbody').children('tr');
	    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
	    
	  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
	        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
	    }
	  });
	    
	  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
	    $(this).attr('visible','false');
	  });

	  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
	    $(this).attr('visible','true');
	  });

	  var jobCount = $('.results tbody tr[visible="true"]').length;
	    $('.counter').text(jobCount + ' item');

	  if(jobCount == '0') {$('.no-result').show();}
	    else {$('.no-result').hide();}
			  });
	});
</script>
<script type="text/javascript" src = "/assets/js/ajax.js" ></script>
 </body>
 </html>