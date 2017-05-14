package com.example.projetoperfil;

import java.sql.Date;
import java.text.DecimalFormat;
import java.text.NumberFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Random;

import android.app.Activity;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.text.format.DateFormat;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.view.ViewGroup.LayoutParams;
import android.widget.Button;
import android.widget.EditText;
import android.widget.GridLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

/*
 * @autor:Ramon Lacava Gutierrez Gon�ales 3IT
 * @data : 05/05/2015
 * 
 * Esta classe tem como objetivo mostrar o resultado daquilo que
 * foi digitado pelo usu�rio , informando o signo , o numero da sorte , o
 * numero da riqueza e o imc
 * 
 * 
 */

public class MeuPerfil extends Activity{
	/*
	 * Aqui s�o declarados os campos que ser�o utilizados
	 */
	TextView t;
	TextView sobreopeso;
	TextView descricao;
	TextView sorte;
	TextView horoscopo;
	TextView signo;
	TextView riqueza;
	Button button1;
	String s;
	RelativeLayout rl;
	GridLayout gl;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
	super.onCreate(savedInstanceState);
	/*
	 * Aqui � setado o conteudo da View , que ser� o layout_perfil
	 */

	/*
	 * Aqui � pego os campos e ent�o passados para as variaveis 
	 */
	rl = new RelativeLayout(MeuPerfil.this);
	rl.setLayoutParams(new LayoutParams(LayoutParams.MATCH_PARENT,LayoutParams.MATCH_PARENT));
	t = new TextView(MeuPerfil.this);
	sobreopeso = new TextView(MeuPerfil.this);
	descricao = new TextView(MeuPerfil.this);
	horoscopo = new TextView(MeuPerfil.this);
	signo = new TextView(MeuPerfil.this);
	riqueza = new TextView(MeuPerfil.this);
	button1 = new Button(MeuPerfil.this);
	t.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	sobreopeso.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	descricao.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	horoscopo.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	signo.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	riqueza.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	button1.setLayoutParams(new LayoutParams(LayoutParams.WRAP_CONTENT,LayoutParams.WRAP_CONTENT));
	button1.setText("Ver Meu Perfil");
	gl = new GridLayout(MeuPerfil.this);
	gl.setLayoutParams(new LayoutParams(LayoutParams.MATCH_PARENT,LayoutParams.MATCH_PARENT));
	gl.setColumnCount(1);
	  
	  /*
	   * Aqui � pego as variaveis que foram passados pelo extra das intents
	   */
	  Intent intent = getIntent();
	  String imc = intent.getStringExtra("imc");
	  String sorte = intent.getStringExtra("sorte");
	  String ano = intent.getStringExtra("data");
	  /*
	   * Aqui � mostrado o imc da pessoa junto ao seu Numero da Sorte
	   */
	  
	  t.setText("IMC : "+imc+" N� da Sorte : "+sorte);
	  /*
	   * Aqui o imc � convertido em float e passado para a variavel indice
	   */
	
	  
	  /*
	   * Aqui � convertido o imc em um float para a variavel imc1
	   * o Mesmo � feito na conver��o da variavel sorte para um float da variavel sorte1
	   */
	  float imc1 = Float.parseFloat(imc);
	  float sorte1 = Float.parseFloat(sorte);
	  /*
	   * Aqui o numero da riqueza recebe o imc da pessoa + o numero da sorte dela
	   */
	  float riqueza1 = imc1 + sorte1;
	  /*
	   * Com o numberformat , � formatado o numero para mostrar apenas 2 casas ap�s o ponto
	   */
	  NumberFormat f = new DecimalFormat("0");
	  /*
	   * Aqui � startado o random para gerar os numeros aleat�rios
	   */
	  Random gerador = new Random();
	 /*
	  * Aqui � startado o stringbuilder , ou seja , o construtor de strings
	  * para que seja possivel colocar dentro do textview um array
	  */
	  StringBuilder sb = new StringBuilder();
	     float size = riqueza1;
	     boolean appendSeparator = false;
	     /*
	      * Aqui ser�o gerados 3 numeros da riquezae a cada numero , ser� aplicado uma virgula
	      * para poder separa-lo do outro e ap�s isso � feito o random , multiplicado pelo numero da riqueza
	      * que � formado pela soma do imc da pessoa e o numero da pessoa dela
	      */
	     for(int y=0; y < 3; y++){

	        if (appendSeparator)
	            sb.append(','); // a comma
	        appendSeparator = true;

	        sb.append(f.format(Math.random() * riqueza1));
	     }
	     riqueza.setText("N� da Riqueza :"+sb.toString());
	
	     
	 
	     
	     
