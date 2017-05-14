package excecoes;

import classesAbstratas.Animal;
import classesAbstratas.Cachorro;
import classesAbstratas.Galinha;

public class ExcecoesComuns {

	static int[] arrayNull = new int[0];
	
	public static void main(String[] args) {
		
		//NullPointerException	
		//System.out.println(arrayNull.length);
		
		//ArithmeticException
		//int x = 5 / 0;
		
		//ArrayIndexOutOfBoundsException
		//System.out.println(arrayNull[1]);

		//Animal a = new Galinha();
		//Galinha g = (Galinha) a;
		//ClassCastException
		// -- > Cachorro c = (Cachorro) a;
		
		//NumberFormatException
		//int inteiro = Integer.parseInt("x");
		
		
	}

}
