<?php //// INICIO CODIGO 

				
    if( !empty($_GET['url']) ){
        $url = explode( "/" , $_GET['url']);
        if( empty($url[count($url)-1]) ){
            unset($url[count($url)-1]);
        }

        switch( $url[0] ){

case 'home': include('home.php');break;

// ALUNOS		
case 'perfil_aluno':
$id = $url[1];
$id2 = $url[2];
include('perfil_aluno.php');break;			

case 'inserir_central':
include('inserir_central.php');break;

case 'cadastro':
include('form_cadastro.php');break;

case 'entradas':
include('form_entradas.php');break;

case 'listar':
include('listar_leads.php');break;    

case 'avisos':
include('avisos.php');break;  

case 'artistas':
include('artistas.php');break;    

case 'contratantes':
include('contratantes.php');break;    

case 'eventos':
include('eventos.php');break;    

case 'vendas':
include('vendas.php');break;    

case 'regioes':
include('regioes.php');break;    

case 'regioes_filtrar':
include('regioes_filtrar.php');break;    

case 'deleta_lead':
$id = $url[1];
include('deleta_lead.php');break;

case 'deleta_contato':
$id = $url[1];
include('deleta_contato.php');break;
  
				
case 'relatorio_reposicao':
include('relatorio_reposicao.php');break;

case 'comentario':
$id = $url[1];
if(isset($url[2]))
    $metodo = $url[2];
if(isset($url[3]))
    $id2 = $url[3];
include('comentario.php');break;
				
case 'gerar_lista_nova':
include('gerar_lista_nova.php');break;					
				
/// remover inicio
			
case 'perfil_unidade2':
$id = $url[1];
include('perfil_unidade2.php');break;	
				
/// remover f
				
case 'sair':
include('sair.php');break;
	
				 /// PAGINA 404
	   default: include('404.php');
        }
    }
	
	?>	