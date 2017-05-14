package threads;

public class ContaConjunta {

	private int saldo = 100;
	
	public int getSaldo(){
		return saldo;
	}
	
	public synchronized void sacar(int valor, String cliente){
		
		if(saldo >= valor){
			int saldoOriginal = saldo;
			System.out.println(cliente + " vai sacar");
			try {
				System.out.println(cliente + " esperando");
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			saldo -= valor;
			String msg = cliente + " SACOU " + valor +
					" [Saldo original =" + saldoOriginal + ", Saldo Final =" + saldo +"]";
			System.out.print(msg);
		}
		else{
			System.out.println("Saldo insuficiente para " + cliente);
		}
		
	}
}
