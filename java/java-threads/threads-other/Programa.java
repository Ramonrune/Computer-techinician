package br.com.caelum.threads;

public class Programa implements Runnable{

	public int id;
	
	@Override
	public void run() {
		
		for(int i = 0; i < 10000; i++){
			System.out.println("Programa " + id + " valor: " + i);
		}
		
	}
	
	

		
}
