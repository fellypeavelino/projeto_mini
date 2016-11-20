<? include("view/header.php"); ?>
<style>
	.custab{
	    border: 1px solid #ccc;
	    padding: 5px;
	    margin: 5% 0;
	    box-shadow: 3px 3px 2px #ccc;
	    transition: 0.5s;
    }
	.custab:hover{
	    box-shadow: 3px 3px 0px transparent;
	    transition: 0.5s;
	}
	.hide{
		display: none;
	}
	.tr{
		cursor:pointer;
	}
</style>
<br>
<div class="container">
	<div class="row">
		<h2>Add</h2>
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="/address/_list/<?= $id.'/'.$address_id; ?>">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="number">Number:</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" value="<?= $address->number; ?>" id="number" name="number" placeholder="Number">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="street">Street:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $address->street; ?>" id="street" name="street" placeholder="Street">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="district">District:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $address->district; ?>" id="district" name="district" placeholder="District">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="city">City:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $address->city; ?>" id="city" name="city" placeholder="City">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="state">State:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $address->state; ?>" id="state" name="state" placeholder="State">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="Submit"  class="btn btn-default">Submit</button>
			    </div>
			  </div>
			  <input type="hidden" name="id" id="id" value="<?= $address_id; ?>" />
			</form>			
		</div>
	</div>
    <div class="row col-md-10 col-md-offset-1 custyle">
	    <table class="table table-striped custab">
		    <thead>
		        <tr>
		            <th>ID</th>
	                <td>Number</td>
	                <td>Street</td>
	                <td>District</td>
	                <td>City</td>
	                <td>State</td>
		            <th class="text-center">Action</th>
		        </tr>
		    </thead>
	    	<tbody id="tbody__list">
	    		<? foreach ($list as $key => $value): ?>
	            <tr class="tr" container="<?= $value->id;?>">
	                <td><?= ($key + 1); ?></td>
	                <td><?= $value->number; ?></td>
	                <td><?= $value->street; ?></td>
	                <td><?= $value->district; ?></td>
	                <td><?= $value->city; ?></td>
	                <td><?= $value->state; ?></td>
	                <td class="text-center">                
	                <a class='btn btn-info btn-xs' href="/address/_list/<?= $id; ?>/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-edit"></span> Edit
	                </a> 
	                <a href="/address/del/<?= $id; ?>/<?= $value->id; ?>" class="btn btn-danger btn-xs">
	                	<span class="glyphicon glyphicon-remove"></span> Del
	                </a>
	                </td>
	            </tr>
	        	<? endforeach; ?>	    	
	        </tbody>
	    </table>
    </div>
</div>
<? include("view/footer.php"); ?>
