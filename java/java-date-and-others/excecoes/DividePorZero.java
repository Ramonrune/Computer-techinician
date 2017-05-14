package excecoes;

import java.util.InputMismatchException;
import java.util.Scanner;

public class DividePorZero {

	public static void main(String[] args) {
		
		Scanner s = new Scanner(System.in);
		boolean continua = true;
		do{
			try{
				
				System.out.println("Numero: ");
				int a = s.nextInt();
				System.out.println("Divisor: ");
				int b = s.nextInt();
			
				//InputMismatchException xti
				//ArithmeticException 0
				
				System.out.println(a / b);
				continua = false;
			}
			catch(InputMismatchException e1){
				System.err.println("Numeros devem ser inteiros");
				s.nextLine(); // descarta a entrada errada e libera novamente para o usuário
			}
			catch(ArithmeticException e2){
				System.err.println("Divisor deve ser diferente de Zero");
				s.nextLine();
			}
			finally{
				System.out.println("Finally executado");
			}
			//finally pode vir sem o catch
			
			
		}while(continua);
		

	}

}
