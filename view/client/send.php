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
	.tr,.mail_tr{
		cursor:pointer;
	}
</style>
<div class="alert alert-danger <?= ( empty($client) != 1 ? 'invisible': ''); ?>">
  <strong>Aviso!</strong> Cliente não possui email cadastrado.
</div>
<div class="container">
	<div class="row">
		<h2>Send</h2>
		<div class="col-lg-12">
			<form class="form-horizontal" method="post" action="/client/send/<?= $client->id; ?>">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="name">Name:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="<?= $client->name; ?>" id="name" name="name" placeholder="Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="from">From:</label>
			    <div class="col-sm-10">
			      <input type="mail" class="form-control" readonly value="<?= $client->mail; ?>" id="from" name="from" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="to">to:</label>
			    <div class="col-sm-10">
			      <input type="mail" class="form-control" value="" id="to" name="to" placeholder="Enter Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="title">title:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" value="" id="title" name="title" placeholder="Title">
			    </div>
			  </div>			  
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="descrition">Descrition:</label>
			    <div class="col-sm-10">
			      <textarea rows="7" class="form-control" name="descrition" id="descrition" placeholder="Descrition........"></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="Submit"  class="btn btn-default">
					<i class="glyphicon glyphicon-send"></i>
			      	Send
			      </button>
			    </div>
			  </div>
			  <input type="hidden" name="id" id="id" value="<?= $obj->id; ?>" />
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
		            <th>Email</th>
		        </tr>
		    </thead>
	    	<tbody id="mail_list">
	    		<? foreach ($list as $key => $value): ?>
	            <tr class="mail_tr" container="<?= $value->mail;?>">
	                <td><?= ($key + 1); ?></td>
	                <td><?= $value->name; ?></td>
	                <td><?= $value->login; ?></td>
	                <td><?= ($value->mail); ?></td>
	            </tr>
	        	<? endforeach; ?>	    	
	        </tbody>
	    </table>
    </div>
</div>
<? include("view/footer.php"); ?>
<script src="/js/client.js?vs=<?= rand(1,20);?>"></script>