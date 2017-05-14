package com.example.projetoperfil;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;


/*
 * @autor: Ramon Lacava
 * @data: 05/05/2015
 * Objetivo:
 * O objetivo do projeto perfil tosco é através do nome , data de nascimento , 
 * peso e altura , gerar o numero da riqueza , numero da sorte , mostrar o signo da 
 * pessoa , junto ao imc dela , informando algumas caracteristicas sobre o mesmo.
 * 
 */

public class MainActivity extends Activity {
	/*
	 * Aqui é declarado os campos e variaveis que serão utilizados
	 * 
	 */
	private EditText editText1;
    private EditText editText2;
    private EditText editText3;
    private EditText editText4;
    public String nome;
    public String data;
    public float peso;
    public float altura;
    public Button button1;
    
    
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        
        /*
         * 
         * Aqui é passado para os campos a id do layout
         * 
         * 
         */
       
        editText1 =(EditText) findViewById(R.id.editText1);
        editText2 =(EditText) findViewById(R.id.editText2);
        editText3 =(EditText) findViewById(R.id.editText3);
        editText4 =(EditText) findViewById(R.id.editText4);
        button1 =(Button) findViewById(R.id.button1);
   
        
        button1.setOnClickListener(new View.OnClickListener() {
            @Override
       
            public void onClick(View arg0) {
            	
            	/*
            	 * Aqui é passado o conteudo dos campos
            	 * para as variaveis
            	 * 
            	 */
            	nome = String.valueOf(editText1.getText());
                data = String.valueOf(editText2.getText());
            	try {
            		/*
            		 * 
            		 * aqui é pego o valor dos campos e convertido em float através de um try e catch
            		 */
                peso = Float.parseFloat(String.valueOf(editText3.getText()));
                altura = Float.parseFloat(String.valueOf(editText4.getText()));
            	}
            	catch(NumberFormatException peso){
            		
            	}
            	
            	/*
            	 * Aqui é calculado o imc da pessoa e após isso é convertindo em uma string
            	 * O imc é o indice de massa corporea que é calculado dividindo o peso de uma pessoa
            	 * pela altura elevada ao quadrado
            	 */
            	float imc = (peso / (altura*altura));
            	String imc1 = String.valueOf(imc);
            	
            	/*
            	 * 
            	 * Aqui a variavel total pega a quantidade de caracteres do nome e passa para a variavel
            	 */
            	
            	 float total = nome.length();
            	 String ttl = String.valueOf(total);   
            	 /*
            	  * Aqui é começado uma nova intent que passara desta activity para a outra
            	  */
            	 Intent intent = new Intent(MainActivity.this, MeuPerfil.class);
            	 /*
            	  * 
            	  * O bundle é responsavel por passar as variaveis dessa activity para a activity meuperfil
            	  */
                 Bundle params = new Bundle();
                 Bundle params1 = new Bundle();
                 Bundle params2 = new Bundle();
                 params.putString("imc", imc1);
                 params1.putString("sorte", ttl);
                 params2.putString("data", data);
                 /*
                  * a intent passa os parametros como um extra e após isso é startado a activity
                  */
                 intent.putExtras(params);
                 intent.putExtras(params1);
                 intent.putExtras(params2);
                 startActivity(intent);
                 
                 
         }});
       
    }
  

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        if (id == R.id.action_settings) {
            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
