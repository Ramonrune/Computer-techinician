package br.com.caelum.heranca.exercicios;

public class AtualizadorDeContas {

	public double saldoTotal = 0;
	public double selic;
	
	public AtualizadorDeContas(double selic){
		this.selic = selic;
	}
	
	public void roda(Conta c){
		
		c.atualiza(selic);
		
		this.saldoTotal += c.getSaldo();
		
	}
	
	public double getSaldoTotal(){
		return this.saldoTotal;
	}
}
