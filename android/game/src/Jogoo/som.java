package Jogoo;

import jplay.Sound;
import jplay.URL;

public class som {

	private static Sound musica;
	
	public static void play(String audio){
		stop();
		musica = new Sound(URL.audio(audio));
		som.musica.play();
		som.musica.setRepeat(true);
	}
	
	public static void stop(){
		if(som.musica!=null){
			musica.stop();
		}
	}
}

