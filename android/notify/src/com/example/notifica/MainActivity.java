package com.example.notifica;

//import com.example.alarmes.R;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends Activity{

	
	private  EditText corpo;
	private  EditText titulo;
	private Button button1; 
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		  	TextView text = new TextView(this);
	        text.setText("Notifica��o disparada.");
	        setContentView(R.layout.activity_main);
	        
	        button1 = (Button)findViewById(R.id.button1);
	        button1.setOnClickListener(new View.OnClickListener() {
				
				@Override
				public void onClick(View v) {
					
					clicar();
				}
			});
	}
	        
	        public void clicar(){
	        // Texto que aparecer� na barra de status (chamada para a notifica��o)
	        String tickerText = "Voc� recebeu uma mensagem.";
	 
	        // Detalhes da notifica��o
	        //CharSequence titulo = "Andr�";
	        corpo = (EditText)findViewById(R.id.corpo);
	        String corpo1 = String.valueOf(corpo.getText());
	        titulo = (EditText)findViewById(R.id.titulo);
	        String titulo1 = String.valueOf(titulo.getText());
	       // CharSequence mensagem = "Exemplo de notifica��o";
	 
	        // Exibe a notifica��o
	        criarNotificacao(this, tickerText, titulo1, corpo1, MainActivity.class);
	        }
	 
			// Exibe a notificacao
	    	protected void criarNotificacao(Context context, CharSequence mensagemBarraStatus,
	            CharSequence titulo, CharSequence mensagem, Class activity) {
	        // Recupera o servi�o do NotificationManager
	        NotificationManager nm = (NotificationManager) getSystemService(NOTIFICATION_SERVICE);
	        Notification n = new Notification(R.drawable.ic_launcher, mensagemBarraStatus, System.currentTimeMillis());
	 
	        // PendingIntent para executar a Activity se o usu�rio selecionar a notifica��o
	        PendingIntent p = PendingIntent.getActivity(this, 0, new Intent(this, activity), 0);
	        
	     
	        
	        // Flag utilizada para remover a notifica��o da barra de status
	        // quando o usu�rio clicar nela
	        //n.flags |= Notification.FLAG_SHOW_LIGHTS;
	        //n.extras = Notification.EXTRA_TEXT_LINES;
	        //n.actions = Notification.CATEGORY_MESSAGE = "teste";
	        //n.category = Notification.CATEGORY_MESSAGE;
	        
	        n.vibrate = new long[] { 100, 250, 5000, 1000 };
	        
	        
	        
	        
	        // Informa��es
	        n.setLatestEventInfo(this, titulo, mensagem, p);
	 
	        // Espera 100ms e vibra por 250ms, espera por mais 5000ms e vibra por 1000ms
	       
	        // id da notificacao
	        nm.notify(R.string.app_name, n);
	        
	        
	        
	    }

	
}
