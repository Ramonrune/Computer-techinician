package br.com.caelum.heranca;

public class EmpregadoDaFaculdade {

	protected String nome;
	protected double salario;
	
	public double getGastos(){
		return this.salario;
	}
	
	
	public String getInfo(){
		return "nome: " + this.nome + " com salario " + this.salario;
	}
}
