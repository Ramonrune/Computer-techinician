package interfaces;

public class Galinha extends Animal implements AreaCalculavel, VolumeCalculavel{

	public Galinha(){
		super(2, "Milho");
	}

	@Override
	public double calculaVolume() {
		// TODO Auto-generated method stub
		return 0;
	}

	@Override
	public double calculaArea() {
		// TODO Auto-generated method stub
		return 0;
	}
}
