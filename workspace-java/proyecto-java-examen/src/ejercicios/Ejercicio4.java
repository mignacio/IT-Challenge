package ejercicios;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.List;

public class Ejercicio4 {

	// listas de ejemplo, pueden variarse su contenido, 
	static Integer[] valoresLista1 = {1, 2, 5, 8, 10, 30, 20, 8, 9, 10};	
	static Integer[] valoresLista2 = {1, 2, 4, 20, 5, 10, 7, 8, 10, 9};

	/**	 
	 * Para ejecutar el mÃ©todo main se debe hacer boton derecho sobre la clase
	 * "Run As --> Java Application" 
	 * @param args
	 */
	public static void main(String[] args) {
		
		System.out.println("**** inicializando datos ****");
		
		List<Integer> lista1 = new ArrayList<Integer>(Arrays.asList(valoresLista1));
		List<Integer> lista2 = new ArrayList<Integer>(Arrays.asList(valoresLista2));
	
		System.out.println("**** inicializacion exitosa ****");

		// EJERCICIO 4.1: explicar salidas y sugerir mejoras
		informacion(lista1, 10);
		
		// EJERCICIO 4.2: corregir el metodo
		List<Integer> union = unionListas(lista1, lista2);
		System.out.println("union: " + union.toString());
		
		// EJERCICIO 4.3: implementar
		List<Integer> interseccion = interseccionListas(lista1, lista2);
		System.out.println("interseccion: " + interseccion.toString());
		
		// EJERCICIO 4.4: implementar
		List<Integer> orden1 = ordenaListaAscendente(lista1);
		System.out.println("orden asc: " + orden1);
		
		// EJERCICIO 4.5: implementar
		List<Integer> orden2 = ordenaListaDescendente(lista2);
		System.out.println("orden desc: " + orden2);

		// EJERCICIO 4.6: implementar
		boolean b = tienenMismoContenido(lista1, lista2);
		System.out.println("mismo contenido: " + b);
		
	}

	private static void informacion(List<Integer> lista1, Integer numero) {
		// TODO: explicar salidas de los system out y sugerir alguna mejora a la implementacion
		
		int pares = 0;
		for (Integer n: lista1) {
			if (n % 2 == 0) {
				pares = pares + 1;
			}
		}
		
		System.out.println("Hay " + pares+ " números pares en la lista 1");
		
		List<Integer> impares = new ArrayList<Integer>();
		for (Integer n: lista1) {
			if (n % 2 != 0) {
				impares.add(n);
			}
		}
		
		System.out.println("Los números impares en la lista 2 son: " + impares.toString()); //Se imprime la lista de número impares que hay dentro de lista1
		
		int p = lista1.size() / 2;
		
		if(lista1.indexOf(p) != -1) {
			System.out.println("El número en la posición " + lista1.indexOf(p)+ " de la lista 1 es igual a la mitad del tamaño de la lista");
		}else {
			System.out.println("No hay números en la lista 1 que sean iguales a la mitad de su tamaño");
		}
		
		
		int c = 0;
		/**
		 * El siguiente bucle for cuenta la cantidad de número que hay en la lista cuales son mayores a numero.
		 */
		for (Integer n: lista1) {
			if (n > numero) {
				c = c + 1;
			}
		}		
		/**
		 * El bloque if hace lo mismo para cada uno de los casos.
		 * Podría reemplazarse por una sola línea: System.out.println("...");
		 * Yo propongo cambiar las salidas por consola para que el texto impreso refleje cada uno de los casos.
		 */
		if (c > lista1.size() / 2) {
			//System.out.println("...");
			System.out.println("Más de la mitad de los números en la lista son mayores a: " + numero);
		} else if (c > 0) {
			System.out.println("Hay numeros en la lista que son mayores a: " + numero);
		} else {
			System.out.println("No hay numeros en la lista que sean mayores a: " + numero);
		}
	}

	/***
	 * @param lista1
	 * @param lista2
	 * 
	 * retornar una lista que contenga los elementos de ambas listas, sin elementos repetidos 
	 * 
	 */
	private static List<Integer> unionListas(List<Integer> lista1, List<Integer> lista2) {
		// TODO: corregir el metodo para que funcione correctamente 
		
		//List<Integer> union = null; //Throws: Null pointer exception
		List<Integer> union = new ArrayList<Integer>();		

		//agrego los elementos de lista1 a union, sin repetirse
		for (Integer n: lista1){
			if (!union.contains(n)) {
				union.add(n);
			}
		}
		
		for (Integer m: lista2) {
			if (!union.contains(m)) {
				union.add(m);
			}
		}	
		
		return union;
	}

	/***
	 * @param lista1
	 * @param lista2
	 * 
	 * retornar una lista que contenga los elementos que estan presentes en ambas listas, sin elementos repetidos 
	 * 
	 */
	private static List<Integer> interseccionListas(List<Integer> lista1, List<Integer> lista2) {
		// TODO:
		List<Integer> nuevaLista1 = new ArrayList<Integer>();
		List<Integer> nuevaLista2 = new ArrayList<Integer>();
		List<Integer> resultado = new ArrayList<Integer>();
		
		//limpio lista1 de repetidos
		for (Integer n: lista1){
			if (!nuevaLista1.contains(n)) {
				nuevaLista1.add(n);
			}
		}
		//limpio lista2 de repetidos
		for(Integer n: lista2) {
			if(!nuevaLista2.contains(n)) {
				nuevaLista2.add(n);
			}
		}
		//resuelvo la intersección de las listas y guardo en resultado
		for(Integer m: nuevaLista1) {
			if(nuevaLista2.contains(m)) {
				resultado.add(m);
			}
		}
	
		return resultado;
	}

	/***
	 * @param lista1
	 * 
	 * retornar la lista recibida, ordenada en forma ascendente
	 * 
	 */
	private static List<Integer> ordenaListaAscendente(List<Integer> lista1) {
		// TODO:
		ArrayList<Integer> resultado = new ArrayList<Integer>();
		
		resultado.addAll(lista1);
		
		Collections.sort(resultado);
		
		return resultado;
	}

	/***
	 * @param lista2
	 * 
	 * retornar la lista recibida, ordenada en forma descendente
	 * 
	 */
	private static List<Integer> ordenaListaDescendente(List<Integer> lista2) {
		// TODO:
		ArrayList<Integer> resultado = new ArrayList<Integer>();
		
		resultado.addAll(lista2);
		
		Collections.sort(resultado, Collections.reverseOrder());
		
		return resultado;		
	}

	/***
	 * @param lista1
	 * @param lista2
	 * 
	 * devuelve true si contienen los mismos elementos
	 * NO se considera valido que esten en diferente orden
	 * NO se considera valido que la cantidad de repeticiones de los elementos sea diferente
	 * 
	 */
	private static boolean tienenMismoContenido(List<Integer> lista1, List<Integer> lista2) {
		// TODO:		
		return lista1.equals(lista2);
	}

}
