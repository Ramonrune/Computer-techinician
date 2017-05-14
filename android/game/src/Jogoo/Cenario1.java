package Jogoo;

import jplay.Keyboard;
import jplay.Scene;
import jplay.Window;

public class Cenario1 {

	private Window janela;
	private Scene cena;
	private jogador j;
	private Keyboard teclado;
	private zumbi z;

	public Cenario1(Window window){
		janela = window;
	cena = new Scene();
	cena.loadFromFile("src/recursos/cenario.scn");
	j= new jogador(640,350,100);
	teclado = janela.getKeyboard();
	z = new zumbi(300,300);
	
	//som.play("");
	run();
	}
	
	
	public void run(){
		while(true){
			//cena.draw();
			j.controle(janela,teclado);
			j.caminho(cena);
			z.caminho(cena);
			z.perseguir(j.x, j.y);
			cena.moveScene(j);
			j.x+=cena.getXOffset();
			j.y+=cena.getYOffset();
			j.atirar(janela, cena, teclado);
			z.x+=cena.getXOffset();
			z.y+=cena.getYOffset();
			System.out.println("jogador"+j.x+" || "+j.y+"zumbi"+z.x+ "||"+z.y );
			if(((j.x - z.x >=0) && (j.x - z.x <=1)) && ((j.y - z.y >=0) && (j.y - z.y <=1))){
				j.hp-=10;
			}
			if(j.hp<=0){
				System.out.println(j.hp);
			}
			j.draw();
			z.draw();
			janela.update();
			
		}
	
	}
	
}
