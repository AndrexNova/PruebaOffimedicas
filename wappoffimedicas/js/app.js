	function validarContrasena(valor) {
		var reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
		//Se muestra un texto a modo de ejemplo, luego va a ser un icono
		if (reg.test(valor) ) {
			return true;
		} else {
			return false;
		}
	}

	
	function validarEmail(valor) {
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

		var regOficial = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

		//Se muestra un texto a modo de ejemplo, luego va a ser un icono
		if (reg.test(valor) && regOficial.test(valor)) {
			return true;
		} else {
			return false;
		}
	}