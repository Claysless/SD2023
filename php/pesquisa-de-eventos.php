<?php 
require_once("custom/php/common.php");

if (!$link)
{
    die('Conexão falhada: '.mysqli_connect_error());
}
else
{
    if($_REQUEST['estado']==NULL)
    {
        echo "
            <form action= '' method='POST'>
                Nome:  <input type='text' name='nome' value='' placeholder=''> <br>";

                
                $q_tipo_evento = "SELECT tipo FROM tabelaEvento";
                $q_tipo_evento_result = query_verification($link,$q_tipo_evento);

                echo "Tipo de Evento: <select name='tipo_evento'>";
                while ($select_value = mysqli_fetch_assoc($q_tipo_evento_result))
                {
                    $subitem_allowed_value_value = $select_value['tipo'];
                    echo "<option value='$subitem_allowed_value_value'>$subitem_allowed_value_value</option><br>";
                }
                echo "</select><br>

                Data: <input type='date' name='data' pattern='[0-9]{4}-[0-9]{2}-[0-9]{2}' placeholder='yyyy-mm-dd'><br>
                
                Localidade:  <input type='text' name='localidade' value='' placeholder=''> <br>
              

                <input type='hidden' name='estado' value='pesquisa'>
                <input type='submit' name='Submit_button' value='Submeter'>                
            </form>";
    }
        
    else
    {
			if($_REQUEST['estado']=="pesquisa")
			{

				$nome = mysqli_real_escape_string($link, $_REQUEST["nome"]);
				$tipo_evento = mysqli_real_escape_string($link, $_REQUEST["tipo_evento"]);
				$data = mysqli_real_escape_string($link, $_REQUEST["data"]);
				$localidade = mysqli_real_escape_string($link, $_REQUEST["localidade"]);

			//QUERY FULL
			if($nome != null && $tipo_evento != null && $data != null && $localidade != null)
			{
				$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "'.$nome.'" AND tipo = "'.$tipo_evento.'" AND data = "'.$data.'" AND localidade LIKE "'.$localidade.'"';
			}

			// //SO NOME
			// else if($nome != null && $tipo_evento == null && $data == null && $localidade == null)
			// {
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "$nome"';
			// }

			//SO TIPO
			else if($nome == null && $tipo_evento != null && $data == null && $localidade == null)
			{
				$query1 = 'SELECT * FROM tabelaEvento WHERE tipo = "'.$tipo_evento.'"';
			}

			// //SO DATA
			// else if($nome == null && $tipo_evento == null && $data != null && $localidade == null)
			// {
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE data = "$data"';
			// }

			// //SO LOCALIDADE
			// else if($nome == null && $tipo_evento == null && $data == null && $localidade != null)
			// {
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE localidade LIKE "$localidade"';
			// }

			//QUERY NOME TIPO
			else if($nome != null && $tipo_evento != null && $data == null && $localidade == null)
			{
				$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "'.$nome.'" AND tipo = "'.$tipo_evento.'"';
			}

			// //QUERY NOME DATA
			// else if($nome != null && $tipo_evento == null && $data != null && $localidade == null)
			// {
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "$nome" AND data = "$data"';
			// }

			// //QUERY NOME LOCALIDADE
			// else if($nome != null && $tipo_evento == null && $data == null && $localidade != null)
			// {
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "$nome" AND localidade LIKE "$localidade"';
			// }

			//QUERY NOME TIPO DATA
			else if($nome != null && $tipo_evento != null && $data != null && $localidade == null)
			{
				$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "'.$nome.'" AND tipo = "'.$tipo_evento.'" AND data = "'.$data.'"';
			}

			// //QUERY NOME DATA LOCALIDADE
			// else if($nome != null && $tipo_evento == null && $data != null && $localidade != null)
			// {
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "$nome" AND data = "$data" AND localidade LIKE "$localidade"';
			// }

			// TIPO DATA
			else if($nome == null && $tipo_evento != null && $data != null && $localidade == null){
				$query1 = 'SELECT * FROM tabelaEvento WHERE tipo = "'.$tipo_evento.'" AND data = "'.$data.'"';
			}

			// TIPO LOCALIDADE
			else if($nome == null && $tipo_evento != null && $data == null && $localidade != null){
				$query1 = 'SELECT * FROM tabelaEvento WHERE tipo = "'.$tipo_evento.'" AND localidade LIKE "'.$localidade.'"';
			}

			//TIPO LOCALIDADE DATA
			else if($nome == null && $tipo_evento != null && $data != null && $localidade != null){
				$query1 = 'SELECT * FROM tabelaEvento WHERE tipo = "'.$tipo_evento.'" AND data = "'.$data.'" AND localidade LIKE "'.$localidade.'"';
			}

			// //DATA LOCALIDADE
			// else if($nome == null && $tipo_evento == null && $data != null && $localidade != null){
			// 	$query1 = 'SELECT * FROM tabelaEvento WHERE data = "$data" AND localidade LIKE "$localidade"';
			// }

			//NOME TIPO LOCALIDADE
			else if($nome != null && $tipo_evento != null && $data == null && $localidade != null){
				$query1 = 'SELECT * FROM tabelaEvento WHERE nome LIKE "'.$nome.'" AND tipo = "'.$tipo_evento.'" AND localidade LIKE "'.$localidade.'"';
			}

				echo'
				<table>
				<thead>
				<tr>
				<th>nome</th>
				<th>tipo de evento</th>
				<th>data</th>
				<th>localidade</th>
				<th>descricao</th>  
				</tr>
				</thead>
				<tbody>
				';

				$query1_result = mysqli_query($link,$query1);
				while ($values = mysqli_fetch_assoc($query1_result))
				{

						echo"
							<tr> 
								<td>".$values['nome']."</td>
								<td>".$values['tipo']."</td>
								<td>".$values['data']."</td>
								<td>".$values['localidade']."</td>
								<td>".$values['descricao']."</td>
							</tr>
						";
				}

				echo'
					</tbody>
					</table>
					';
        }
			}
			
}
?>
