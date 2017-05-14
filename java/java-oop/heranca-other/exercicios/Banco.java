package br.com.caelum.heranca.exercicios;

import java.util.ArrayList;

public class Banco {

	ArrayList<Conta> contas = new ArrayList<Conta>();
	
	public void adiciona(Conta c){
		contas.add(c);
	}
	
	public Conta pegaConta(int x){
		Conta c = contas.get(x);
		
		return c;
	}
	
	public int pegaTotalDeContas(){
		return contas.size();
	}
	
	public static void main(String[] args) {
		Conta c = new Conta();
		ContaCorrente cc = new ContaCorrente();
		ContaPoupanca cp = new ContaPoupanca();
		
		c.deposita(1000);
		cc.deposita(1000);
		cp.deposita(1000);
		
		c.atualiza(0.01);
		cc.atualiza(0.01);
		cp.atualiza(0.01);
		
		Banco banco = new Banco();
		banco.contas.add(c);
		banco.contas.add(cc);
		banco.contas.add(cp);
		
		System.out.println(banco.pegaConta(1).saldo);
		System.out.println(banco.pegaTotalDeContas());
		AtualizadorDeContas adc = new AtualizadorDeContas(0.10);
		
		for(Conta conta : banco.contas){
			adc.roda(conta);
			System.out.println(conta.saldo);
			
		}
		
		for(Conta c1 : banco.contas){
			System.out.println(c1.saldo);
		}
		
		
		
		
	}
}
