package enumeracao;

public enum Medida {

	MM("Milímetro"), CM("Centimetro"), M("Metro");
	
	public String titulo;
	Medida(String titulo){
		this.titulo = titulo;
	}
}
