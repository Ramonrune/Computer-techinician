package com.example.alarmes;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.widget.Toast;
/*
 * @autor:Ramon Lacava 3IT
 * @data:28/04/2015
 * O c�digo a seguir faz a execu��o de um sistema de alarme
 * O alarme ir� disparar a cada 3 segundos utilizando intents , 
 * o calendar , alarmmanager.
 * 
 */
/*
 * O receber alarme pega o broadcast que � passado pelo paddingintent
 * e faz um toat mostrando que o alarme funcionou de 3 em 3 segundos
 * O onreceive � responsavel por receber o receiver o arquivo manifest
 * 
 */
public class ReceberAlarme extends BroadcastReceiver{
	public void onReceive(Context c , Intent i){
		Toast.makeText(c,"Alarme Funcionando!", Toast.LENGTH_SHORT).show();
	}
}
