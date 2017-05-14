package com.example.projetofinal;

import com.example.projetofinal.ConsultaSituacaoTempo.ConsultaSituacaoTempoListener;

import android.app.Activity;
import android.os.Bundle;
import android.widget.TextView;
/*
 * @Autor:Ramon Lacava 3IT
 * @Data:19/05/2015
 * 
 * Arquivo do tempo
 */

//é feito uma consulta de situação de tempo
public class Tempo extends Activity implements ConsultaSituacaoTempoListener{
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.tempo);
		new ConsultaSituacaoTempo(Tempo.this).execute();
	}
	//aqui ele seta o tempo com a situação do tempo
	@Override
	public void onConsultaConcluida(String situacaoTempo) {
		
		TextView text = (TextView) findViewById(R.id.resultado);
		text.setText(situacaoTempo);
		
	}
}
