var ocxActiveFormMvEditor = null;

function ActiveFormMvEditor_SetConfiguracao(param1,param2,param3,param4,param5,param6,param7)
{
	ocxActiveFormMvEditor.SetConfiguracao(
		param1, 
		param2,
		param3, 
		param4, 
		param5,
		param6, 
		param7
	);
}

function ActiveFormMvEditor_Inicializa(SID, IP, PassWordCript, Porta, Usuario, pSessionID)
{   
	if(SID == null)
	{
		SID = "";
	}

	if(Porta != null && Porta.indexOf(";") >= 0)
	{
		Porta = Porta.substring(0, Porta.indexOf(";"));
	}

	if(SID != null && SID.indexOf("@") >= 0)
	{
		SID = SID.substring(SID.indexOf("@")+1);
	}

	return ocxActiveFormMvEditor.Inicializa("", "", Usuario, PassWordCript, SID, IP, Porta, pSessionID);
}

function ActiveFormMvEditor_LoadDocEditionWithCdItPreMed(Cd_Documento, Cd_Atendimento, IdentificadorDoc, Cd_ItPre_Med)
{
	ocxActiveFormMvEditor.LoadDocEditionWithCdItPreMed(Cd_Documento, Cd_Atendimento, IdentificadorDoc, Cd_ItPre_Med);
}

function ActiveFormMvEditor_LoadDocEditionWithCdItPreMedFull(Cd_Documento, Cd_Atendimento, IdentificadorDoc, Cd_ItPre_Med, P_Read_Only)
{
	ActiveFormMvEditor_SetEditionField();
	ActiveFormMvEditor_LoadDocEditionWithCdItPreMed(Cd_Documento, Cd_Atendimento, IdentificadorDoc, Cd_ItPre_Med);
	ActiveFormMvEditor_SetReadOnly(P_Read_Only);
}

function ActiveFormMvEditor_Print()
{
   return ocxActiveFormMvEditor.Print(null);
}

function ActiveFormMvEditor_ClearContent()
{
	ocxActiveFormMvEditor.ClearContent();
}

function ActiveFormMvEditor_clear()
{
	ocxActiveFormMvEditor.clear();
}

function ActiveFormMvEditor_SetEditionField()
{
	ocxActiveFormMvEditor.SetEditionField();
}

function ActiveFormMvEditor_SetReadOnly(param1)
{
	ocxActiveFormMvEditor.SetReadOnly(param1);
}

function ActiveFormMvEditor_LoadDocumentByRegistry(param1, param2)
{
	ocxActiveFormMvEditor.LoadDocumentByRegistry(param1, param2);
}

function ActiveFormMvEditor_LoadDocumentByRegistryFull(param1, param2, editonField, readOnly)
{
	if(editonField == "1")
		ActiveFormMvEditor_SetEditionField();
	
	ActiveFormMvEditor_LoadDocumentByRegistry(param1, param2);
	ActiveFormMvEditor_SetReadOnly(readOnly);
}

function ActiveFormMvEditor_LoadDocumentWithTree(param1)
{
	ocxActiveFormMvEditor.LoadDocumentWithTree(param1);
}

function ActiveFormMvEditor_LoadDocument(param1)
{
	ocxActiveFormMvEditor.LoadDocument(param1);
}

function ActiveFormMvEditor_LoadDocumentToEdition(param1,param2,param3)
{
	ocxActiveFormMvEditor.LoadDocumentToEdition(param1,param2,param3);
}

function ActiveFormMvEditor_LoadDocumentToEditionFull(param1,param2,param3,param4)
{
	ActiveFormMvEditor_clear();
	ActiveFormMvEditor_SetEditionField();
	ActiveFormMvEditor_LoadDocumentToEdition(param1,param2,param3);
	ActiveFormMvEditor_SetReadOnly(param4);
}

function ActiveFormMvEditor_UpdateRegistryDocUsPrinted(param1,param2)
{
	ocxActiveFormMvEditor.UpdateRegistryDocUsPrinted(param1,param2);
	ActiveFormMvEditor_clear();
}

function ActiveFormMvEditor_WriteDocument(param1)
{
	ocxActiveFormMvEditor.WriteDocument(param1);
}

function ActiveFormMvEditor_GravarImprimir(param1,param2,param3,param4)
{
	return ocxActiveFormMvEditor.GravarImprimir(param1,param2,param3,param4);
}

function ActiveFormMvEditor_writeOnlyAnswer(param1,param2,param3,param4)
{
	return ocxActiveFormMvEditor.writeOnlyAnswer(param1,param2,param3,param4);
}
// ---------------------------------------------------------------------------------------
function ActiveFormMvEditor_setHeight(param1)
{
	_setHeight(ocxActiveFormMvEditor, param1);
}
function ActiveFormMvEditor_setWidth(param1)
{
	_setWidth(ocxActiveFormMvEditor, param1);
}
function ActiveFormMvEditor_getHeight(param1)
{
	return ocxActiveFormMvEditor.height;
}
function ActiveFormMvEditor_getWidth(param1)
{
	return ocxActiveFormMvEditor.width;
}

//Thiago Melo - 02/06/2008
function ActiveFormMvEditor_SetPathConfiguracao(param1)
{
	return ocxActiveFormMvEditor.SetPathConfiguracao(param1)
}

//Felipe Le�o - 08/08/2008
function getActiveFormMvEditor()
{
	return ocxActiveFormMvEditor
}

function ActiveFormMvEditor_showOCXContainer(){
	showOCXContainer();
}

function ActiveFormMvEditor_hideOCXContainer(){
	hideOCXContainer();
}

// ---------------------------------------------------------------------------------------
function ActiveFormMvEditor_LoadOCX()
{
	ocxActiveFormMvEditor = _criarOCX('ActiveFormMvEditor');
}

function ActiveFormMvEditor_HabilitarOCX()
{
	// mudar tamanho da ocx e o forms
	_habilitarOCX(ocxActiveFormMvEditor); 
}
function ActiveFormMvEditor_DesabilitarOCX()
{
	_desabilitarOCX(ocxActiveFormMvEditor); 
}
// ----------------------------------------------------------------------------------

function Get_object_Properties()
{
	return GetObjectProperties(ocxActiveFormMvEditor);
}

function GetObjectProperties(AObject) {
	var stProperties = "", stPropertyName, inColumns = 0;
	for(stPropertyName in AObject) {
		stProperties += stPropertyName;// + ": " + typeof(AObject[stPropertyName]);
		if((++inColumns) == 30) {
			inColumns = 0;
			stProperties += "\n";
		} // if
		else
		  stProperties += ", ";
	} // for
	return stProperties;
} // function GetObjectProperties

function ActiveFormMvEditor_GerarPDF(nomePDF)
{
	ocxActiveFormMvEditor.gerarPDF(nomePDF);
}

