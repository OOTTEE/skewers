
if($('#validarPasswordLogin')[0] != null){
	$('#validarPasswordLogin')[0].onsubmit = function (event){
		$('#passEncrypt')[0].value=(new Blowfish('bbd9501c57aab081e5ad6f31be039259')).encrypt($('#pass')[0].value);
		return true;
	};
}
if($('#validarPassword')[0] != null){
	$('#validarPassword')[0].onsubmit = function (event){
	if($('#inputPassword1')[0].value !== $('#inputPassword2')[0].value){
		alert('Las contraseñas no coinciden');
		return false;
	}
	$('#inputPassword3')[0].value=(new Blowfish('bbd9501c57aab081e5ad6f31be039259')).encrypt($('#inputPassword2')[0].value);
	return true;
	};
}
