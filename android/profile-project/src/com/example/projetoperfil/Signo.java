package com.example.projetoperfil;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

public class Signo extends Activity{
	private TextView signo;
	private TextView descricao;
	private ImageView imageButton1;
	
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
	super.onCreate(savedInstanceState);
	/*
	 * Aqui � setado o conteudo da View , que ser� o signo
	 */
	setContentView(R.layout.signo);
	
	signo = (TextView) findViewById(R.id.signo);
	descricao = (TextView) findViewById(R.id.descricao);
	imageButton1 = (ImageView) findViewById(R.id.imageButton1);
	
	Intent intent = getIntent();
	String sorte = intent.getStringExtra("s");
	Log.i("a",sorte);
	if(sorte.equals("aquario")){
		signo.setText("Signo de Aqu�rio");
		descricao.setText("Com o apoio de amigos, voc� pode ir mais longe, aquariano. O momento enfatiza quest�es educacionais, culturais e ligadas � institui��es e grupos. Um dia de natureza otimista e expansiva aos aquarianos.");
	}
	else if(sorte.equals("gemeos")){
		signo.setText("Signo de Gemeos");
		descricao.setText("O dia favorece relacionamentos, contatos e acordos aos geminianos. � um dia interessante para estar aberto aos ensinamentos que os seus relacionamentos promovem. Favorecimento que pode ocorrer por meio das pessoas com quem voc� estabelece uma liga��o.");
	}
	else if(sorte.equals("peixes")){
		signo.setText("Signo de Peixes");
		descricao.setText("Um excelente dia para as quest�es profissionais e ligadas � sa�de dos piscianos. � um momento favor�vel para inovar na maneira como voc� expressa os seus talentos. Viagens e conhecimentos est�o associados ao seu desenvolvimento profissional.");
	}
	else if(sorte.equals("capricornio")){
		signo.setText("Signo de Capricornio");
		descricao.setText("Estudos, autoconhecimentos e fatores psicol�gicos e emocionais est�o enfatizados hoje. Momento interessante para ter mais consci�ncia acerca de seu poder emocional e material. Um dia que assinala interessantes possibilidades de progresso.");
	}
	else if(sorte=="sagitario"){
		signo.setText("Signo de Sagitario");
		descricao.setText("Um dia muito favor�vel aos sagitarianos, com o contato entre a Lua, que est� em seu signo, e o planeta J�piter. � hora de voc� abrir o cora��o e a mente a novas possibilidades e oportunidades . Momento � interessante para confiar mais em si e tamb�m estar atento aos sinais.");
	}
	else if(sorte.equals("cancer")){
		signo.setText("Signo de Cancer");
		descricao.setText("Um excelente dia para as quest�es profissionais e ligadas � sa�de dos piscianos. � um momento favor�vel para inovar na maneira como voc� expressa os seus talentos. Viagens e conhecimentos est�o associados ao seu desenvolvimento profissional.");
	}
	else if(sorte.equals("leao")){
		signo.setText("Signo de Le�o");
		descricao.setText("� hora de resgatar a alegria, a leveza e o entusiasmo, leonino. O dia � favor�vel para as quest�es afetivas e para a express�o de seus talentos criativos. Voc� agora absorve com mais consci�ncia os seus conhecimentos emocionais.");
	}
	else if(sorte.equals("libra")){
		signo.setText("Signo de Libra");
		descricao.setText("Excelente dia para negocia��es, contatos e habilidades intelectuais, libriano. Uma fase oportuna para voc� desenvolver novos conhecimentos e contatos, e ampliar o seu raio de atua��o. Mudan�as positivas nos relacionamentos e expans�o caracterizam o dia aos librianos.");
	}
	
	else if(sorte.equals("virgem")){
		signo.setText("Signo de Virgem");
		descricao.setText("Um dia interessante para reflex�es sobre as emo��es e a vida familiar, virginiano. Uma fase oportuna para o desenvolvimento espiritual e afetivo. Quest�es muito significativas envolvendo a fam�lia, o lar e os im�veis.");
	}
	
	else if(sorte.equals("escorpiao")){
		signo.setText("Signo de Escorpi�o");
		descricao.setText("Importantes benef�cios que est�o associados a uma confian�a maior em suas habilidades. Favorecimento financeiro, entretanto tenha cuidado com neglig�ncias e exageros. � um momento muito interessante para inova��es no trabalho e no cotidiano.");
	}
	else if(sorte.equals("aries")){
		signo.setText("Signo de Aries");
		descricao.setText("Excelente dia para viagens, estudos e quest�es ligadas ao turismo e a educa��o, ariano. O momento � oportuno para confiar mais nos seus potenciais e agir de uma maneira entusiasta. Benef�cios associados � capacidade de ampliar horizontes e perspectivas.");
	}
	
	else if(sorte.equals("touro")){
		signo.setText("Signo de Touro");
		descricao.setText("Um dia estimulante para negocia��es e para confiar mais em si mesmo, taurino. O momento � oportuno para mudan�as que tragam mais liberdade de a��o. � uma fase bem importante para negocia��es e para quest�es �ntimas.");
	}
	}

}
