package com.example.somamedia;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends Activity {
	private EditText nota1;
    private EditText nota2;
    private EditText nota3;
    private EditText nota4;
    private Button button1;
    TextView media;
    TextView mensagem;
    private double valor1;
    private double valor2;
    private double valor3;
    private double valor4;
    private double n1;
    private double n2;
    private double n3;
    private double n4;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);

		nota1 =(EditText) findViewById(R.id.nota1);
        nota2 =(EditText) findViewById(R.id.nota2);
        nota3 =(EditText) findViewById(R.id.nota3);
        nota4 =(EditText) findViewById(R.id.nota4);
        button1 =(Button) findViewById(R.id.button1);
        media = (TextView) findViewById(R.id.media);
        mensagem = (TextView) findViewById(R.id.mensagem);
        
        button1.setOnClickListener(new View.OnClickListener() {
            @Override
       
            public void onClick(View arg0) {
            	try {
                n1 = Double.parseDouble(String.valueOf(nota1.getText()));
                n2 = Double.parseDouble(String.valueOf(nota2.getText()));
                n3 = Double.parseDouble(String.valueOf(nota3.getText()));
                n4 = Double.parseDouble(String.valueOf(nota4.getText()));
            	}
            	catch(NumberFormatException n1){
            		
            	}
                Double medias = MainActivity.this.calcularMedia(n1, n2, n3,n4);
                media.setText(String.valueOf(medias));
        
          	 if(medias >= 7){
                	
                mensagem.setText(String.valueOf("Aprovado =)"));}
           
            if(medias >= 5 && medias < 7){
            	mensagem.setText(String.valueOf("Recuperacao =O"));
            }
            if(medias < 5){
            	mensagem.setText(String.valueOf("Reprovado T_T"));
            }
            
         }});
	}
	
	   private double calcularMedia(double n1,double n2 , double n3,double n4){
	        this.n1 = n1;
	        this.n2 = n2;
	        this.n3 = n3;
	        this.n4 = n4;
	        double media = (n1 + n2 + n3 + n4) / 4;
	        return media;
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
