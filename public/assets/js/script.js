$(document).ready(function(){

	var appIndex = $("body").attr("index")

	// chamada global do datatable
	$(".datatable").DataTable()

	// chamada global select2
	$(".select2").select2();
	// chamada global maskmoney
	$(".money").maskMoney()

	// desabilitar input
	$(".enable-input").change(function(){
		if( $(this).is(":checked") != true ){
			$(this).parent().parent().find("input[type=text]").attr("disabled","disabled")
			$(this).parent().parent().find("input[type=number]").attr("disabled","disabled")
		}else{
			$(this).parent().parent().find("input[type=text]").removeAttr("disabled")
			$(this).parent().parent().find("input[type=number]").removeAttr("disabled")
		}
	})

	// controle de categorias/form
	function removeCategory(){
		$(".remove-badget").click(function(){
			$(this).parent().remove()
		})
	}

	removeCategory()
	$(".form-category").find("select").change(function(){
		var id_category = $(this).val()
		var category_name = $(this).find("option:selected").html()
		$(".form-category").find(".response").append('\
			<button type="button" class="btn btn-primary font-weight-bold badge-category">\
			<input type="hidden" name="extension_attributes[category_links][][category_id]" value="'+id_category+'" >\
			' + category_name + ' <span class="badge badge-light remove-badget"><i class="fas fa-times"></i></span>\
			</button>\
		')
		removeCategory()
	})

	// busca de produto ajax
	// form: cadastro e edição de produto
	var product = {};
	$("input[name=keysearch]").keyup(function(){
		if( $(this).val().length > 3 ){
			var searchProductShop9 = $.post(appIndex + "/modules/shop9/controllers/get-product-search-ajax.php",{
				keysearch: $(this).val()
			}).done(function(response){
				var response = $.parseJSON(response)
				if(response.error == false){
					$(".result-search-shop9").empty()
					$(".result-search-shop9").html('<ul class="list-unstyled"></ul>')
					$.each(response.data, function(k,v){
						product.img = "http://integra.amazonasdecoracao.com.br/public/assets/images/amazonas.png";
						product.dimension = "80";
						v.produto_preco = parseFloat((v.produto_preco/100)).toFixed(2);
						$(".result-search-shop9 > ul").append('\
							<li class="media border">\
								<img height="'+product.dimension+'" width="'+product.dimension+'" src="'+product.img+'" class="mr-3 img-thumbnail" alt="...">\
								<div class="media-body">\
									<h5 class="mt-0 mb-1"><a class="text-dark insert-in-form-'+k+'" href="javascript:void(0);">'+v.produto_nome+'</a></h5>\
									<b>Saldo</b>: '+v.produto_estoque+' - <b>Valor</b>: R$ '+v.produto_preco+'\
								</div>\
							</li>\
						')

						$(".insert-in-form-" + k).click(function(){
							$(".item-form-name").val(v.produto_nome)
							$(".item-form-price").val(v.produto_preco)
							$(".item-form-inventory").val(v.produto_estoque)
						})
					})
				}else{
					$(".result-search-shop9").empty()
					$(".result-search-shop9").html('\
						<i class="fas fa-times"></i> '+response.message+'\
					')
				}
			}).fail(function(err){
				console.log(err)
			})
		}else{
			$(".result-search-shop9").empty()
		}
	})
})