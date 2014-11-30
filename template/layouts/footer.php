<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="<?= $GLOBALS['JS_URL'].'encript.js' ?>"></script>
	<script>
			var p1;
			var p2;
		$('form')[0].onsubmit = function (event){
			$('#passEncrypt')[0].value=(new Blowfish('bbd9501c57aab081e5ad6f31be039259')).encrypt($('#pass')[0].value);
			return true;
		};
		$('form')[1].onsubmit = function (event){
			if($('#inputPassword1')[0].value !== $('#inputPassword2')[0].value){
				alert('Las contraseñas no coinciden');
				return false;
			}
			$('#inputPassword3')[0].value=(new Blowfish('bbd9501c57aab081e5ad6f31be039259')).encrypt($('#inputPassword2')[0].value);
			return true;
		};
	</script>
  </body>
</html>