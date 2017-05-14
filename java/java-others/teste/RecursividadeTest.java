package teste;

import static org.junit.Assert.*;

import org.junit.Before;
import org.junit.Test;

import refinado.Recursividade;

public class RecursividadeTest {

	
	@Test
	public void testSoma() {
		assertEquals(55 , Recursividade.soma(10));
	}

	@Test
	public void testPotencia() {
		assertEquals(81, Recursividade.potencia(3, 4));
	}

}
