package br.com.caelum.heranca.exercicios;

public class ContaPoupanca extends Conta{

	public void atualiza(double taxa){
		super.atualiza(taxa * 3);
		
	}
}
