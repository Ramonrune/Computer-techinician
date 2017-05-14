package com.example.projetofinal;

import java.util.Random;






import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.os.Bundle;
import android.os.Handler;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.TextView;
/*
 * @autor:Ramon Lacava 3it
 * @date:16/05/2015
 * O programa a seguir foi feito para criar um autentificador de login
 * o Autentificador serve para prover mais segurança no sistema de login
 */
public class MainActivity extends Activity {
	//Declarado as variaveis que serão utilizadas no programa
	private static final int PROGRESS = 0x1;
    private ProgressBar progressBar;
    private TextView Text;
    private Button botaologin;
    private int statusProgressBar= 0;
    public String valor1;
    private Handler mHandler = new Handler();
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		//barra de progresso
		 progressBar = (ProgressBar) findViewById(R.id.progressBar);
		 	//textview 
	        Text = (TextView) findViewById(R.id.codigo);
	        //botao
	        botaologin = (Button) findViewById(R.id.botaologin);
	   
	        botaologin.setOnClickListener(new View.OnClickListener() {
				
				@Override
				public void onClick(View v) {
					 Intent intent = new Intent(MainActivity.this, TelaLogin.class);
					 /*
	            	  * Aqui é começado uma nova intent que passara desta activity para a outra
	            	  */
	            	 /*
	            	  * 
	            	  * O bundle é responsavel por passar as variaveis dessa activity para a activity meuperfil
	            	  */
	                 Bundle params = new Bundle();
	                 params.putString("codigo", valor1);
	      
	                 /*
	                  * a intent passa os parametros como um extra e após isso é startado a activity
	                  */
	                 intent.putExtras(params);
					 startActivity(intent);
					
				}
			});
	        final Random gerador = new Random();


	        //progresso de tempo da progressbar
	        final int totalProgressTime = 100;
	        //thread responsavel por fazer a progressbar funcionar
	        final Thread t = new Thread(){

	            @Override
	            public void run(){

	                int jumpTime = 0;
	                while(jumpTime < totalProgressTime){
	                    try {
	                        if(jumpTime == 99){
	                            jumpTime= -20;




	                        synchronized (this) {


	                            runOnUiThread(new Runnable() {
	                                @Override
	                                public void run() {
	                                    for (int i = 0; i < 10; i++){
	                                    	int valor=gerador.nextInt(100000);
	                                    	valor1 = String.valueOf(valor);
	                                        Text.setText(valor1);
	                                        bancodedados db = new bancodedados(MainActivity.this);
	                                    	db.Atualiza(valor1);
	                                        

	                                    }
	                                }
	                            });

	                        }
	                        }
	                        sleep(500);
	                        jumpTime += 1;



	                        progressBar.setProgress(jumpTime);


	                    } catch (InterruptedException e) {
	                        // TODO Auto-generated catch block
	                        e.printStackTrace();
	                    }



	                }

	            }
	        };
	        t.start();
	}

	
}
