package polimorfismo;

public class Conta implements java.io.Serializable{
	
	public String cliente;
	//transient double saldo;
	public double saldo;
	
	public Conta(){
		
	}
	public Conta(String string, double d) {
		cliente = string;
		saldo = d;
	}

	public void exibeSaldo(){
		System.out.println(cliente + " seu saldo é de " + saldo);
	}
	
	public void saca(double valor){
		saldo -= valor;
	}
	
	public void deposita(double valor){
		saldo += valor;
	}
	
	public void transferePara(Conta destino, double valor){
		this.saca(valor);
		destino.deposita(valor);
	}
}
