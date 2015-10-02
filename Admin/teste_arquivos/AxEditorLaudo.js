var ocxAxEditorLaudo = null;

function AxEditorLaudo_SetEncryptParameter(param1,param2,param3,param4,param5,param6,param7)
{
	ocxAxEditorLaudo.SetEncryptParameter (  param1, 
						param2,
						param3, 
						param4, 
						param5,
						param6, 
						param7);
}

function AxEditorLaudo_setMultiEmpresa(param1)
{
	ocxAxEditorLaudo.setMultiEmpresa(param1);
}

function AxEditorLaudo_configurarImpressao()
{
	ocxAxEditorLaudo.configurarImpressao();
}

function AxEditorLaudo_LoadDocumentWithTree(param1)
{
	ocxAxEditorLaudo.LoadDocumentWithTree(param1);
}

function AxEditorLaudo_obterDocumento(param1)
{
	ocxAxEditorLaudo.obterDocumento(param1);
}

function AxEditorLaudo_WriteDocument(param1)
{
	ocxAxEditorLaudo.WriteDocument(param1);
}

function AxEditorLaudo_SetEditionField()
{
	ocxAxEditorLaudo.SetEditionField();
}

function AxEditorLaudo_LoadDocumentByRegistry(param1, param2)
{
	ocxAxEditorLaudo.SetEditionField(param1, param2);
}

function AxEditorLaudo_SetReadOnly(param1)
{
	ocxAxEditorLaudo.SetReadOnly(param1);
}

function AxEditorLaudo_GravarImprimir(param1,param2,param3,param4)
{
	ocxAxEditorLaudo.GravarImprimir(param1,param2,param3,param4);
}

function AxEditorLaudo_Inicializa(param1,param2,param3,param4,param5,param6)
{
	if(param1 != null && param1.indexOf("@") >= 0)
	{
		param1 = param1.substring(param1.indexOf("@")+1);
	}
	
	return ocxAxEditorLaudo.inicializa(param1,param2,param3,param4,param5,param6);
}

function AxEditorLaudo_apenasLeitura(param1)
{
	ocxAxEditorLaudo.apenasLeitura(param1);
}

function AxEditorLaudo_apresentaArvore(param1)
{
	ocxAxEditorLaudo.apresentaArvore(param1);
}

function AxEditorLaudo_apresentaBotoes(param1)
{
	ocxAxEditorLaudo.apresentaBotoes(param1);
}

function AxEditorLaudo_setTipoEditor(param1)
{
	ocxAxEditorLaudo.setTipoEditor(param1);
}

function AxEditorLaudo_resetTipoEditor()
{
	ocxAxEditorLaudo.setTipoEditor("0");
}

function AxEditorLaudo_ObterImpressaoLote(param1)
{
	return ocxAxEditorLaudo.ObterImpressaoLote(param1);
}

function AxEditorLaudo_ObterImpressaoLoteMultiEmpresa(param1, param2)
{
	ocxAxEditorLaudo.setMultiEmpresa(param1);
	return ocxAxEditorLaudo.ObterImpressaoLote(param2);
}

function AxEditorLaudo_setNomeImpressora(param1, param2)
{
	ocxAxEditorLaudo.setNomeImpressora(param1, param2);
}

function AxEditorLaudo_existeImpressora(param1)
{
	return ocxAxEditorLaudo.existeImpressora(param1);
}

function AxEditorLaudo_GravarDocumento()
{
	return ocxAxEditorLaudo.GravarDocumento();
}

function AxEditorLaudo_Print()
{
	ocxAxEditorLaudo.Print();
}

function AxEditorLaudo_modificado()
{
	return ocxAxEditorLaudo.modificado();
}

function AxEditorLaudo_limparConteudo()
{
	ocxAxEditorLaudo.limparConteudo();
}

//Thiago Melo - 02/06/2008
function AxEditorLaudo_SetPathConfiguracao(param1)
{
	return ocxAxEditorLaudo.SetPathConfiguracao(param1)
}

// ---------------------------------------------------------------------------------------
function AxEditorLaudo_setHeight(param1)
{
	_setHeight(ocxAxEditorLaudo, param1);
}
function AxEditorLaudo_setWidth(param1)
{
	_setWidth(ocxAxEditorLaudo, param1);
}
function AxEditorLaudo_getHeight()
{
	return _getHeight(ocxAxEditorLaudo);
}
function AxEditorLaudo_getWidth()
{
	return _getWidth(ocxAxEditorLaudo);
}
// ---------------------------------------------------------------------------------------
function AxEditorLaudo_LoadOCX()
{
	ocxAxEditorLaudo = _criarOCX('AxEditorLaudo');
}
function AxEditorLaudo_HabilitarOCX()
{
	// mudar tamanho da ocx e o forms
	_habilitarOCX(ocxAxEditorLaudo);
}
function AxEditorLaudo_DesabilitarOCX()
{
	_desabilitarOCX(ocxAxEditorLaudo); 
}
// ----------------------------------------------------------------------------------

function AxEditorLaudo_showOCXContainer(){
	showOCXContainer();
}

function AxEditorLaudo_hideOCXContainer(){
	hideOCXContainer();
}

function AxEditorLaudo_GerarPDF(nomePDF, filtroImpressao)
{
	ocxAxEditorLaudo.gerarPDF(nomePDF, filtroImpressao);
}
