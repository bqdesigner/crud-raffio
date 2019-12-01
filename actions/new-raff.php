<?php
session_start();
include_once('verifica-login.php');
include_once('connection.php');

// Pegando o ID do usuário
$id_usuario = $_SESSION['id_usuario'];
$info_usuario = "SELECT * FROM usuarios where id_usuario = '{$id_usuario}'";
$resultado_usuario = mysqli_query($conexao, $info_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

// Tratando o upload da imagem e gravando os dados no banco
if (isset($_POST['enviar'])) {
    // Pegando os dados do Raff
    $nome_raff = $_POST['nome_raff_proj'];
    $categ_raff = $_POST['categ_proj'];
    $desc_ideia = $_POST['desc_proj'];
    $ref = $_POST['ref_proj'];
    $upload = $_FILES['imagem_proj'];
    $consideracao = $_POST['desc_consideracao_proj'];
	$finalizar_raff = $_POST['email_proj'];
	$_SESSION['raff-criado'] = $nome_raff;

    // Se a foto estiver sido selecionada
	if (!empty($upload["name"])) {
		
		// Largura máxima em pixels
		$largura = 1000;
		// Altura máxima em pixels
		$altura = 1000;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000000;
 
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $upload["type"])){
     	   $error[1] = "Isso não é uma imagem.";
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($upload["tmp_name"]);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($upload["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $upload["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "../uploads/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($upload["tmp_name"], $caminho_imagem);
			
			// Inserindo Raff no BD
            $sql = "INSERT INTO novo_raff (id_usuario, nome_projeto, categ_projeto, ideia, ref, upload, consideracao, finalizar_raff, data_criacao) VALUES ('$id_usuario', '$nome_raff','$categ_raff', '$desc_ideia', '$ref', '$nome_imagem', '$consideracao', '$finalizar_raff', NOW())";
            $inserirRaff = mysqli_query($conexao, $sql);
            header('Location: ../criado-com-sucesso.php');
            exit();
                    
			// // Se os dados forem inseridos com sucesso
			// if ($sql){
			// 	echo "Você foi cadastrado com sucesso.";
			// }
		}
    }
}
?>