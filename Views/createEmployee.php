<!DOCTYPE html>
<html>
<head>
	<title>Create Employee</title>
</head>
<body>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Create Employee</h1>
		
<form id = "createForm" class="form-horizontal"  method="POST">
  <div class="form-group">
  	<input class = "hidden" type="hidden" name="id" value="">
    <label class="control-label col-sm-2" >First Name:</label>
    <div class="col-sm-10">
      <input name = "firstName" type="text" class="form-control" value=""  placeholder="First email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Last Name:</label>
    <div class="col-sm-10"> 
      <input name = "lastName" type="text" class="form-control" value=""  placeholder="Enter Last Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Age:</label>
    <div class="col-sm-10"> 
      <input name = "age" type="text" class="form-control" value=""  placeholder="Enter Age">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Country:</label>
    <div class="col-sm-10"> 
      <input name = "country" type="text" class="form-control" value="" placeholder="Enter Country">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Bank Account Number:</label>
    <div class="col-sm-10"> 
      <input name = "bankAccountNumber" type="text" class="form-control" value=""  placeholder="Enter Bank Account Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Credit Card Number:</label>
    <div class="col-sm-10"> 
      <input name = "creditCardNumber" type="text" class="form-control" value="" placeholder="Enter Credit Card Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Phone 1:</label>
    <div class="col-sm-10"> 
      <input name = "phone_id_0" type="text" class="form-control"  value="" placeholder="Enter Phone">
    </div>
    <label class="control-label col-sm-2" >Phone 2:</label>
    <div class="col-sm-10"> 
      <input name = "phone_id_1" type="text" class="form-control"  value="" placeholder="Enter Phone">
    </div>
    <label class="control-label col-sm-2" >Phone 3 :</label>
    <div class="col-sm-10"> 
      <input name = "phone_id_2" type="text" class="form-control"  value="" placeholder="Enter Phone">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Address 1:</label>
    <div class="col-sm-10"> 
      <input name = "address_id_0" type="text" class="form-control" value="" placeholder="Enter Address">
    </div>
    <label class="control-label col-sm-2" >Address 2:</label>
    <div class="col-sm-10"> 
      <input name = "address_id_1" type="text" class="form-control" value="" placeholder="Enter Address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Email:</label>
    <div class="col-sm-10"> 
      <input name = "email"  type="email" class="form-control"  value=""  placeholder="Enter Email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">City:</label>
    <div class="col-sm-10"> 
      <input name = "city" type="text" class="form-control"  value="" placeholder="Enter City">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default update">Submit</button>
    </div>
  </div>
</form>
	</div>
</div>
</body>
</html>