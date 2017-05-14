package Jogoo;

import jplay.GameObject;
import jplay.TileInfo;

public class controle {

	public boolean colisao(GameObject obj,TileInfo tile){
		if(((tile.id==17) || (tile.id==10)) && obj.collided(tile)){
			return true;
		}
		return false;
	}
	
}
