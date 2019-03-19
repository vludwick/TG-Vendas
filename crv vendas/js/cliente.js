function cliente(data)
{// DECLARAÇÕES
		var idcli 		= data.dados.idcli;
		var nome 		= data.dados.nome;
		var cpf 		= data.dados.cpf;
		var data_nasc 	= data.dados.nasc;
		var sexo 		= data.dados.sexo;
		var idade		= data.dados.idade;

		var endObj = JSON.parse(data.dados.endereco);
		var telObj = JSON.parse(data.dados.tel);
		var emailObj = JSON.parse(data.dados.email);
		var matriculaObj = JSON.parse(data.dados.matricula);

		for (i = 0; i < endObj["lista"].length; i++)
		{
			var idend 	= endObj["lista"][i]["CLI_END_ID"];
			var logra 	= endObj["lista"][i]["CLI_END_LOGRA"];
			var bairro  = endObj["lista"][i]["CLI_END_BAIRRO"];
			var cidade  = endObj["lista"][i]["CLI_END_CIDADE"];
			var cep 	= endObj["lista"][i]["CLI_END_CEP"];
			var uf  	= endObj["lista"][i]["CLI_END_UF"];

			$("#enderecotabela").append(
				`<tr>
						<td class="tabledit-view-mode"><span class="tabledit-span" style=""><span class="validate_address"><i class=" mdi mdi-checkbox-marked-circle-outline" data-id_endereco="`+idend+`" style="font-size: 19px;"></i></span></td>
						<td class="tabledit-view-mode"><span class="tabledit-span" style="">`+logra+`</span></td>
						<td class="tabledit-view-mode"><span class="tabledit-span" style="">`+bairro+`</span></td>
						<td class="tabledit-view-mode"><span class="tabledit-span" style="">`+cidade+`</span></td>
						<td class="tabledit-view-mode"><span class="tabledit-span" style="">`+cep+`</span></td>
						<td class="tabledit-view-mode"><span class="tabledit-span" style="">`+uf+`</span></td>
				</tr>`
				);
		}

		for (i = 0; i < telObj["lista"].length; i++)
		{
			var idtel 	= telObj["lista"][i]["CLI_FONE_ID"];
			var telefone 	= telObj["lista"][i]["CLI_FONE"];

			$("#telefonetabela").append(
			   `<td class="tabledit-view-mode"><span class="tabledit-span" style="">
				<span class="validate_whatsapp"><i data-id_phone="'`+idtel+`'" class=" mdi mdi-checkbox-marked-circle-outline" style="font-size: 19px;"></i></span>
				<i class="mdi mdi-whatsapp" style="font-size: 19px; color: #25D366; margin-right: 10px;"></i></span>
				<span class="validate_phone"><i data-id_phone="`+idtel+`'" class=" mdi mdi-checkbox-marked-circle-outline" style="font-size: 19px;"></i></span>
				<span class="telefone" id="telefone">`+telefone+`</a></span></td>`
			);
			// $("#telefone").mask("(99)99999-9999");
		}

		for (i = 0; i < emailObj["lista"].length; i++)
		{
			var idemail = emailObj["lista"][i]["CLI_EMAIL_ID"];
			var email 	= emailObj["lista"][i]["CLI_EMAIL"];

			$("#emailtabela").append(
			   `<td class="tabledit-view-mode">
					<span class="tabledit-span" style="">
						<i class="mdi mdi-email" style="font-size: 19px;"></i>`+email+`
					</span>
				</td>`
			);
		}

		for (i = 0; i < matriculaObj["lista"].length; i++)
		{
			var idben 			    = matriculaObj["lista"][i]["CLI_BEN_ID"];
			var ben_nb 		        = matriculaObj["lista"][i]["CLI_BEN_NB"];
			var ben_dib  	        = matriculaObj["lista"][i]["CLI_BEN_DIB"];
			var ben_salario         = matriculaObj["lista"][i]["CLI_BEN_SALARIO"];
			var ben_especie 	    = matriculaObj["lista"][i]["CLI_BEN_ESPECIE"];
			var ben_margem  	    = matriculaObj["lista"][i]["CLI_BEN_MARGEM"];
			var ben_banco_recebe    = matriculaObj["lista"][i]["CLI_BEN_BANCO_RECEBE"];
			var ben_agencia_recebe 	= matriculaObj["lista"][i]["CLI_BEN_AGENCIA_RECEBE"];
			var ben_conta_recebe 	= matriculaObj["lista"][i]["CLI_BEN_CONTA_RECEBE"];


			var idft		 	    = matriculaObj["lista"][i]["FT_ID"];
			var ft_num_parc  	    = matriculaObj["lista"][i]["FT_NUM_PARC"];
			var ft_fator		    = matriculaObj["lista"][i]["FT_FATOR"];
			var ft_banco    	 	= matriculaObj["lista"][i]["FT_BANCO"];
			var calculo_novo	 	= matriculaObj["lista"][i]["CACULO_NOVO"];
			var calculo_novo_banco 	= matriculaObj["lista"][i]["CALCULO_NOVO_BANCO"];

			let  formatter = new Intl.NumberFormat('pt-BR', {
					style: 'currency',
					currency: 'BRL',
					minimumFractionDigits: 2
				})

			$(".matriculastabela").append(
				`<td class="tabledit-view-mode"><span class="tabledit-span" style="">NB: `+ben_nb+` </span></td>
				 <td class="tabledit-view-mode"><span class="tabledit-span" style="">Data Inicio: `+ben_dib+`</span></td>
				 <td class="tabledit-view-mode"><span class="tabledit-span" style="">Espécie: `+ben_especie+`</span></td>
				 <td class="tabledit-view-mode"><span class="tabledit-span" style="">Salario: `+ben_salario+`</span></td>`
				);

			$(".matbancotabela").append(
				`<td class="tabledit-view-mode"><span class="tabledit-span" style="">Banco: `+ben_banco_recebe+` </span></td>
				 <td class="tabledit-view-mode"><span class="tabledit-span" style="">Agência: `+formatter.format(ben_agencia_recebe)+`</span></td>
				 <td class="tabledit-view-mode"><span class="tabledit-span" style="">Conta Corrente:`+ben_conta_recebe+`</span></td>`
				);

			$("#tab_novo_head").html(
				`<th class="thtable" id="novocabe">`+calculo_novo_banco+`</th>`
			);

			$("#tab_novo_td").html(
				`<a href="#" class="parcelamento_valor btn btn-soft-info tdbutton">`+formatter.format(calculo_novo)+`</a>`
			);
			$("#novo_margem").val(Math.round(parseFloat(ben_margem.replace(",","."))));

			$('#prazo_novo').change((e) => {
				let parcela_novo =  $('#prazo_novo').val();
				if(parseInt(ft_num_parc) == parseInt(parcela_novo))
				{
					console.log(parcela_novo);
				}
			});
			 //<td class="tabledit-view-mode"><span class="tabledit-span" style="">NB: '.$cli_nb.' </span></td>
		}
		$('#cliNome').html("Nome: "+nome);
		$('.nomedetalhe').html("Detalhamento "+nome);
		$('#cpf').html("CPF: "+cpf);
		$('#nasc').html("Data de Nascimento: "+data_nasc);
		$('#sexo').html("Sexo: "+sexo);
		$('#idade').html("Idade: "+idade);
		$('#cliMatricula').html("Ver Matrícula");
		$('#idcli').val(idcli);
}