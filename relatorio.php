<?php 
$paciente = $_POST['paciente'];
$germe = $_POST['germe'];
$material = $_POST['material'];
$data = $_POST['data']; 
//$paciente = $_GET['paciente'];
//$germe = $_GET['germe'];
//$material = $_GET['material'];
/* @var $data type */
//$data = $_GET['data'];  
# PRIMEIRAMENTE: INSTALEI A CLASSE NA PASTA FPDF DENTRO DE MEU SITE.  
define('FPDF_FONTPATH','fpdf/font/');   
  
// INSTALA AS FONTES DO FPDF  
require('fpdf/fpdf.php');   
  
// INSTALA A CLASSE FPDF  
class PDF extends FPDF {  
  
// CRIA UMA EXTENSÃO QUE SUBSTITUI AS FUNÇÕES DA CLASSE.   
// SOMENTE AS FUNÇÕES QUE ESTÃO DENTRO DESTE EXTENDS É QUE SERÃO SUBSTITUIDAS.  
  
  
    function Header(){ //CABECALHO  
        global $codigo; // EXEMPLO DE UMA VARIAVEL QUE TERÁ O MESMO VALOR EM QUALQUER ÁREA DO PDF.  
        $l=5; // DEFINI ESTA VARIAVEL PARA ALTURA DA LINHA  
        $this->SetXY(10,10); // SetXY - DEFINE O X E O Y NA PAGINA  
       //$this->Rect(10,10,190,280); // CRIA UM RETÂNGULO QUE COMEÇA NO X = 10, Y = 10 E   
                                    //TEM 190 DE LARGURA E 280 DE ALTURA.   
                                    //NESTE CASO, É UMA BORDA DE PÁGINA.  
        
        
        $this->Image('./img/logo.png',11,15,40); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.  
        $this->Image('./img/CCIH.png',169,11,25); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.  
        $this->SetFont('Arial','',5); // DEFINE A FONTE ARIAL, NEGRITO (B), DE TAMANHO 8  
        $this->Cell(170,5,'ANEXO MA4-3-12',0,0,'L');   
        $this->SetFont('Arial','B',8); // DEFINE A FONTE ARIAL, NEGRITO (B), DE TAMANHO 8  
        $this->Ln(); // QUEBRA DE LINHA  
        $this->Cell(190,10,'HOSPITAL ADVENTISTA DE MANAUS',0,0,'C');   
        // CRIA UMA CELULA COM OS SEGUINTES DADOS, RESPECTIVAMENTE:   
        // LARGURA = 170,   
        // ALTURA = 15,   
        // TEXTO = 'INSIRA SEU TEXTO AQUI'  
        // BORDA = 0. SE = 1 TEM BORDA SE 'R' = RIGTH, 'L' = LEFT, 'T' = TOP, 'B' = BOTTOM  
        // QUEBRAR LINHA NO FINAL = 0 = NÃO  
        // ALINHAMENTO = 'L' = LEFT  
  
        //$this->Cell(20,$l,'Nº '.$codigo,1,0,'C',0);   
        // CRIA UMA CELULA DA MESMA FORMA ANTERIOR MAS COM ALTURA DEFINIDA PELA VARIAVEL $l E   
        // INSERINDO UMA VARIÁVEL NO TEXTO.  
  
        $this->Ln(); // QUEBRA DE LINHA  
        
        $this->Cell(190,0,'COMISSÃO DE CONTROLE DE INFECCAO HOSPITALAR - CCIH',0,0,'C');  
        
        $this->Ln();  
        $this->Cell(190,10,'NOTIFICAÇÃO DE CULTURA POSITIVA',0,0,'C');  
        $l = 17;  
        $this->SetFont('Arial','B',12);  
        $this->SetXY(10,15);  
        //$this->Cell(190,$l,'TITULO','B',1,'C');  
        $l=5;  
        $this->Ln(); 
        $this->Ln(); 
        
    }  
  /*
    function Footer(){ // CRIANDO UM RODAPE  
  
        $this->SetXY(15,280);  
        $this->Rect(10,270,190,20);  
        $this->SetFont('Arial','',10);  
        $this->Cell(70,8,'Assinatura ','T',0,'L');  
        $this->Cell(40,8,' ',0,0,'L');  
        $this->Cell(70,8,'Assinatura','T',0,'L');   
        $this->Ln();  
        $this->SetFont('Arial','',7);  
        $this->Cell(190,7,'Página '.$this->PageNo().' de {nb}',0,0,'C');  
    
    }  
  */
  
}  
        $pdf=new PDF('P','mm','A4'); //CRIA UM NOVO ARQUIVO PDF NO TAMANHO A4  
        $pdf->AddPage(); // ADICIONA UMA PAGINA  
        $pdf->AliasNbPages(); // SELECIONA O NUMERO TOTAL DE PAGINAS, USADO NO RODAPE  
        $pdf->SetFont('Arial','',8);  
        $y = 59; // AQUI EU COLOCO O Y INICIAL DOS DADOS   
         $l=5; // DEFINI ESTA VARIAVEL PARA ALTURA DA LINHA  
        $pdf->Ln(); 
      
        $pdf->SetFont('Arial','B',10);  
        $pdf->Cell(20,$l,'ATENÇÃO!',0,1,'L');  
        $pdf->Cell(20,$l,'Paciente:',0,0,'L');  
        $pdf->Cell(100,$l,$paciente,'B',0,'L');  
        //$pdf->Cell(35,$l,'',0,0,'L');  
        //$pdf->Cell(15,$l,'Data:',0,0,'L');  
        //$pdf->Cell(20,$l,date('d/m/Y'),'B',0,'L'); // INSIRO A DATA CORRENTE NA CELULA  
  
        $pdf->Ln();  
        $pdf->Cell(20,$l,'Germe:',0,0,'L');  
        $pdf->Cell(100,$l,$germe,'B',0,'L');  
        $pdf->Ln();  
        $pdf->Cell(35,$l,'Material da Coleta:',0,0,'L');  
        $pdf->Cell(85,$l,$material,'B',0,'L');  
        
        $pdf->Cell(85,$l,'',0,0,'L');  
        $pdf->Ln();  
        $pdf->Cell(30,$l,'Data da Coleta:',0,0,'L');  
        $pdf->Cell(90,$l,$data,'B',0,'L');  
        $pdf->Ln();  
   
        //FINAL DO CABECALHO COM DADOS  
        //ABAIXO É CRIADO O TITULO DA TABELA DE DADOS  
        $pdf->SetFont('Arial','',10); 
        $pdf->Cell(190,2,'',0,0,'C');   
        //ESPAÇAMENTO DO CABECALHO PARA A TABELA  
        $pdf->Ln();  
        $dados = "Microorganismos (Gram Negativo/ Fermentador – Enterobacter, Enterobacter Sakazakii, SerratiaMarcescens, ProteusMirabilis, MorganellaMorganii, Providencia spp, Salmonellaspp, KlebsiellaPneumoniaeKlebsiellaOxytoca, KlebsiellaOzaenae Escherichia Coli, HafniaAlvei, edwardsiella tarda);(Gram Negativo/ Não Fermentador –PseudomonasAeruginosa, Burkhoderiacepacia, StenotrophomonasMaltophilia, Alcaligenesxylosonidans, Bordetellasp, Chryscobacteriummeningoscptium, Moraxellasp, AcinetobacterBaumanni, Enterococcus faecalis";
        $pdf->MultiCell(0,5,$dados,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        
        $pdf->Ln();
        $dados2 = "O que é? São germes que colonizam o trato gastrointestinal, meio ambiente e água dos circuitos de ventilação...";
        $pdf->MultiCell(0,5,$dados2,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        
        $pdf->Ln();
        $dados3 = "Meios de transmissão: Mãos, estetoscópio, termômetro, esfingnomanometro, ventilador das traquéias com água, produtos contaminados.";
        $pdf->MultiCell(0,5,$dados3,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        
        $pdf->Ln();
        $dados4 = "Meios de transmissão: Mãos, estetoscópio, termômetro, esfingnomanometro, ventilador das traquéias com água, produtos contaminados.";
        $pdf->MultiCell(0,5,$dados4,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        
        $pdf->Ln();
        $dados5 = "Precauções: Lavagem das mãos com água, sabão e álcool gel, uso de luvas, gorros, máscaras, uso de EPI´S necessários, desinfecção com álcool a 70% dos materiais (estetoscópio, termômetro, esfingnomanometro) e retirada da água dos circuitos de ventilação.";
        $pdf->MultiCell(0,5,$dados5,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        
        $pdf->Ln();
        $dados6 = "Isolamento: Todas as pessoas são potencialmente infectadas ou colonizadas com um microorganismo que pode ser transmitido nos serviços de saúde e disseminado durante a assistência prestada pelos profissionais ao paciente.";
        $pdf->MultiCell(0,5,$dados6,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        $pdf->Ln();
        /*
        $pdf->SetTextColor(255,255,255);  
        $pdf->Cell(190,$l,'Titulo 1',1,0,'C',1);  
        $pdf->Ln();  
  
        //TITULO DA TABELA DE SERVIÇOS  
        $pdf->SetFillColor(232,232,232);  
        $pdf->SetTextColor(0,0,0);  
        $pdf->SetFont('Arial','B',8);  
        $pdf->Cell(10,$l,'Titulo 1',1,0,'L',1);  
        $pdf->Cell(31,$l,'Titulo 2',1,0,'l',1);  
        $pdf->Cell(70,$l,'Titulo 3',1,0,'L',1);  
        $pdf->Cell(12,$l,'Titulo 4',1,0,'C',1);  
        $pdf->Cell(12,$l,'Titulo 5',1,0,'C',1);  
        $pdf->Cell(40,$l,'Titulo 6',1,0,'C',1);  
        $pdf->Cell(15,$l,'Titulo 7',1,0,'C',1);  
        $pdf->Ln();  
  */
        $pdf->Cell(190,0,'EQUIPE CCIH',0,0,'C');  
        Header('Pragma: public'); // ESTA FUNÇÃO É USADA PELO FPDF PARA PUBLICAR NO IE  
        $dados = "Teste";
        //DADOS  
            /*$pdf->SetY($y);  
            $pdf->SetX(10);  
            //$pdf->Rect(10,$y,70,5);  
            //$pdf->MultiCell(70,6,$dados,0,2); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
            $pdf->SetFont('Arial','',6);  
        */

        $pdf->AddPage(); // ADICIONA UMA PAGINA  
        $pdf->Image('./img/planilha.png',30,50,150); // INSERE UMA LOGOMARCA NO PONTO X = 11, Y = 11, E DE TAMANHO 40.  
        
          $pdf->Ln();
          $pdf->Ln();
          $pdf->Ln();
          $pdf->Ln();
          $pdf->Ln();$pdf->Ln();
          $pdf->Ln();
          $pdf->Ln();
          $pdf->Ln();
          $pdf->Ln();$pdf->Ln();
          $pdf->Ln();$pdf->Ln();
         
         
        $dados7 = "OBS: A planilha foi escaneada pois a mesma é enviada pelo estado, bem como as fichas de busca ativa.";
        $pdf->MultiCell(0,5,$dados7,0,"J",false); // ESTA É A CELULA QUE PODE TER DADOS EM MAIS DE UMA LINHA  
        
        $pdf->Output(); // IMPRIME O PDF NA TELA  
        
      