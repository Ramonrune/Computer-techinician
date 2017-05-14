package teste;

import static org.junit.Assert.fail;

import org.junit.Before;
import org.junit.Test;

import static junit.framework.Assert.*;
import polimorfismo.MatematicaSobrecarrega;

public class MatematicaTest {

	MatematicaSobrecarrega m;
	
	@Before
	public void setUp() throws Exception {
		m = new MatematicaSobrecarrega();
	}

	
	@Test
	public void testMediaInt() {
		assertEquals(10.0 ,m.media("10", "10"));
		
	}

	@Test
	public void testMediaIntZero() {
		assertEquals(10.0 ,m.media("10", "0"));
		
	}
	
	@Test
	public void testMediaNull() {
		//assertEquals(10.0 ,m.media(null));
		//erro
		
	}
	
	
	@Test
	public void testSoma() {
		assertEquals(30.0, m.soma(10,20));
	}

	
	
	@Test
	public void testMediaDoubleArray() {
		assertEquals(15.0, m.media(10,20));
	}
	
	
	

}
