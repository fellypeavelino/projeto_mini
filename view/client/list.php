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
<div class="alert alert-danger invisible">
  <strong>Aviso!</strong> Selecione uma tipo de pesso.
</div>
<div class="container-fluid row">
    <div class="col-md-6 col-md-offset-1 custyle">
	    <table class="table table-striped custab">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Login</th>
		            <th class="text-center">Action</th>
		        </tr>
		    </thead>
	    	<tbody id="tbody_list">
	    		<? foreach ($list as $key => $value): ?>
	            <tr class="tr" container="<?= $value->id;?>">
	                <td><?= ($key + 1); ?></td>
	                <td><?= $value->name; ?></td>
	                <td><?= $value->login; ?></td>
	                <td class="text-center">
	                <a class='btn btn-info btn-xs' href="/client/edit/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-edit"></span> Edit</a> 
	                <a href="/client/delete/<?= $value->id; ?>" class="btn btn-danger btn-xs">
	                	<span class="glyphicon glyphicon-remove"></span> Del</a>
	                </td>
	            </tr>
	        	<? endforeach; ?>
	        </tbody>
	    </table>
    </div>
    <div class="col-md-4">
    	<h3>Add</h3>
		<form class="form-horizontal" id="form_add">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="name">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="login">Login:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="login" name="login" placeholder="Login">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="password">Password:</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="control-label col-sm-2" for="person">Person:</label>
		    <div class="row">
		      <div class="checkbox col-lg-4">
		        <label><input type="radio" class="person" id="legal" name="person"> Legal</label>
		      </div>
		      <div class="checkbox col-lg-4">
		        <label><input type="radio" class="person" id="physical" name="person"> Physical</label>
		      </div>
		      <div class="col-lg-6">
		      	<input type="number" id="person" class="form-control hide"/>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="button" id="add" class="btn btn-default">Submit</button>
		    </div>
		  </div>
		</form>
    </div>
</div>
<? include("view/footer.php"); ?>
<script src="/js/client.js?vs=<?= rand(1,20);?>"></script>