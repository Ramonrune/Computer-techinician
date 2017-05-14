package senai.com.calculomedia;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.view.*;



public class CalculoMediaMainActivity extends Activity {
	private float n1;
	private float n2;
	private float n3;
	private float n4;
	private float media1;
	private EditText nota1;
	private EditText nota2;
	private EditText nota3;
	private EditText nota4;
	private EditText media;
	private Button botao;
	private String media2;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_calculo_media_main);
        
        
        nota1 = (EditText) findViewById(R.id.nota1);
    	nota2 = (EditText) findViewById(R.id.nota2);
    	nota3 = (EditText) findViewById(R.id.nota3);
    	nota4 = (EditText) findViewById(R.id.nota4);
    	media = (EditText) findViewById(R.id.media);
    	
    	botao = (Button) findViewById(R.id.button1);
    	
        try{
        n1 = Float.valueOf(nota1.getText().toString());
    	n2 = Float.valueOf(nota2.getText().toString());
    	n3 = Float.valueOf(nota3.getText().toString());
    	n4 = Float.valueOf(nota4.getText().toString());
        }
        catch (NumberFormatException e) {
        	   e.printStackTrace();
        	}
    	botao.setOnClickListener(new OnClickListener(){
    		@Override
			public void onClick(View v) {
    			
				media1 = (n1 + n2 + n3 + n4);
				media2 = String.valueOf(media1);
				media.setText(media2);
								
			}
    	});  
        	
        
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.calculo_media_main, menu);
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
