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
			<form class="form-horizontal" method="post" action="/phone/_list/<?= $id.'/'.$phone_id; ?>">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="name">Number:</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" value="<?= $phone->phone; ?>" id="number" name="number" placeholder="number">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="Submit"  class="btn btn-default">Submit</button>
			    </div>
			  </div>
			  <input type="hidden" name="id" id="id" value="<?= $phone_id; ?>" />
			</form>			
		</div>
	</div>
    <div class="row col-md-10 col-md-offset-1 custyle">
	    <table class="table table-striped custab">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Number</th>
		            <th class="text-center">Action</th>
		        </tr>
		    </thead>
	    	<tbody id="tbody__list">
	    		<? foreach ($list as $key => $value): ?>
	            <tr class="tr" container="<?= $value->id;?>">
	                <td><?= ($key + 1); ?></td>
	                <td><?= $value->phone; ?></td>
	                <td class="text-center">                
	                <a class='btn btn-info btn-xs' href="/phone/_list/<?= $id; ?>/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-edit"></span> Edit
	                </a> 
	                <a href="/phone/del/<?= $id; ?>/<?= $value->id; ?>" class="btn btn-danger btn-xs">
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
