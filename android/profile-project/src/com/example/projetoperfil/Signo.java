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
	 * Aqui é setado o conteudo da View , que será o signo
	 */
	setContentView(R.layout.signo);
	
	signo = (TextView) findViewById(R.id.signo);
	descricao = (TextView) findViewById(R.id.descricao);
	imageButton1 = (ImageView) findViewById(R.id.imageButton1);
	
	Intent intent = getIntent();
	String sorte = intent.getStringExtra("s");
	Log.i("a",sorte);
	if(sorte.equals("aquario")){
		signo.setText("Signo de Aquário");
		descricao.setText("Com o apoio de amigos, você pode ir mais longe, aquariano. O momento enfatiza questões educacionais, culturais e ligadas à instituições e grupos. Um dia de natureza otimista e expansiva aos aquarianos.");
	}
	else if(sorte.equals("gemeos")){
		signo.setText("Signo de Gemeos");
		descricao.setText("O dia favorece relacionamentos, contatos e acordos aos geminianos. É um dia interessante para estar aberto aos ensinamentos que os seus relacionamentos promovem. Favorecimento que pode ocorrer por meio das pessoas com quem você estabelece uma ligação.");
	}
	else if(sorte.equals("peixes")){
		signo.setText("Signo de Peixes");
		descricao.setText("Um excelente dia para as questões profissionais e ligadas à saúde dos piscianos. É um momento favorável para inovar na maneira como você expressa os seus talentos. Viagens e conhecimentos estão associados ao seu desenvolvimento profissional.");
	}
	else if(sorte.equals("capricornio")){
		signo.setText("Signo de Capricornio");
		descricao.setText("Estudos, autoconhecimentos e fatores psicológicos e emocionais estão enfatizados hoje. Momento interessante para ter mais consciência acerca de seu poder emocional e material. Um dia que assinala interessantes possibilidades de progresso.");
	}
	else if(sorte=="sagitario"){
		signo.setText("Signo de Sagitario");
		descricao.setText("Um dia muito favorável aos sagitarianos, com o contato entre a Lua, que está em seu signo, e o planeta Júpiter. É hora de você abrir o coração e a mente a novas possibilidades e oportunidades . Momento é interessante para confiar mais em si e também estar atento aos sinais.");
	}
	else if(sorte.equals("cancer")){
		signo.setText("Signo de Cancer");
		descricao.setText("Um excelente dia para as questões profissionais e ligadas à saúde dos piscianos. É um momento favorável para inovar na maneira como você expressa os seus talentos. Viagens e conhecimentos estão associados ao seu desenvolvimento profissional.");
	}
	else if(sorte.equals("leao")){
		signo.setText("Signo de Leão");
		descricao.setText("É hora de resgatar a alegria, a leveza e o entusiasmo, leonino. O dia é favorável para as questões afetivas e para a expressão de seus talentos criativos. Você agora absorve com mais consciência os seus conhecimentos emocionais.");
	}
	else if(sorte.equals("libra")){
		signo.setText("Signo de Libra");
		descricao.setText("Excelente dia para negociações, contatos e habilidades intelectuais, libriano. Uma fase oportuna para você desenvolver novos conhecimentos e contatos, e ampliar o seu raio de atuação. Mudanças positivas nos relacionamentos e expansão caracterizam o dia aos librianos.");
	}
	
	else if(sorte.equals("virgem")){
		signo.setText("Signo de Virgem");
		descricao.setText("Um dia interessante para reflexões sobre as emoções e a vida familiar, virginiano. Uma fase oportuna para o desenvolvimento espiritual e afetivo. Questões muito significativas envolvendo a família, o lar e os imóveis.");
	}
	
	else if(sorte.equals("escorpiao")){
		signo.setText("Signo de Escorpião");
		descricao.setText("Importantes benefícios que estão associados a uma confiança maior em suas habilidades. Favorecimento financeiro, entretanto tenha cuidado com negligências e exageros. É um momento muito interessante para inovações no trabalho e no cotidiano.");
	}
	else if(sorte.equals("aries")){
		signo.setText("Signo de Aries");
		descricao.setText("Excelente dia para viagens, estudos e questões ligadas ao turismo e a educação, ariano. O momento é oportuno para confiar mais nos seus potenciais e agir de uma maneira entusiasta. Benefícios associados à capacidade de ampliar horizontes e perspectivas.");
	}
	
	else if(sorte.equals("touro")){
		signo.setText("Signo de Touro");
		descricao.setText("Um dia estimulante para negociações e para confiar mais em si mesmo, taurino. O momento é oportuno para mudanças que tragam mais liberdade de ação. É uma fase bem importante para negociações e para questões íntimas.");
	}
	}

}
