package br.com.caelum.excecoes;

public class Conta {
	
	private double saldo;
	
	public void deposita(double valor){
		if(valor < 0){
			throw new IllegalArgumentException("Você tentou depositar" +
												"um valor negativo");
		}
		else{
			this.saldo += valor;
		}
	}
}
