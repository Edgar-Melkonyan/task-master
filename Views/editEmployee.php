<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
</head>
<body>
<div class="container">
	<div class="col-md-8 col-md-offset-2">
	<h1 class="text-center">Edit Employee</h1>
<form id = "form" class="form-horizontal"  method="POST">
  <div class="form-group">
  	<input class = "hidden" type="hidden" name="id" value="<?= $data["id"]?>">
    <label class="control-label col-sm-2" >First Name:</label>
    <div class="col-sm-10">
      <input name = "firstName" type="text" class="form-control" value="<?= $data["firstName"]?>"  placeholder="First Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Last Name:</label>
    <div class="col-sm-10"> 
      <input name = "lastName" type="text" class="form-control" value="<?= $data["lastName"]?>"  placeholder="Enter Last Name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Age:</label>
    <div class="col-sm-10"> 
      <input name = "age" type="text" class="form-control" value="<?= $data["age"]?>"  placeholder="Enter Age">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Country:</label>
    <div class="col-sm-10"> 
      <input name = "country" type="text" class="form-control" value="<?= $data["country"]?>" placeholder="Enter Country">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Bank Account Number:</label>
    <div class="col-sm-10"> 
      <input name = "bankAccountNumber" type="text" class="form-control" value="<?= $data["bankAccountNumber"]?>"  placeholder="Enter Bank Account Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Credit Card Number:</label>
    <div class="col-sm-10"> 
      <input name = "creditCardNumber" type="text" class="form-control" value="<?= $data["creditCardNumber"]?>" placeholder="Enter Credit Card Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Phones:</label>
    <div class="col-sm-10"> 
      <?php if (isset($data["phone_id"]) && !empty($data["phone_id"])): ?>
        <?php foreach (json_decode($data["phone_id"],true) as $key => $phone) { ?>
          <input name = "phone_id_<?=$key?>" type="text" class="form-control"  value="<?= $phone?>" placeholder="Enter Phones">
      <?php } ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Address:</label>
    <div class="col-sm-10">
    <?php if (isset($data["address_id"]) && !empty($data["address_id"])): ?>
      <?php foreach (json_decode($data["address_id"],true) as $key => $address) { ?>
        <input name = "address_id_<?=$key?>" type="text" class="form-control"  value="<?= $address?>" placeholder="Enter Address">
    <?php } ?>
    <?php endif; ?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Email:</label>
    <div class="col-sm-10"> 
      <input name = "email"  type="email" class="form-control"  value="<?= $data["email"]?>"  placeholder="Enter Email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">City:</label>
    <div class="col-sm-10"> 
      <input name = "city" type="text" class="form-control"  value="<?= $data["city"]?>" placeholder="Enter City">
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