	     /*
	      * Aqui o split � responsavel por separar a data pelos "/" e passar o que foi separado em um array de strings
	      * 
	      */
	     
	  String ano1[] = ano.split("/"); 
	
	  String dia = ano1[0];
	  String mes = ano1[1];
	  String ano_nasc = ano1[2];
	  
	  
		    
	  
	  horoscopo.setText("Dia  "+dia+" Mes " + mes + " Ano " + ano_nasc);
	  
	  int d = Integer.parseInt(dia);
	  int m = Integer.parseInt(mes);
	  int y = Integer.parseInt(ano_nasc);
	  /*
	   * Aqui � utilizado o calendario para que seja possivel comparar a data de nascimento
	   * informada com as datas de nascimento do horoscopo normal
	   * O velho ser� responsavel pela data de nascimento da pessoa
	   */
	  
	  Calendar velho = Calendar.getInstance( );  
	     
	  // Seta o dia  
	  velho.set( Calendar.DAY_OF_MONTH, d );  
	    
	  // Seta o m�s  
	  velho.set( Calendar.MONTH, m );  
	    
	  /*
	   * A seguir s�o colocadas todas das datas de cada inicio dos horoscopos
	   */
	  
	  Calendar aries = Calendar.getInstance( );  
	  aries.set(Calendar.DAY_OF_MONTH, 21);
	  aries.set(Calendar.MONTH, 03);
	  
	  
	  
	  Calendar touro = Calendar.getInstance( );  
	  touro.set(Calendar.DAY_OF_MONTH, 21);
	  touro.set(Calendar.MONTH, 04);
	  
	  Calendar gemeos = Calendar.getInstance( );  
	  gemeos.set(Calendar.DAY_OF_MONTH, 21);
	  gemeos.set(Calendar.MONTH, 05);
	  
	  Calendar cancer = Calendar.getInstance( );  
	  cancer.set(Calendar.DAY_OF_MONTH, 21);
	  cancer.set(Calendar.MONTH, 06);
	  
	  Calendar leao = Calendar.getInstance( );  
	  leao.set(Calendar.DAY_OF_MONTH, 22);
	  leao.set(Calendar.MONTH, 07);
	  
	  Calendar virgem = Calendar.getInstance( );  
	  virgem.set(Calendar.DAY_OF_MONTH, 23);
	  virgem.set(Calendar.MONTH,8);
	  
	  Calendar libra = Calendar.getInstance( );  
	  libra.set(Calendar.DAY_OF_MONTH, 23);
	  libra.set(Calendar.MONTH,9);
	  
	  Calendar escorpiao = Calendar.getInstance( );  
	  escorpiao.set(Calendar.DAY_OF_MONTH, 23);
	  escorpiao.set(Calendar.MONTH, 10);
	  
	  Calendar sagitario = Calendar.getInstance( );  
	  sagitario.set(Calendar.DAY_OF_MONTH, 22);
	  sagitario.set(Calendar.MONTH, 11);
	  
	  Calendar capricornio = Calendar.getInstance( );  
	  capricornio.set(Calendar.DAY_OF_MONTH, 22);
	  capricornio.set(Calendar.MONTH, 12);
	  
	  Calendar aquario = Calendar.getInstance( );  
	  aquario.set(Calendar.DAY_OF_MONTH, 21);
	  aquario.set(Calendar.MONTH, 1);
	  
	  Calendar peixe= Calendar.getInstance( );  
	  peixe.set(Calendar.DAY_OF_MONTH, 20);
	  peixe.set(Calendar.MONTH, 02);
	  
	  /*
	   * Aqui atrav�s do m�todo after e before , � comparado se a data est� depois
	   * do periodo informado e antes de outro per�odo informado.
	   * Isso determina o horoscopo da pessoa
	   */
	  
