var clinet = {
	init:function(){
		clinet.add();
		clinet.hidenPerson();
		clinet.edit();
	},
	add:function () {
		$("#add").click(function () {
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
	}
}

clinet.init();