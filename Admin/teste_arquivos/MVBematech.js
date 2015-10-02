// Insere o div que vai conter o applet da impressão
function initBemaPrinter()
{
    var appletId = "";

    var html = "";
    
    var autoStart = true;
  
    html += "<div style='position: absolute; background-color: transparent; border: 0px; visibility: hidden;'>";
    html += "   <applet code='mv.component.applet.BematechDP20Applet' archive='mv-bema-printer.jar' ";
    html += "       id='MV_BemaReaderApplet' "
    html += "       name='MV_BemaReaderApplet' width=1 height=1>";
    html += "       <param name='cache_archive' value='mv-bema-printer.jar'>";
    html += "       <param name='autoStart' value='true'>";
    html += "   </applet>";
    html += "</div>";

	document.body.insertAdjacentHTML('beforeEnd', html);
}

function IniciaPortaComm(Porta){
	iRetorno = MV_BemaReaderApplet.iniciarPortaComm(Porta);
	VerificaRetorno(iRetorno);
}

function FechaPortaComm(Porta){
	iRetorno = MV_BemaReaderApplet.fecharPortaComm(Porta)
	VerificaRetorno(iRetorno);
}

function IniciaPortaCheque(Porta){
	iRetorno = MV_BemaReaderApplet.iniciarPorta(Porta);
	VerificaRetorno(iRetorno);
}

function FechaPortaCheque(Porta){
	iRetorno = MV_BemaReaderApplet.fecharPorta(Porta)
	VerificaRetorno(iRetorno);
}

function ImprimeCheque(Banco, Valor, Favorecido, Cidade, Data, Mensagem){
	iRetorno = MV_BemaReaderApplet.imprimirCheque(Banco, Valor, Favorecido, Cidade, Data, Mensagem);
	VerificaRetorno(iRetorno);	
}

function ImprimeEtiqueta(Texto){
	iRetorno = MV_BemaReaderApplet.imprimirComm(Texto);
	VerificaRetorno(iRetorno);	
}

function ImprimeTexto(Texto, FileOutput){
	iRetorno = MV_BemaReaderApplet.imprimirTextoComm(Texto, FileOutput);
	VerificaRetorno(iRetorno);
}

function VerificaRetorno(IRetorno){		
	switch (IRetorno)
	{
		case 0 : alert("Erro de Comunicação com a Impressora. Verifique.");
			break;			
	    case 1 : //alert("Comando enviado com Sucesso.");
			break;
	    case -2 : alert("Parâmetro de Comando Inválido. Verifique.");
			break;
	    case -3 : alert("Banco Não Encontrado.");
			break;
		default: 
			break;
	}
}