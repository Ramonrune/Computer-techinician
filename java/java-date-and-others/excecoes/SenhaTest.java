package excecoes;

public class SenhaTest {

	static void autenticar(String senha) throws SenhaInvalidaException{
		if("123".equals(senha)){
			//autenticado
			System.out.println("Autentificado");
		}else{
			//senha é incorreta
			throw new SenhaInvalidaException("Senha Incorreta");
		}
	}
	
	public static void main(String[] args) {
		
		try{
			autenticar("123456");
		}
		catch(SenhaInvalidaException e1){
			e1.printStackTrace();
			System.out.println(e1.getMessage());
		}
	}
}
