package polimorfismo;

public class Matematica {
	
	/**
	 * 
	 * @param um
	 * @param dois
	 * @return o maior dos dois numeros
	 */
	int maior(int um, int dois){
		if(um > dois){
			return um;
		}else{
			return dois;
		}
		
	}
	
	
	double soma(String titulo, double ... numeros){
		System.out.println(titulo);
		double total = 0;
		for(double n : numeros){
			total += n;
		}
		return total;
	}
	
	double soma1(double[] numeros){
		double total = 0;
		for(double n : numeros){
			total += n;
		}
		return total;
	}
	
	
}
