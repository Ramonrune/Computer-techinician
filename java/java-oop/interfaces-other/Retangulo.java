package br.com.caelum.interfaces;

class Retangulo implements AreaCalculavel {

	private int largura;
	private int altura;
	
	public Retangulo(int largura, int altura){
		this.largura = largura;
		this.altura = altura;
	}
	
	@Override
	public double calculaArea() {
		return this.largura * this.altura;
	}
	
}