	  if(velho.after(aquario) && velho.before(peixe)){
		  signo.setText("Signo de Aquario");
		   s="aquario";
	  }
	  else if(velho.after(peixe) && velho.before(aries)){
		  signo.setText("Signo de Peixe");
		  s="peixe";
	  }
	  else if(velho.after(aries) && velho.before(touro)){
		  signo.setText("Signo de Aries");
		  s="aries";
	  }
	  else if(velho.after(touro) && velho.before(gemeos)){
		  signo.setText("Signo de Touro");
		  s="touro";
	  }
	  else if(velho.after(gemeos) && velho.before(cancer)){
		  signo.setText("Signo de Gemeos");
		  s="gemeos";
		  
	  }
	  else if(velho.after(cancer) && velho.before(leao)){
		  signo.setText("Signo de Cancer");
		  s="cancer";
	  }
	  else if(velho.after(leao) && velho.before(virgem)){
		  signo.setText("Signo de Le�o");
		  s="leao";
	  }
	  else if(velho.after(virgem) && velho.before(libra)){
		  signo.setText("Signo de Virgem");
		  s="virgem";

	  }
	  else if(velho.after(libra) && velho.before(escorpiao)){
		  signo.setText("Signo de Libra");
		  s="libra";
	  }
	  else if(velho.after(escorpiao) && velho.before(sagitario)){
		  signo.setText("Signo de Escorpi�o");
		  s="escorpiao";
	  }
	  else if(velho.after(sagitario) && velho.before(capricornio)){
		  signo.setText("Signo de Sagitario");
		  s="sagitario";
	  }
	  else if(velho.after(capricornio) && velho.before(aquario)){
		  signo.setText("Signo de Capricornio");
		  s="capricornio";
	  }
	  
	  float indice = Float.parseFloat(String.valueOf(imc));
	  /*
	   * Se o indice possuir um determinado valor , 
	   * ele ser� comparado pelo if e mostrar� uma 
	   * determinada mensagem
	   */
	  
	    //primeira forma
	 
	
	  if (indice<17){
		  sobreopeso.setText("Voc� Est� Abaixo do Peso");
		  descricao.setText("N�o caia na armadilha de comer pilhas de sorvete, hamb�rgueres e doces. Coma lanchinhos como abacate, queijo e nozes o dia todo.");
		  rl.setBackgroundColor(Color.parseColor("#00FF00"));
		
		 
	  }
	  if (indice>=17 && indice <=25){
		  sobreopeso.setText("Voc� Est� No Seu Peso Ideal ! ");
		  descricao.setText("Parab�ns ! Continue seguindo sua dieta para manter o seu peso na Forma Saudavel");
		  rl.setBackgroundColor(Color.parseColor("#33CCFF"));
	
		
	  }
	  if (indice>25 && indice<30){
		  sobreopeso.setText("Voc� Est� Acima do Peso ! ");
		  descricao.setText("N�o coma Alimentos Gordurosos.Fa�a uma Dieta equilibrada e procure manter seu corpo saudavel.");
		  rl.setBackgroundColor(Color.parseColor("#000099"));
		
	  }
	  
	  if (indice>=30){
	
		  sobreopeso.setText("Voc� Est� com Obesidade ! ");
		  descricao.setText("Tenha Cuidado ! Fa�a uma Dieta equilibrada e exerc�cios para manter-se Saudavel.");
		  rl.setBackgroundColor(Color.parseColor("#FF0000"));
		 
		  
	  }
	  
	  gl.addView(t);
	  gl.addView(sobreopeso);

		gl.addView(descricao);
		gl.addView(horoscopo);
		gl.addView(signo);
		gl.addView(riqueza);
		gl.addView(button1);
		
	  rl.addView(gl);
	  setContentView(rl);
	  
	  button1.setOnClickListener(new View.OnClickListener() {
		
		@Override
		public void onClick(View v) {
			 Intent intent = new Intent(MeuPerfil.this, Signo.class);
        	 /*
        	  * 
        	  * O bundle � responsavel por passar as variaveis dessa activity para a activity meuperfil
        	  */
            Bundle params11 = new Bundle();
			params11.putString("s",s);
             /*
              * a intent passa os parametros como um extra e ap�s isso � startado a activity
              */
             intent.putExtras(params11);
        
             startActivity(intent);
			
		}
	});
	  
	  
	  


	  
	
	  
	
	}

	
	
}
