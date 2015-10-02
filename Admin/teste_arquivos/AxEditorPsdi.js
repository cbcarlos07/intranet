var ocxAxEditorPsdi = null;

function AxEditorPsdi_Inicializa(param1,param2,param3,param4,param5,param6)
{
	if(param1 != null && param1.indexOf("@") >= 0)
	{
		param1 = param1.substring(param1.indexOf("@")+1);
	}
	
	return ocxAxEditorPsdi.Inicializa(param1,param2,param3,param4,param5,param6);
}

function AxEditorPsdi_setTipoEditor(param1)
{
	ocxAxEditorPsdi.setTipoEditor(param1);
}

function AxEditorPsdi_resetTipoEditor()
{
	ocxAxEditorPsdi.setTipoEditor("0");
}


function AxEditorPsdi_setVariaveisSessao(param1,param2)
{
	ocxAxEditorPsdi.setVariaveisSessao(param1,param2);
}

function AxEditorPsdi_obterDocumento(param1)
{
	ocxAxEditorPsdi.obterDocumento(param1);
}

function AxEditorPsdi_ObterImpressaoLoteEmpresa(param1,param2)
{
	return ocxAxEditorPsdi.ObterImpressaoLoteEmpresa(param1,param2);
}

function AxEditorPsdi_ObterImpressaoLote(param1)
{
	return ocxAxEditorPsdi.ObterImpressaoLote(param1);
}

function AxEditorPsdi_addExame(param1,param2)
{
	ocxAxEditorPsdi.addExame(param1,param2);
}

function AxEditorPsdi_gravarDocumento()
{
	return ocxAxEditorPsdi.gravarDocumento();
}

function AxEditorPsdi_estaVazio()
{
	return ocxAxEditorPsdi.estaVazio();
}

function AxEditorPsdi_modificado()
{
	return ocxAxEditorPsdi.modificado();
}

function AxEditorPsdi_Visible(param1)
{
	return ocxAxEditorPsdi.Visible(param1);
}

function AxEditorPsdi_limparConteudo()
{
	ocxAxEditorPsdi.limparConteudo();
}

//Thiago Melo - 02/06/2008
function AxEditorPsdi_SetPathConfiguracao(param1)
{
	return ocxAxEditorPsdi.SetPathConfiguracao(param1)
}
// ---------------------------------------------------------------------------------------
function AxEditorPsdi_setHeight(param1)
{
	_setHeight(ocxAxEditorPsdi, param1);
}
function AxEditorPsdi_setWidth(param1)
{
	_setWidth(ocxAxEditorPsdi, param1);
}
function AxEditorPsdi_getHeight()
{
	return _getHeight(ocxAxEditorPsdi);
}
function AxEditorPsdi_getWidth()
{
	return _getWidth(ocxAxEditorPsdi);
}
// ---------------------------------------------------------------------------------------
function AxEditorPsdi_LoadOCX()
{
	ocxAxEditorPsdi = _criarOCX('AxEditorPsdi');
}
function AxEditorPsdi_HabilitarOCX()
{
	// mudar tamanho da ocx e o forms
	_habilitarOCX(ocxAxEditorPsdi);
}
function AxEditorPsdi_DesabilitarOCX()
{
	_desabilitarOCX(ocxAxEditorPsdi);
}
// ----------------------------------------------------------------------------------

function AxEditorPsdi_showOCXContainer(){
	showOCXContainer();
}

function AxEditorPsdi_hideOCXContainer(){
	hideOCXContainer();
}

function AxEditorPsdi_ObterLaudoPadrao(cdPrestador, cdSetExa, cdDocumento, vcol1, vcol2)
{
	AxEditorPsdi_setVariaveisSessao(cdPrestador, cdSetExa);
	AxEditorPsdi_addExame(vcol1, vcol2);
	AxEditorPsdi_obterDocumento(cdDocumento);
}

function AxEditorPsdi_GerarPDF(nomePDF, filtroImpressao)
{
	ocxAxEditorPsdi.gerarPDF(nomePDF, filtroImpressao);
	//
	ocxAxEditorPsdi.setTipoEditor("0");
	ocxAxEditorPsdi.obterDocumento(filtroImpressao);
}

function AxEditorPsdi_gravarDocumentoExpresso(cdPrestador, cdSetExa, cdDocumento, vcol1, vcol2)
{
	AxEditorPsdi_setVariaveisSessao(cdPrestador, cdSetExa);
	AxEditorPsdi_addExame(vcol1, vcol2);
	AxEditorPsdi_obterDocumento(cdDocumento);
	return ocxAxEditorPsdi.gravarDocumento();
}

function AxEditorPsdi_visualizarGedConteudo(cdDocumento, cdVersao)
{
    ocxAxEditorPsdi.visualizarGedConteudo(cdDocumento, cdVersao);
}