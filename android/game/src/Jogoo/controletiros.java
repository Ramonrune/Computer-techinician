package Jogoo;

import java.util.LinkedList;

import jplay.Scene;
import jplay.Sound;

public class controletiros {

	LinkedList<tiro> tiros = new LinkedList(); 
	
	public void adicionaTiros(double x, double y , int caminho , Scene cena){
		tiro t = new tiro(x,y,caminho);
		tiros.addFirst(t);
		cena.addOverlay(t);
		somDisparo();
	}
	
	public void run(){
		for (int i = 0; i < tiros.size(); i++) {
			tiro t = tiros.removeFirst();
			t.mover();
			tiros.addLast(t);
		}
	}
	
	private void somDisparo(){
		new Sound("src/recursos/flecha.wav").play();;
		
	}
}
