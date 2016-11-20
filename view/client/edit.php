<? include("view/header.php"); ?>
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
<br/>
<div class="container">
	<div class="row">
		<h2>Edit</h2>
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="/client/edit/<?= $obj->id; ?>">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="name">Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $obj->name; ?>" id="name" name="name" placeholder="Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="login">Login:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $obj->login; ?>" id="login" name="login" placeholder="Login">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="password">Password:</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" value="" id="password" name="password" placeholder="Enter password">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="person"><?= ($obj->cnpj != "" ? "Legal" : "Physical"); ?>:</label>
			    <div class="col-sm-10">
			      	<? if($obj->cpf != ""): ?>
			      		<input type="number" name="cpf" value="<?= $obj->cpf;?>" id="person" class="form-control"/>
			      	<? else: ?>
			      		<input type="number" name="cnpj" value="<?= $obj->cnpj;?>" id="person" class="form-control"/>
			      	<? endif; ?>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="Submit"  class="btn btn-default">Submit</button>
			    </div>
			  </div>
			  <input type="hidden" name="id" id="id" value="<?= $obj->id; ?>" />
			  <input type="hidden" name="person_id" id="person_id" value="<?= ($obj->p_id == "" ? $obj->l_id : $obj->p_id); ?>" />
			</form>			
		</div>
	</div>
    <div class="row col-md-10 col-md-offset-1 custyle">
	    <table class="table table-striped custab">
		    <thead>
		        <tr>
		            <th>ID</th>
		            <th>Name</th>
		            <th>Login</th>
		            <th>CPF/CNPJ</th>
		            <th class="text-center">Action</th>
		        </tr>
		    </thead>
	    	<tbody id="tbody_list">
	    		<? foreach ($list as $key => $value): ?>
	            <tr class="tr" container="<?= $value->id;?>">
	                <td><?= ($key + 1); ?></td>
	                <td><?= $value->name; ?></td>
	                <td><?= $value->login; ?></td>
	                <td><?= ($value->cpf == "" ? $value->cnpj : $value->cpf); ?></td>
	                <td class="text-center">
	               	<a class='btn btn-primary btn-xs' href="/address/list/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-home"></span> Address
	                </a>
	                <a class='btn btn-default btn-xs' href="/mail/list/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-envelope"></span> Mail
	                </a>	                
	                <a class='btn btn-success btn-xs' href="/phone/list/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-phone"></span> Phone
	                </a>	                
	                <a class='btn btn-info btn-xs' href="/client/edit/<?= $value->id; ?>">
	                	<span class="glyphicon glyphicon-edit"></span> Edit
	                </a> 
	                <a href="/client/delete/<?= $value->id; ?>" class="btn btn-danger btn-xs">
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
<script src="/js/client.js?vs=<?= rand(1,20);?>"></script>