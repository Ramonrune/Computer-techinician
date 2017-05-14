package fundamentos;
import java.util.Scanner;


public class CalculoCirculo{
	
	public static void main(String[] args){
		
		// diametro: 2r
		
		
		Scanner s = new Scanner(System.in);
		System.out.println("Informe o raio:");
		double raio = s.nextDouble();
		double diametro = 2 * raio;
		
		// circunferencia : 2 PI r
		
		double pi = Math.PI;
		double circunferencia = 2 * pi * raio;
		
		//área pi r ^ 2
		
		
		double area = pi * (raio * raio);
		
		System.out.println("Diametro: " + diametro);
		System.out.println("Circunferência: " + circunferencia);
		System.out.println("Área: " + area);
	}
	
}