	function getUsuario(){
		$.ajax({
			url: 'http://localhost/app/modules/pousada/controllers/ajax.php',
			method: "GET",
			dataType: 'json'
		}).done(function(result){
			console.log(result);
			$('#sala').empty();
			$('#quarto').empty();			
			for(i = 0 ; i < result.length; i++){
				if(result[i].usuario_local == "sala"){
					$('#sala').prepend(
						'<div class="item">'
						+'<div class="right floated content">'
						+'<button class="ui green icon button">'
						+'<i class="tv icon" id="timer"></i>'+' '+result[i].usuario_canal
						+'</button>'
						+'<button class="ui orange icon button">'
						+'<i class="fas fa-cog fa-spin"></i> Tempo: '+result[i].usuario_tv
						+'</button>'
						+'<button class="ui circular violet icon button">'
						+'<i class="fas fa-gamepad"></i>'+result[i].usuario_controle
						+'</button>'						
						+'</div>'
						+'<img class="ui avatar image" src="'+result[i].usuario_imagem+'">'
						+'<div class="content">'
						+result[i].usuario_nome
						+'</div>'
						+'</div>'
				   ); 
		        }
				if(result[i].usuario_local == "quarto"){
					$('#quarto').prepend(
						'<div class="item">'
						+'<div class="right floated content">'
						+'<button class="ui grey icon button">'
						+'<i class="tv icon"></i>'+' '+result[i].usuario_canal
						+'</button>'
						+'<button class="ui black icon button">'
						+'<i class="fas fa-stroopwafel fa-spin"></i> Tempo: '+result[i].usuario_quarto
						+'</button>'		
						+'</div>'
						+'<img class="ui avatar image" src="'+result[i].usuario_imagem+'">'
						+'<div class="content">'
						+result[i].usuario_nome
						+'</div>'
						+'</div>'
				   ); 					
		        }


			}

		});
	}


setInterval("getUsuario()", 1000);

$(function(){
	getUsuario()
});

//executando terminal no navegador

function getTerminal(){
	$.ajax({
		url: 'http://localhost/app/modules/pousada/controllers/terminal.php',
		method: "GET",
		dataType: 'json'
		}).done(function(result){
			console.log(result);
			$('#terminal').empty();			
			for(i = 0 ; i < result.length; i++){
				$('#terminal').prepend(
				'<div class="item">'
				+'<div class="left floated content"><p>'
				+result[i].log_tempo +'.......'+result[i].log_observacao
				+'</p></div>'
				+'</div>'
			); 

		}

	});
}

setInterval("getTerminal()", 1000);

$(function(){
	getTerminal()
});


