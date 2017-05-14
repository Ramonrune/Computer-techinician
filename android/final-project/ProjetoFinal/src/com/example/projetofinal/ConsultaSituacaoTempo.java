package com.example.projetofinal;

import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.Reader;
import java.net.HttpURLConnection;
import java.net.URL;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.os.AsyncTask;
/*
 * @Autor:Ramon Lacava 3IT
 * @Data:19/05/2015
 * 
 * Arquivo que consulta a situação do tempo no servidor
 */
public class ConsultaSituacaoTempo extends AsyncTask<Void, Void, String> {
	//aqui é declarado um listener
	private ConsultaSituacaoTempoListener listener;
	//url que irá puxar as informações do banco de dados
	private static final String URL_STRING = "http://api.openweathermap.org/data/2.5/weather?q=London,uk";
	//aqui será consultado a situação do tempo
	public ConsultaSituacaoTempo(ConsultaSituacaoTempoListener listener){
		this.listener= listener;
	}
	//o doInBackgroundele fará uma consulta com o servidor e irá interpretar 
	//o resultado do que o programa obter
	//também são tratadas as exceções json para que nenhum erro ocorra
	@Override
	protected String doInBackground(Void... params) {
		try {
			String resultado = consultaServidor();
			return interpretaResultado(resultado);
			
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return null;
		} catch (JSONException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return null;
		}
	}
	
	//este método interpreta o resultado obtido pelo servidor
	public String interpretaResultado(String resultado) throws JSONException{
		//instancia do jsonobject
		JSONObject object = new JSONObject(resultado);
		//json array pega o objeto "weather" do banco de dados
		JSONArray jsonArray = object.getJSONArray("weather");
		//o weather pego estará no indice 0 (indice inicial do array)
		JSONObject jsonObjectWeather = jsonArray.getJSONObject(0);
		//pega a id pelo json e coloca na variavel id
		int id = jsonObjectWeather.getInt("id");
		//pega a descrição do jsonobject no banco de dados
		String descricao = jsonObjectWeather.getString("description");
		//retorn a situação do tempo em londres
		return "Situação do Tempo em Londres : " + id + " - " + descricao;
	}
	
	//metodo que consulta o servidor
	private String consultaServidor() throws IOException{
		InputStream is = null;
		try{
			URL url = new URL(URL_STRING);//instanciado a classe url
			HttpURLConnection conn= (HttpURLConnection) url.openConnection();//abre a conexão com url
			conn.setReadTimeout(10000); //é feito um limite de tempo de leitura de 10000 milisegundos
			conn.setConnectTimeout(15000); //tempo de settimeout de 15000 milisegundos
			conn.setRequestMethod("GET"); //o metodo utilizado será get
			conn.setDoInput(true);
			conn.connect();
			conn.getResponseCode();
			is = conn.getInputStream();
			
			Reader reader = null;
			reader = new InputStreamReader(is);
			char[] buffer = new char[2048];
			reader.read(buffer);
			return new String(buffer);
			
			
		}finally{
			if(is != null){
				is.close();
			}
		}
		
	
	}

	
	@Override
	protected void onPostExecute(String result) {
		listener.onConsultaConcluida(result);
	}
	//interface que consulta o tempo
	public interface ConsultaSituacaoTempoListener{
		void onConsultaConcluida(String situacaoTempo);
	}
}
