package fundamentos;

public class IfElse{
	
	public static void main(String[] args){
		
		int idade = 18;
		if(idade < 11){
			System.out.println("É uma criança");
		}
		
		boolean passou = true;
		if(passou){
			System.out.println("Contratado");
		}
		
		
		int numero = 10;
		if((numero % 2) == 0){
			System.out.println("Par");
		}else{
			System.out.println("Impar");
		}
		
		
		if(idade <= 11){
			System.out.println("Criança");
		}
		else if(idade > 11 && idade <= 18){
			System.out.println("Adolecente");
		}
		else if(idade > 18 && idade <= 60){
			System.out.println("Adulto");
		}
		else{
			System.out.println("Maior idade");
		}
		
		
		int nota = 10;
		
		if(nota >=7){
			System.out.println("Passou");
		}else{
			System.out.println("Reprovou");
			if(nota >= 6){
				System.out.println("mais pode fazer a recuperação");
			}
		}
			
	}
}