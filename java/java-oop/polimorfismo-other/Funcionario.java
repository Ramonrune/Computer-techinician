package polimorfismo;

public class Funcionario {

	private String nome;
	int idade;
	public String segundoNome;
	
	public String getNome(){
		return nome;
	}
	
	String getNome1(){
		return nome;
	}
	
	private String getNome2(){
		return nome;
	}
	
	public static void main(String[] args) {
		Funcionario f = new Funcionario();
		f.nome = "Ramon";
		f.idade = 18;
		f.segundoNome = "Lacava";
		f.getNome();
		f.getNome1();
		f.getNome2();
	}
}
