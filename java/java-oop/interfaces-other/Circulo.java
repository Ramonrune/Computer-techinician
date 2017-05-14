package br.com.caelum.interfaces;

public class Circulo implements AreaCalculavel{
	
	private int raio;
	
	public Circulo(int raio){
		this.raio = raio;
	}
	
	@Override
	public double calculaArea() {
		return Math.PI * raio * raio;
	}

}
