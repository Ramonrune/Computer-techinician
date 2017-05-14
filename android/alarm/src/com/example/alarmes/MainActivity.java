package com.example.alarmes;

import java.util.Calendar;

import android.app.Activity;
import android.app.AlarmManager;
import android.app.PendingIntent;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
/*
 * @autor:Ramon Lacava 3IT
 * @data:28/04/2015
 * O c�digo a seguir faz a execu��o de um sistema de alarme
 * O alarme ir� disparar a cada 3 segundos utilizando intents , 
 * o calendar , alarmmanager.
 * 
 */
public class MainActivity extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		//aqui � pego o bot�o de alarme pela sua id
		Button botaoalarme = (Button) findViewById(R.id.botaoalarme);
		//� setado uma a��o para o bot�o
		botaoalarme.setOnClickListener((new View.OnClickListener() {
			
			@Override
			public void onClick(View v){
				//segundos
				int segundos =3;
				//tempo de repeti��o
				int repetir = 3*1000;
				
				//definindo inten��o para o alarme - primeiro foi criado o alarme
				Intent intencao = new Intent("EXECUTAR_ALARME");
				/*
				 * #########PendingIntent############
				 * 
				 * O pendingintent define uma atividade ou broadcast que possa ser utilizado
				 * em outras aplica��es.O pendingintent � simplismente uma referencia que � mantida
				 * pelo sistema para ser utilizada em outra aplica��o.
				 * 
				 * A variavel p est� acumulando um broadcast da inten��o de executar o alarme , 
				 * que ser� chamada pela action no arquivo manifest
				 * 
				 * o pedingintent possui v�rios m�todos , como :
				 * -cancel() - cancela a activity atual
				 * -describeContents() -  descreve os tipos especiais de objetos contidos no pending
				 * -getBroadcast() - recupera a pending que ser� executada pelo broadcast
				 * 
				 * 
				 */
				PendingIntent p = PendingIntent.getBroadcast(MainActivity.this,0, intencao, 0);
				//setar o tempo para disparar o alarme em 10 segundos
				Calendar c = Calendar.getInstance();
				c.setTimeInMillis(System.currentTimeMillis());
				c.add(Calendar.SECOND, segundos); //soma + 10 segundos
				
				//fazer o agendamento do alarme
				
				
				/*
				 * ######AlarmManager#########
				 * Essa classe � responsavel pelo fornecimento do acesso a classe
				 * que gerencia o sistema de alarme.
				 * Obs: Alarmes digitados s�o mantidos enquanto o dispositivo "dorme"
				 */
				AlarmManager alarme = (AlarmManager) getSystemService(ALARM_SERVICE);
				long tempo = c.getTimeInMillis();
				//o set repeating � responsavel pela repeti��o de uma a��o
				/*
				 * ######RTC_WAKEUP##########
				 * 
				 * O RTC_WAKEUP � uma constante utilizada para "acordar" o dispositivo
				 * quando ele ele apaga
				 * 
				 * 
				 */
				alarme.setRepeating(AlarmManager.RTC_WAKEUP,tempo,repetir,p);
				
				//para debugar ou testar use o log
				//o Log � utilizado para mandar uma mensagem para o logcat
				Log.i("Alarme","OK Alarme Agendado!!!");
				
				
			}
		}));
	}

	//o ondestroy � responsavel pela finaliza��o do Alarme
	protected void onDestroy(){
		Log.i("Alarme","Alarme finalizado");
		Intent it = new Intent("EXECUTAR_ALARME");
		PendingIntent p = PendingIntent.getBroadcast(MainActivity.this,0, it, 0);
		
		//o getSystemService � um auxiliar para acessar o servi�o de alarme
		AlarmManager alarme = (AlarmManager) getSystemService(ALARM_SERVICE);
		alarme.cancel(p);
		//o cancel � responsavel por parar o pendint intent
		
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
