package ejercicios;

import java.time.LocalDate;

public class Persona {
	
	enum tipoDoc{
		DNI,
		CI,
		LE,
		LC
	}
	
	private tipoDoc TipoDocumento;
	private int NroDocumento;
	private String Nombre;
	private String Apellido;
	private LocalDate FechaNacimiento;

	public Persona() {
		// TODO Auto-generated constructor stub
	}
	
	public Persona(tipoDoc tipoDoc, int nroDoc, String nombre, String apellido, LocalDate fechaNac) {
		this.TipoDocumento = tipoDoc;
		this.NroDocumento = nroDoc;
		this.Nombre = nombre;
		this.Apellido = apellido;
		this.FechaNacimiento = fechaNac;
	}
	
	public tipoDoc getTipoDocumento() {
		return TipoDocumento;
	}

	public void setTipoDocumento(tipoDoc tipoDocumento) {
		TipoDocumento = tipoDocumento;
	}

	public Integer getNroDocumento() {
		return NroDocumento;
	}

	public void setNroDocumento(Integer nroDocumento) {
		NroDocumento = nroDocumento;
	}

	public String getNombre() {
		return Nombre;
	}

	public void setNombre(String nombre) {
		Nombre = nombre;
	}

	public String getApellido() {
		return Apellido;
	}

	public void setApellido(String apellido) {
		Apellido = apellido;
	}

	public LocalDate getFechaNacimiento() {
		return FechaNacimiento;
	}

	public void setFechaNacimiento(LocalDate fechaNacimiento) {
		FechaNacimiento = fechaNacimiento;
	}

}
