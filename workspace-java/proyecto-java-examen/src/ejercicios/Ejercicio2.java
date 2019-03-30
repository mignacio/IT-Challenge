package ejercicios;

import ejercicios.Persona.tipoDoc;
import java.time.LocalDate;
import java.time.Month;

/**
 * A. Crear una clase Persona con los siguientes campos
 * (con sus respectivos getters, setters y constructor)
 * 
 * TipoDocumento - enum (dni/libretacivica) 
 * NroDocumento - Integer
 * Nombre - String
 * Apellido - String
 * FechaNacimiento - Date
 * 
 * B. En el método main de la clase "Ejercicio2" crear una nueva instancia
 * de la clase persona y settearle valores reales con tus datos
 * 
 * 
 * C. En el método main de la clase "Ejercicio 2" imprimir los valores en 
 * consola 
 * (crear método main e imprimir valores) 
 *  
 * @author examen
 *
 */
public class Ejercicio2 {

	/**
	 * 
	 */
	public Ejercicio2() {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub			
		
		Persona persona = new Persona(tipoDoc.DNI, 35583274, "Ignacio", "Moya", LocalDate.of(1991, Month.JANUARY,  17));
		
		System.out.println("Tipo de Documento: "+ persona.getTipoDocumento().toString());
		System.out.println("Nro de Documento: "+ persona.getNroDocumento().toString());
		System.out.println("Nombre: "+ persona.getNombre().toString());
		System.out.println("Apellido: "+ persona.getApellido().toString());
		System.out.println("Fecha de nacimiento: "+ persona.getFechaNacimiento().toString());
		
	}

}


