package Jogoo;

import java.awt.Point;
import java.awt.event.KeyEvent;
import java.util.Vector;

import jplay.GameObject;
import jplay.Keyboard;
import jplay.Scene;
import jplay.Sprite;
import jplay.TileInfo;
import jplay.Window;

public class jogador extends ator{

	
	protected int hp;
	public jogador(int x , int y,int hp) {
		super("src/recursos/personagem.png",20);
		this.x = x;
		this.y = y;
		this.hp = hp;
		this.setTotalDuration(2000);
	}
	
	controletiros tiros = new controletiros();
	public void atirar(Window janela,Scene cena,Keyboard teclado){
		if(teclado.keyDown(KeyEvent.VK_A)){
			tiros.adicionaTiros(x, y+11, direcao, cena);
		}
		tiros.run();
	}
	
	public void controle(Window janela, Keyboard teclado){
	
		
		if(teclado.keyDown(Keyboard.LEFT_KEY)){
			if(this.x>0){
				this.x-=velocidade;
			}
			if(direcao!=1){
				setSequence(4,8);
				direcao = 1;
				
			}
			movendo = true;
			
		}else if (teclado.keyDown(Keyboard.RIGHT_KEY)){
			if(this.x<janela.getWidth()-60){
				this.x+=velocidade;
			}
			if(direcao!=1){
				setSequence(8,12);
				direcao = 2;
				
			}
			movendo = true;
		}else if(teclado.keyDown(Keyboard.UP_KEY)){
			if(this.y>0){
				this.y-=velocidade;
			}
			if(direcao!=4){
				setSequence(12,16);
				direcao = 4;
				
			}
			movendo = true;
		}
		else if(teclado.keyDown(Keyboard.DOWN_KEY)){
			if(this.y<janela.getHeight()-60){
				this.y+=velocidade;
			}
			if(direcao!=5){
				setSequence(0,4);
				direcao = 5;
				
			}
			movendo = true;
		}
		if(movendo){
			update();
			movendo = false;
		}
	}

	
	
	

}
