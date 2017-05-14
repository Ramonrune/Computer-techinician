package br.com.caelum.heranca;

public class Gerente extends Funcionario {
	
	int senha;
	int numeroDeFuncionariosGerenciados;
	
	public boolean autentifica(int senha){
		if(this.senha == senha){
			System.out.println("Acesso permitido!");
			return true;
		}
		else{
			System.out.println("Acesso negado!");
			return false;
		}
	}
	
	
	@Override
	public double getBonificacao(){
		return super.getBonificacao() + 1000;
	}
	
}
