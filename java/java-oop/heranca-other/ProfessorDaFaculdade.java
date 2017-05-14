package br.com.caelum.heranca;

public class ProfessorDaFaculdade extends EmpregadoDaFaculdade{

	private int horasDeAula;
	
	public double getGastos(){
		return this.salario + this.horasDeAula * 10;
	}
	
	
	public String getInfo(){
		
		String informaticaBasica = super.getInfo();
		String informacao = informaticaBasica + " horas de aula: " +
		this.horasDeAula;
		
		return informacao;
		
		
		
	}
}
