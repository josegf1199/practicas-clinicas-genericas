function cargarTipoUsuario()
{
	var resp = document.getElementById('UserStatus');
	var cursos = document.getElementById('comboCursos');
	
	if(resp[1].selected)
	{
		if (cursos.style.display == "none")
		{
            cursos.style.display = "block";
        }
    }	
    else
	{
		cursos.style.display = "none";
	}
}