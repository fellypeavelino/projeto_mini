var clinet = {
	init:function(){
		clinet.add();
		clinet.hidenPerson();
		clinet.edit();
		clinet.clickMail();
	},
	add:function () {
		$("#add").click(function () {
			if($(".person").is( ":checked" )){
				$.ajax({
					url:"/client/addAjax",
					type:"POST",
					data: $("#form_add").serialize(),
					success: function (data) {
						console.log("entro");
						clinet.list10();
					},
					error: function (data) {

					}
				});
			}else{
				$(".invisible").css({"visibility":"visible"});
			}
		});
	},
	hidenPerson:function () {
		$("#legal").click(function(){
			$("#person").removeClass("hide"); 
			$("#person").attr("name","cnpj");
			$("#person").attr("placeholder","CNPJ");
		});
		$("#physical").click(function(){
			$("#person").removeClass("hide"); 
			$("#person").attr("name","cpf");
			$("#person").attr("placeholder","CPF");			
		});
	},
	list10:function() {
		$.ajax({
			url:"/client/listAjax",
			success: function (data) {
				$("#tbody_list").html(data);
			}			
		});
	},
	edit:function () {
		$(".tr").click(function () {
			var container = $(this).attr("container");
			window.location.href = "/client/edit/"+container;
		});
	},
	clickMail:function () {
		$(".mail_tr").click(function () {
			$("#to").val($(this).attr("container"));
		});
	}
}

clinet.init();