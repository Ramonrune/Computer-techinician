package br.com.caelum.heranca;

public class TestaGerente {
	
	public static void main(String[] args) {
		
		Gerente gerente = new Gerente();
		gerente.nome = "Nome do gerente";
		gerente.senha = 12345;
		gerente.salario = 5000;
		
		System.out.println(gerente.getBonificacao());
		
		Funcionario funcionario = gerente;
		System.out.println(funcionario.getBonificacao());
		
		ControleDeBonificacoes controle = new ControleDeBonificacoes();
		
		Gerente funcionario1 = new Gerente();
		
		funcionario1.salario = 200;
		
		controle.registra(funcionario1);
		
		Funcionario funcionario2 = new Funcionario();
		funcionario2.salario = 800;
		controle.registra(funcionario2);
		
		
		System.out.println(controle.getTotalDeBonificacoes());
		
	}
}
