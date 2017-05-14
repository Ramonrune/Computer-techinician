package polimorfismo;

public class MatematicaComRetorno {
	
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
	
	
	double soma(double um, double dois){
		return um + dois;
	}
	
	/**
	 * 
	 * @param numero
	 * @return
	 */
	int raiz(int numero){
		int impar = 1, raiz=0;
		
		while(numero >= impar){
				numero -= impar;
				impar += 2;
				++raiz;
			
		}
		
		return raiz;
		
	}
	
	
}
