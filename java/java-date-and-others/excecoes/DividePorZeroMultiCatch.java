package excecoes;

import java.util.InputMismatchException;
import java.util.Scanner;

public class DividePorZeroMultiCatch {

	public static void dividir(Scanner s) throws InputMismatchException, ArithmeticException {
		System.out.println("Numero: ");
		int a = s.nextInt();
		System.out.println("Divisor: ");
		int b = s.nextInt();
	
		//InputMismatchException xti
		//ArithmeticException 0
		
		System.out.println(a / b);
	}
	
	
	public static void main(String[] args) {
		
		Scanner s = new Scanner(System.in);
		boolean continua = true;
		do{
			try{	
				dividir(s);
				continua = false;
			}
			catch(InputMismatchException | ArithmeticException e1){
				System.err.println("Numero Invalido");
				e1.printStackTrace();
				e1.getStackTrace();
				e1.getMessage();
				s.nextLine(); // descarta a entrada errada e libera novamente para o usuário
			}
			finally{
				System.out.println("Finally executado");
			}
			//finally pode vir sem o catch
			
			
		}while(continua);
		

	}

}
