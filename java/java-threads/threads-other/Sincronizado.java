package br.com.caelum.threads;

public class Sincronizado {

	public synchronized void um(){
		for(int i = 0; i<= 100;i++){
			System.out.println("um " + i);
		}
	}
	
	public synchronized void dois(){
		for(int i = 0; i<= 100;i++){
			System.out.println("dois " + i);
		}
	}
	
	
	public static void main(String[] args) {
		
		Thread thread = new Thread(new Runnable(){

			@Override
			public void run() {
				new Sincronizado().um();
				
			}
			
		});
		
		
		Thread thread1 = new Thread(new Runnable(){

			@Override
			public void run() {
				new Sincronizado().dois();
				
			}
			
		});
		
		
		thread.start();
		thread1.start();
	}
	
	
}
