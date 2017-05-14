package br.com.caelum.excecoes;

public class TesteDeposita {

	public static void main(String[] args) {
		Conta cp = new Conta();
		try{
			cp.deposita(-100);
	
		}catch(IllegalArgumentException e){
			System.out.println("Você tentou depositar um valor inválido");
		}
		
	}
}
