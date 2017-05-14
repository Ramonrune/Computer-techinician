package refinado;

import java.io.Serializable;

@Cabecalho(
		instituicao = "Universidade XTI",
		projeto = "Sistema de Avaliações",
		dataCriacao = "09/07/2016",
		criador = "Ramon Lacava Gutierrez Gonçales",
		revisao = 2
)

@ErrosCorrigidos(erros = {"0001","0002"})

@SuppressWarnings({"serial", "unused"})

public class Anotacao implements Serializable{
	
	@SuppressWarnings("unused")
	private int x;
	
	@Deprecated
	public void anotar(){
		
	}
	
	
	@Override
	public String toString(){
		return null;
	}
	
	
}
