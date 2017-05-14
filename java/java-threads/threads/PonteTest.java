package threads;

public class PonteTest {

	public static void main(String[] args) {
		
		//Ponte ponte = new PonteNaoSincronizada();
		Ponte ponte = new PonteSincronizada();
		new Thread(new Produtor(ponte)).start();
		new Thread(new Consumidor(ponte)).start();
	}
}
