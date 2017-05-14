package threads;

/**
 * 
 * 
 * Uma<code>Ponte</code> representa o elo de liga��o entre
 * objetos produtores e consumidores de informa��o. Os <i>produtores</i>
 * utilizam as pontes para gravar informa�es e compartilhar essas informa��es
 * com os consumidores que l�em esses dados da Ponte para fazer o processamento.
 * 
 * @author Ramon Lacava Gutierrez Gon�ales
 * @author XTI
 * @version 1.3
 * @since 1.0
 * 
 * @see PonteNaoSincronizada
 * @see PonteSincronizada
 * 
 * 
 * 
 *
 */

public interface Ponte {

	/**
	 * Armazena o valor informado na ponte. Geralmente ser� chamado
	 * pelas classes Produtoras de dados.
	 * 
	 * @param valor
	 * @throws InterruptedException
	 */
	public void set(int valor) throws InterruptedException;
	
	
	/**
	 * Recupera a informa��o armazenada na Ponte. Esse
	 * m�todo ser� chamado pelas Consumidoras de dados.
	 * 
	 * @return
	 * @throws InterruptedException
	 */
	public int get() throws InterruptedException;
}
