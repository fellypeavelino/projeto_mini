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
</style>
<br>
<div class="container-fluid row">
    <div class="col-md-6 col-md-offset-1 custyle">
	    <table class="table table-striped custab">
		    <thead>
		    <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new categories</a>
		        <tr>
		            <th>ID</th>
		            <th>Title</th>
		            <th>Parent ID</th>
		            <th class="text-center">Action</th>
		        </tr>
		    </thead>
	    	<tbody>
	            <tr>
	                <td>1</td>
	                <td>News</td>
	                <td>News Cate</td>
	                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>Products</td>
	                <td>Main Products</td>
	                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
	            </tr>
	            <tr>
	                <td>3</td>
	                <td>Blogs</td>
	                <td>Parent Blogs</td>
	                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
	            </tr>
	        </tbody>
	    </table>
    </div>
    <div class="col-md-4">
		<form class="form-horizontal">
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="name">Name:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="name" placeholder="Name">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="login">Login:</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="login" placeholder="Login">
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-2" for="pwd">Password:</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" placeholder="Enter password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label><input type="checkbox"> Remember me</label>
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