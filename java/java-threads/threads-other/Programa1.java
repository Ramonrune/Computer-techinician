package br.com.caelum.threads;

public class Programa1 {

	public static void main(String[] args) {
		
		Runnable r = new Runnable(){

			@Override
			public void run() {
				
				for(int i = 0; i < 10000; i++){
					System.out.println("Programa 1 valor " + i);
				}
			}
				
		};
		
		
		Runnable r1 = () -> {
			for(int i = 0; i < 10000; i++){
				System.out.println("Programa 1 valor " + i);
			}
		};
		
		Thread t = new Thread(r);
		t.start();
		
		
		new Thread(() -> {
			for(int i = 0; i < 10000; i++){
				System.out.println("Programa 2 valor " + i);
			}
		}).start();
	}
}
