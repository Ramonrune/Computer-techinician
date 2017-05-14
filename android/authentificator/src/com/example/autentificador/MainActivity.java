package com.example.autentificador;

import java.util.Random;

import android.app.Activity;
import android.os.Bundle;
import android.os.Handler;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ProgressBar;
import android.widget.TextView;

public class MainActivity extends Activity {
	 private static final int PROGRESS = 0x1;

	    private ProgressBar progressBar;
	    private TextView Text;
	    private int statusProgressBar= 0;
	    private Handler mHandler = new Handler();


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		 progressBar = (ProgressBar) findViewById(R.id.progressBar);

	        Text = (TextView) findViewById(R.id.editText);
	        final Random gerador = new Random();



	        final int totalProgressTime = 100;
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
	                                        Text.setText(String.format("%d", gerador.nextInt(100000)));

	                                    }
	                                }
	                            });

	                        }
	                        }
	                        sleep(100);
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
